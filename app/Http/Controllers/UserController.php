<?php

namespace App\Http\Controllers;

use App\Models\Help;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user.Register');
    }

    public function sendRegOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|unique:users,mobile',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 200);
        }

        $otp = generate_otp();
        $expiresAt = otp_expiry(5);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->otp = $otp;
        $user->password = bcrypt($otp);
        $user->otp_expires_at = $expiresAt;
        $user->save();
        Mail::to($user->email)->send(new SendOtpMail($otp, 'register'));
        return response()->json(['success' => true, 'otp' => $otp]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        $otp_exp = $user->otp_expires_at;

        if ($user->otp !== (int) $request->otp || Carbon::now()->greaterThan($otp_exp)) {
            return back()->withInput()->withErrors(['otp' => 'Invalid or expired OTP'])->with('modal_open', true);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->otp,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            return back()->with('success', 'Registered Successfully');
        }

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        // Auth::login($user);

        // return redirect()->route('user.dashboard')->with('success','Registered Successfully');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function sendLoginOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Invalid Credentials']);
        }

        // Generate OTP and otp_expiry are custom global helper functions
        $otp = generate_otp();
        // otp_expiry function receives time in minutes and set the expiry according to it
        $expiresAt = otp_expiry(5);

        session()->put(['user_email' => $user->email, 'otp_expiry' => $expiresAt]);

        $user->otp = $otp;
        $user->password = bcrypt($otp);
        $user->otp_expires_at = $expiresAt;
        $user->save();
        Mail::to($user->email)->send(new SendOtpMail($otp, 'login'));
        return response()->json(['success' => true, 'message' => 'OTP sent to your email.']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6',
        ]);

        $otp_exp = User::where('otp', $request->otp)->get('otp_expires_at');
        if (Carbon::now()->greaterThan(session()->get('otp_expiry'))) {
            return back()->withErrors(['otp' => 'OTP has expired.']);
        }

        $credentials = [
            'email' => session()->get('user_email'),
            'password' => $request->otp,
        ];

        session()->forget(['user_email', 'otp_expiry']);

        if (Auth::guard('web')->attempt($credentials)) {
            return back()->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showProfile()
    {
        $id = Auth::guard('web')->user()->id;
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|digits:10',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|digits:6',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->withErrors('User not found!');
        }
        // Update user details
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->pincode = $request->pincode;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('home.page');
    }

    public function storeContactQuery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'nullable|email',
            'city' => 'required|string',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode('<br>', $errors);
            return redirect()->back()->with('error', $errorMessage);
        }

        $data = $validator->validated();
        $data['user_id'] = Auth::guard('web')->user()->id ?? NULL;
        Help::create($data);
        return back()->with('success', 'Query submitted successfully we will get in touch with you soon!');
    }
}
