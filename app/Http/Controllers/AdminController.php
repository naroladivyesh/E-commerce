<?php

namespace App\Http\Controllers;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Category;
Use App\Product;

class AdminController extends Controller
{
    //
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>['1']])){
               Session::put('adminSession',$data['email']);
               return redirect()->route('dashboard');
                
            }
            else{
                 return redirect('/admin')->with('message_error','Invalid User and Password');
            }
        }
        return view('admin.admin_login');
    }
    
    public function dashboard()
    {   
        $session = Session::has('adminSession');
        if($session)
        {
            //usr total 
            $user = User::where(['admin'=>'0'])->count();
            
            //Total number of Category
            $category = Category::where(['parent_id'=>'0'])->count();
            //$category1 = Category::get();
            // $cid = $category1->id;
            
            //total number of product 
            $products = Product::count();
            //$products1 = Product::get();
            //$pcid = $products1->categoty_id;

            
            
            return view('admin.dashboard')->with(compact('category','products','user'));
        }else{
            return redirect('/admin')->with('message_login','Please login via valid email and Password');
        }
       // return view('admin.dashboard');
       
       //Total number of Category
    //    $category = Category::count();
    //    $cid = $category->id;
       

    //    //total number of product 
    //    $products = Product::count();
    //    $pid = $products->id;


    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        // echo "<pre>"; print_r($current_password); die; 
        $check_password = User::where(['admin'=>'1']);
        //$check_password = Auth::user()->password;
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user = Auth::user()->email;
            $check_password = User::where(['email' => $user])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('message_success','Password updated Successfully!');
            }else{
                return redirect('/admin/settings')->with('message_error', 'Incorrect current Password!');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('message_success','You are Logout SuccessFully...!!!');
    }
}
