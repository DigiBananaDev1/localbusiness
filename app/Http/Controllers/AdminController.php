<?php

namespace App\Http\Controllers;

use App\Imports\BulkUploadVendors;
use App\Models\Admin;
use App\Models\AdminActivityLogs;
use App\Models\BusinessType;
use App\Models\Category;
use App\Models\City;
use App\Models\Help;
use App\Models\Image;
use App\Models\Query;
use App\Models\State;
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

    public function ContactUsQueries()
    {
        $contactUsQueries = Help::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contactUsQueries', ['contactUsQueries' => $contactUsQueries]);
    }

    public function AnswerContactUsQuery($slug)
    {
        $contactUsQuery = Help::where('slug', $slug)->first();
        $contactUsQuery->answered = 1;
        $contactUsQuery->save();
        return back()->with('success', 'Query Answered');
    }



    public function index()
    {
        $users = Admin::where('role', '!=', 'admin')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            // 'role' => 'required|string',
            'display_role' => 'required|string',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        // $admin->role = $request->role;
        $admin->display_role = $request->display_role;
        $admin->save();

        Log::info('Admin Log', ['message' => 'New admin user created: ' . $admin->name]);
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'display_role' => 'required|string',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        // $admin->role = $request->role;
        $admin->display_role = $request->display_role;

        $admin->save();

        Log::info('Admin Log', ['message' => 'Admin user updated: ' . $admin->name]);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        return view('admin.index');
    }


    // change password for user
    public function UserupdatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Admin::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        Log::info('Admin Log', ['message' => 'User password updated for user ID: ' . $id]);
        return redirect()->route('admin.users')->with('success', 'User password updated successfully');
    }


    // create Vender all function
    public function vendorindex()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.vendor.index', ['vendors' => $vendors]);
    }
    public function vendorcreate()
    {
        $states = State::all();
        $businessTypes = BusinessType::all();
        return view('admin.vendor.create', compact('states', 'businessTypes'));
    }
    
    public function vendorstore(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
        ]);

        $vendor = new Vendor();
        $vendor->business_name = $request->business_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->city = $request->city;
        $vendor->address = $request->address;
        $vendor->status = 0; // default status
        $vendor->save();

        Log::info('Admin Log', ['message' => 'New vendor created: ' . $vendor->business_name]);
        return redirect()->route('admin.vendors')->with('success', 'Vendor created successfully');
    }
    public function vendoredit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendor.edit', compact('vendor'));
    }
    public function vendorupdate(Request $request, $id)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email,' . $id,
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
        ]);
        $vendor = Vendor::findOrFail($id);
        $vendor->business_name = $request->business_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->city = $request->city;
        $vendor->address = $request->address;
        $vendor->save();
        Log::info('Admin Log', [
            'message' => 'Vendor updated: ' . $vendor
                ->business_name
        ]);

        return redirect()->route('admin.vendors')->with('success', 'Vendor updated successfully');
    }
    public function vendordestroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        Log::warning('Admin Log', ['message' => 'Vendor deleted: ' . $vendor->business_name]);
        return redirect()->route('admin.vendors')->with('success', 'Vendor deleted successfully');
    }



}
