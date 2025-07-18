<?php

namespace App\Http\Controllers;

use App\Imports\BulkUploadVendors;
use App\Models\AdminActivityLogs;
use App\Models\City;
use App\Models\Help;
use App\Models\Image;
use App\Models\Query;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        event(new Failed(
            'admin', // guard name
            new \App\Models\Admin(), // the user (null if not found)
            $credentials // the attempted credentials
        ));

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $labels = [];
        $values = [];
        $start = Carbon::now()->subDays(6)->startOfDay();
        $end = Carbon::now()->endOfDay();
        $vendors = Vendor::whereBetween('created_at', [$start, $end])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('d-m-Y');
            });
        foreach ($start->copy()->daysUntil($end) as $date) {
            $formatted = $date->format('d-M-Y');  // e.g., "20-May-2025"
            $labels[] = $formatted;
            foreach ($vendors as $key => $value) {

                $match = $key = $date->toDateString() ? $value->count() : 0;
                $values[] = $match;
            }
        }
        $queryLabels = [];
        $queryValues = [];
        $start = Carbon::now()->subDays(6)->startOfDay();
        $end = Carbon::now()->endOfDay();
        $queries = Query::whereBetween('created_at', [$start, $end])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('d-m-Y');
            });
        foreach ($start->copy()->daysUntil($end) as $date) {
            $formatted = $date->format('d-M-Y');
            $queryLabels[] = $formatted;
            $match = 0; // default to 0
            foreach ($queries as $key => $value) {
                if ($key == $date->format('d-m-Y')) {
                    $match = $value->count();
                    break; // we found the match, no need to keep looping
                }
            }

            $queryValues[] = $match;
        }
        return view('admin.dashboard', ['labels' => $labels, 'values' => $values, 'queryLabels' => $queryLabels, 'queryValues' => $queryValues]);
    }

    public function showVendors()
    {
        // $vendors = Vendor::where('status', '0')->orWhere('status', '2')->paginate(10);
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.vendor.vendors', ['vendors' => $vendors]);
    }

    public function addBulkVendors()
    {
        return view('admin.vendor.addBulkVendors');
    }

    public function storeBulkVendors(Request $request)
    {
        try {
            Excel::import(new BulkUploadVendors, $request->file('excelFile'));
            Log::info('Admin Log', ['message' => 'Bulk Vendors uploaded']);
            return back()->with('success', 'Vendors added successfully');
        } catch (ValidationException $e) {
            $failures = $e->failures();

            // You can loop and display the failures if needed
            $errors = [];
            foreach ($failures as $failure) {
                $errors[] = 'Row ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            Log::warning('Admin Log', ['message' => 'Bulk Vendors upload failed']);
            return back()->withErrors(['excelFile' => $errors]);
        } catch (\Exception $e) {
            return back()->withErrors(['excelFile' => 'Import failed: ' . $e->getMessage()]);
        }
    }

    public function verifyVendor($vendor_id)
    {
        $vendor = Vendor::findOrFail($vendor_id);
        $city = City::where('city', $vendor->city)->first();
        if ($vendor->status == 0) {
            $city->status = 1;
            $vendor->status = 1;
            Log::info('Admin Log', ['message' => 'Vendor ' . $vendor->business_name . ' verified']);
        } else {
            $vendor->status = 0;
            Log::info('Admin Log', ['message' => 'Vendor ' . $vendor->business_name . ' unverified']);
        }
        
        $city->save();
        $vendor->save();
        return back()->with('success', 'Vendor verified successfully');
    }

    public function rejectVendor($vendor_id)
    {
        $vendor = Vendor::findOrFail($vendor_id);
        $vendor->status = 2;
        $vendor->save();
        Log::warning('Admin Log', ['message' => 'Vendor Rejected']);
        return back()->with('success', 'Vendor verified successfully');
    }

    // Images function
    public function showImages()
    {
        $images = Image::paginate(10);
        return view('admin.imageLibrary.show', ['images' => $images]);
    }

    public function createImage()
    {
        return view('admin.imageLibrary.create');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|array',
            'image.*' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:3072',
        ]);
        foreach ($request->image as $image) {
            if ($image->isValid()) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image_path = $image->storeAs('uploads', $imageName, 'public');
            }
            $upload_image = new Image();
            $upload_image->image_name = $imageName;
            $upload_image->image_path = $image_path;
            $upload_image->save();
            Log::info('Admin Log', ['message' => 'Image ' . $imageName . ' Uploaded to the library']);
        }
        return back()->with('success', 'Images uploaded successfully');
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
        Log::warning('Admin Log', ['message' => 'Image ' . $image->image_name . ' Deleted from the library']);
        return back()->with('success', 'Image deleted successfully');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function changePassword()
    {
        return view('admin.auth.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $admin = Auth::guard('admin')->user();
        if (Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            Log::info('Admin Log', ['message' => 'Admin password changed']);
            return back()->with('success', 'Password updated successfully');
        } else {
            Log::warning('Admin Log', ['message' => 'Password change failed']);
            return back()->withErrors(['old_password' => 'Old password does not match']);
        }
    }

    public function activityLogs()
    {
        $activityLogs = AdminActivityLogs::orderBy('created_at', 'desc')->paginate(10);

        $logPath = storage_path('logs/laravel.log');
        $logs = File::exists($logPath) ? File::lines($logPath) : collect(["Log file not found."]);
        $search = 'Admin Log';
        $logs = $logs->filter(function ($log) use ($search) {
            return Str::contains($log, $search); // Case-sensitive search
        });

        $currentPage = request('page', 1);
        $perPage = 20;

        $logsPaginated = new LengthAwarePaginator(
            $logs->slice(($currentPage - 1) * $perPage, $perPage),
            $logs->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('admin.ActivityLogs', ['activityLogs' => $activityLogs, 'logsPaginated' => $logsPaginated]);
    }

    public function AuthenticationLogs()
    {
        $authenticationLogs = AdminActivityLogs::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.authenticationLogs', ['authenticationLogs' => $authenticationLogs]);
    }

    public function ContactUsQueries(){
        $contactUsQueries = Help::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contactUsQueries', ['contactUsQueries' => $contactUsQueries]);
    }

    public function AnswerContactUsQuery($slug){
        $contactUsQuery = Help::where('slug', $slug)->first();
        $contactUsQuery->answered = 1;
        $contactUsQuery->save();
        return back()->with('success', 'Query Answered');
    }

}
