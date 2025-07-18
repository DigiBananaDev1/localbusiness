<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
    public function showQueries()
    {
        $queries = Query::with(['vendor'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.queries', ['queries' => $queries]);
    }

    public function showUserQueries($user_id)
    {
        $queries = Query::with(['vendor'])->where('is_deleted', 0)->where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(12);
        return view('userQueries', ['queries' => $queries]);
        // return view('user.queries', ['queries' => $queries]);
    }

    public function showVendorQueries($vendor_id)
    {
        $queries = Query::where('vendor_id', $vendor_id)->where('forwarded', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('vendor.queries', ['queries' => $queries]);
    }

    public function createQuery(request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'service_id' => 'string',
            'vendor_id' => 'required | exists:vendors,id',
            'name' => 'required | string',
            'email' => 'required | email',
            'mobile' => 'required | numeric ',
            'message' => 'required | string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = Auth::guard('web')->user();
        $query = new Query();
        if ($user) {
            $query->user_id = $user->id;
        }
        $query->vendor_id = $request->vendor_id;
        $query->services_id = $request->service_id;
        $query->user_name = $request->name;
        $query->user_email = $request->email;
        $query->user_mobile = $request->mobile;
        $query->query = $request->message;
        $query->save();
        return back()->with(['success' => 'Query Submitted Successfully']);
    }

    public function forwardQuery($query_id)
    {
        $query = Query::find($query_id);
        $query->forwarded = 1;
        $query->save();
        Log::info('Admin Log',['message' => 'Query forwarded to vendor by admin']);
        return back()->with('success', 'Query Forwarded Successfully');
    }

    //this function will soft delete the query of the user but available for admin
    public function deleteUserQuery($query_id)
    {
        $query = Query::find($query_id);
        $query->is_deleted = 1;
        $query->save();
        return back()->with('success', 'Query Deleted Successfully');
    }
    public function destroy($query_id)
    {
        $query = Query::find($query_id);
        $query->delete();
        Log::warning('Admin Log',['message' => 'Query Deleted by admin']);
        return back()->with('success', 'Query Deleted Successfully');
    }
}
