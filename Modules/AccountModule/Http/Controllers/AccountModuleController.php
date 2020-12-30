<?php

namespace Modules\AccountModule\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Validator;

// use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;

class AccountModuleController extends Controller
{
    public function index(){
        return view('accountmodule::personalDetails');
    }
    public function register(){
            return view('accountmodule::register');
          }
      
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        if (!$validator->fails()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 1
            ]);
            return response()->json([
                'success' => 'Register success',
                'route' => route('home')
            ], 200);
        }
        return response()->json([
            'error' => $validator->errors()->first(),
            'data' => $request->all()
        ], 403);
    }

    public function login(){
        return view('accountmodule::login');
    }

    public function authenticate(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            if (!$validator->fails()) {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    if(Auth::user()->role_id == 0){
                        return \response()->json([
                            "success_admin" => route('admin-layout'),
                        ], 200);
                    }
                    else{
                        return \response()->json([
                            "success_home" => route('home'),
                        ], 200);
                    }
                }else{
                    return response()->json([
                        'error' => 'Oppes! You have entered invalid credentials',
                    ], 403);
                }
            }
            return response()->json([
                'error' => $validator->errors()->first()
            ], 403);
    }

    public function personalDetails(){
        return view('accountmodule::personalDetails');
    }

    public function storeEditUserInfor(Request $request){
        User::where('email',Auth::user()->email)
        ->update([
            'name'=>$request->name,
            'phonenumber'=>$request->phonenumber,
            'dateofbirth'=>$request->dateofbirth
        ]);
        Auth::user()->phonenumber = $request->phonenumber;
        Auth::user()->dateofbirth = $request->dateofbirth;
    
        return redirect(route('personalDetails'))->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function home(){
        return redirect()->route('main');
    }

    public function orderHistory(){
        $all_orders = DB::table("orders")
        ->where('user_id',Auth::user()->id)->get();
        // dd($all_orders);
        return view('accountmodule::orderHistory', compact('all_orders'));
    }

    // Cotroller quan ly nguoi dung
    public function all_user(){
        $all_user = DB::table('users')->get();
        $manager_user = view('accountmodule::users')->with('all_user', $all_user);
        return view('admin')->with('all_user', $manager_user); 
    }

    public function changeUserRoleToAdmin($user_id){
        DB::table('users')->where('id', $user_id)->update(['role_id'=>0]);
        Session::put('message','User Role Changed To Admin Successfully !');
        return \redirect()->action([AccountModuleController::class, 'all_user']);
    }
    
    public function cancelAdminRole($user_id){
        DB::table('users')->where('id', $user_id)->update(['role_id'=>1]);
        Session::put('message','Admin Role Canceled !');
        return \redirect()->action([AccountModuleController::class, 'all_user']);
    }

    public function delete_user($user_id){
        DB::table('users')->where('id', $user_id)->delete();
        Session::put('message','Delete User Successfully');
        return \redirect()->action([AccountModuleController::class, 'all_user']);
    }

}


