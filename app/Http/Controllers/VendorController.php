<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Category;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{


    // Send OTP
    public function sendOtp(Request $request)
    {

        // Validate the email field
        $request->validate([
            'email' => 'required|email',
            // 'password' => 'required|min:8',
        ]);

        // Check if email exists in the database
        $vendor = Vendor::where('email', $request->email)->first();

        if ($vendor) {
            // If OTP is verified
            if ($vendor->otp_verified == 1) {
                return back()->with([
                    'error' => 'Email already Register', // Error message for verified email
                ]);
            }

            // If OTP is not verified, resend the OTP
            $otp = random_int(100000, 999999);
            $expiresAt = Carbon::now()->addMinutes(10);

            $vendor->otp = $otp;
            $vendor->otp_expires_at = $expiresAt;
            $vendor->save();

            // Send the OTP email (optional)
            // Mail::to($vendor->email)->send(new OTPMail($otp));

            // Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            //     $message->to($request->email)->subject('OTP Verification');
            // });
            return back()->with([
                'success' => 'OTP resent to your email.',
                'email' => $vendor->email, // Additional parameter
            ]);
        }

        // If email doesn't exist, create a new vendor and send OTP
        $otp = random_int(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10);

        $newVendor = new Vendor();
        $newVendor->email = $request->email;
        // $newVendor->password = bcrypt($request->password);
        $newVendor->otp = $otp;
        $newVendor->password = bcrypt($otp);
        $newVendor->otp_expires_at = $expiresAt;
        $newVendor->save();

        // Send the OTP email (optional)
        // Mail::to($newVendor->email)->send(new OTPMail($otp));

        // Send OTP via email
        // Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
        //     $message->to($request->email)->subject('OTP Verification');
        // });

        return back()->with([
            'success' => 'OTP sent to your email.',
            'email' => $request->email, // Additional parameter
        ]);
    }

    // Verify OTP 
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->otp,
        ];

        $vendor = Vendor::where('email', $request->email)->first();

        if (!$vendor || $vendor->otp !== $request->otp || Carbon::now()->greaterThan($vendor->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }
        // Clear OTP
        $vendor->update(['otp' => null, 'otp_expires_at' => null, 'otp_verified' => 1]);

        session()->put('email1', $request->email);

        // Attempt login using the vendor guard
        if (Auth::guard('vendor')->attempt($credentials)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            return redirect()->route('vendor.profile')->with('success', 'Registration successful! Now update your profile.');
        }

        // return redirect('/registration-form')->with('email', $request->email);
    }

    // Show registration form
    public function showRegistrationForm(Request $request)
    {
        if (!$request->session()->has('email')) {
            return redirect('/list-your-bussiness');
        }
        $states = State::all();
        $categories = Category::all();
        $businessTypes = BusinessType::all();
        return view('registration', ['states' => $states, 'categories' => $categories, 'email' => $request->session()->get('email'), 'businessTypes' => $businessTypes]);
    }

    // Store vendor details
    // public function storeVendor(Request $request)
    // {
    //     // Validate the input
    //     $request->validate([
    //         'business_name' => 'required|string',
    //         'mobile' => 'required|digits:10',
    //         'whatsapp_no' => 'nullable|digits:10',
    //         'address' => 'required|string',
    //         'city' => 'required|string',
    //         'state' => 'required|string',
    //         'pin_code' => 'required|digits:6',
    //         'categories' => 'required',
    //         'type' => 'required|string',
    //         'search_terms' => 'nullable|string',
    //         'name' => 'required|string',

    //     ]);

    //     dd($request->all());
    //     // Find vendor based on session email
    //     $vendor = Vendor::where('email', session()->get('email1'))->first();

    //     if (!$vendor) {
    //         return redirect()->back()->withErrors(['email' => 'Vendor not found!']);
    //     }

    //     // Update vendor details
    //     $vendor->business_name = $request->business_name;
    //     $vendor->mobile = $request->mobile;
    //     $vendor->whatsapp_no = $request->whatsapp_no;
    //     $vendor->address = $request->address;
    //     $vendor->city = $request->city;
    //     $vendor->state = $request->state;
    //     $vendor->pin_code = $request->pin_code;
    //     $vendor->categories = $request->categories;
    //     // $vendor->type = $request->type;
    //     $vendor->search_terms = $request->search_terms;
    //     $vendor->name = $request->name;

    //     $vendor->save();

    //     $vendor->businessTypes()->attach($request->type);

    //     // Log in the vendor after registration
    //     Auth::guard('vendor')->login($vendor);

    //     // Redirect to the vendor dashboard
    //     return redirect()->route('venderdashboard')->with('success', 'Registration successful! You are now logged in.');
    // }


    public function storeVendor(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|exists:vendors,email',
            'business_name' => 'required|string',
            'mobile' => 'required|digits:10',
            'whatsapp_no' => 'nullable|digits:10',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pin_code' => 'required|digits:6',
            'categories' => 'required|exists:categories,id',
            'business_type_ids' => 'required|array',
            'business_type_ids.*' => 'exists:business_types,id',
            'search_terms' => 'nullable|string',
            'name' => 'required|string',
        ]);

        // Get vendor by email (sent in hidden input)
        $vendor = Vendor::where('email', $request->email)->first();

        if (!$vendor) {
            return redirect()->back()->withErrors(['email' => 'Vendor not found!']);
        }

        // Update vendor details
        $vendor->business_name = $request->business_name;
        $vendor->mobile = $request->mobile;
        $vendor->whatsapp_no = $request->whatsapp_no;
        $vendor->address = $request->address;
        $vendor->city = $request->city;
        $vendor->state = $request->state;
        $vendor->pin_code = $request->pin_code;
        $vendor->categories = $request->categories; // assuming this is a single FK
        $vendor->search_terms = $request->search_terms;
        $vendor->name = $request->name;

        $vendor->save();

        // Sync business types in pivot table
        $vendor->businessTypes()->sync($request->business_type_ids);

        // Log in vendor
        Auth::guard('vendor')->login($vendor);

        // Redirect to dashboard
        return redirect()->route('venderdashboard')->with('success', 'Registration successful! You are now logged in.');
    }


    public function dashboard()
    {
        $vendor = Vendor::with('businessTypes')->findOrFail(Auth::guard('vendor')->user()->id);
        return view('vendor/dashboard', ['vendor' => $vendor]);
    }
    public function login()
    {
        return view('login');
    }

    public function sendLoginOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $vendor = Vendor::where('email', $request->email)->first();
        if (!$vendor) {
            return back()->with('error', 'Invalid Credentials');
        }

        $otp = random_int(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10);

        $vendor->otp = $otp;
        $vendor->password = bcrypt($otp);
        $vendor->otp_expires_at = $expiresAt;
        $vendor->save();

        // Send the OTP email (optional)
        // Mail::to($vendor->email)->send(new OTPMail($otp));

        // Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
        //     $message->to($request->email)->subject('OTP Verification');
        // });
        return back()->with([
            'success' => 'OTP sent to your email.',
            'email' => $vendor->email, // Additional parameter
        ]);
    }
    public function loginStore(Request $request)
    {
        // dd($request->all());
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required',
        ]);

        $vendor = Vendor::where('email', $request->email)->first();
        if (!$vendor) {
            return back()->with('error', 'Invalid Credentials');
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->otp,
        ];

        if ($vendor->status == 0 || $vendor->status == 1) {
            // Attempt login using the vendor guard
            if (Auth::guard('vendor')->attempt($credentials)) {
                // Regenerate session to prevent fixation attacks
                $request->session()->regenerate();

                // Redirect to the vendor dashboard
                return redirect()->route('venderdashboard')->with('success', 'Logged in successfully.');
            }

            // If login fails, redirect back with an error
            return back()->with('error', 'Invalid email or otp.');
        } else {
            return back()->with('error', 'Your account is rejected.');
        }
    }


    public function showProfile()
    {
        $id = Auth::guard('vendor')->user()->id;

        $vendor = Vendor::find($id);
        $states = State::all();
        $categories = Category::all();
        $businessTypes = BusinessType::all();
        return view('vendor.profile', compact('vendor', 'categories', 'states', 'businessTypes'));
    }
    // public function updateProfile(Request $request, $id)
    // {
    //     $request->validate([
    //         'business_name' => 'required|string',
    //         'mobile' => 'required|digits:10',
    //         'whatsapp_no' => 'nullable|digits:10',
    //         'name' => 'required|string',
    //         'block_building' => 'required|string',
    //         'street_colony' => 'required|string',
    //         'area' => 'required|string',
    //         'landmark' => 'required|string',
    //         'city' => 'required|string',
    //         'state' => 'required|string',
    //         'pin_code' => 'required|digits:6',
    //         'categories' => 'required',
    //         'type' => 'required|string',
    //         'search_terms' => 'nullable|string',
    //         'email' => 'required|email',
    //         'description' => 'required',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    //     ]);
    //     $vendor = Vendor::find($id);
    //     if (!$vendor) {
    //         return redirect()->back()->withErrors('Vendor not found!');
    //     }
    //     $image = $request->file('image');
    //     if (!empty($image)) {
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/vendor'), $imageName);
    //         $vendor->image = $imageName;
    //     }

    //     // Update vendor details
    //     $vendor->business_name = $request->business_name;
    //     $vendor->mobile = $request->mobile;
    //     $vendor->whatsapp_no = $request->whatsapp_no;
    //     $vendor->block_building = $request->block_building;
    //     $vendor->street_colony = $request->street_colony;
    //     $vendor->area = $request->area;
    //     $vendor->landmark = $request->landmark;
    //     $vendor->city = $request->city;
    //     $vendor->state = $request->state;
    //     $vendor->pin_code = $request->pin_code;
    //     $vendor->categories = $request->categories;
    //     $vendor->type = $request->type;
    //     $vendor->search_terms = $request->search_terms;
    //     $vendor->name = $request->name;
    //     $vendor->email = $request->email;
    //     $vendor->description = $request->description;
    //     $vendor->save();
    //     return redirect()->back()->with('success', 'Profile updated successfully');
    // }



    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'business_name' => 'required|string',
            'mobile' => 'required|digits:10',
            'whatsapp_no' => 'nullable|digits:10',
            'name' => 'required|string',
            'block_building' => 'required|string',
            'street_colony' => 'required|string',
            'area' => 'required|string',
            'landmark' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pin_code' => 'required|digits:6',
            'categories' => 'required',
            'business_type_ids' => 'required|array|min:1',
            'business_type_ids.*' => 'exists:business_types,id',
            'search_terms' => 'nullable|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $vendor = Vendor::find($id);

        if (!$vendor) {
            return redirect()->back()->withErrors('Vendor not found!');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/vendor'), $imageName);
            $vendor->image = $imageName;
        }

        // Update vendor details
        $vendor->business_name = $request->business_name;
        $vendor->mobile = $request->mobile;
        $vendor->whatsapp_no = $request->whatsapp_no;
        $vendor->block_building = $request->block_building;
        $vendor->street_colony = $request->street_colony;
        $vendor->area = $request->area;
        $vendor->landmark = $request->landmark;
        $vendor->city = $request->city;
        $vendor->state = $request->state;
        $vendor->pin_code = $request->pin_code;
        $vendor->categories = $request->categories;
        $vendor->search_terms = $request->search_terms;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->description = $request->description;

        $vendor->save();

        // Sync business types
        $vendor->businessTypes()->sync($request->business_type_ids);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }




    public function addServices($vendor_id)
    {
        $vendor = Vendor::where('id', $vendor_id)->with('category')->first();
        return view('vendor.service.addServices', ['vendor' => $vendor]);
    }

    public function saveServices()
    {
    }

    public function addProducts()
    {
    }

    public function logout()
    {
        // Use the vendor guard to log out
        Auth::guard('vendor')->logout();

        // Invalidate the session and regenerate the CSRF token
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Redirect to the login page or homepage
        // return redirect()->route('vendor.login')->with('success', 'You have been logged out successfully.');
        return redirect('/list-your-bussiness')->with('success', 'You have been logged out successfully.');
    }

    //api function
    public function cities(Request $request)
    {
        $state = State::where('name', $request->state)->first();
        $cities = City::where('state_id', $state->id)->get();
        return response()->json(['cities' => $cities]);
    }
}
