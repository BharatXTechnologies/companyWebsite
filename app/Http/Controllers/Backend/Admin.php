<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin as AdminAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function AdminLogin(){
        return view('Backend.login');
    }

   public function AdminLoginProccess(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $adminUser = AdminAdmin::where('email', $credentials['email'])->first();

        if($adminUser){
            $password = $request->request->get('password');
            if($password){
                $request->session()->put('isAdmin' , $adminUser->id);
                $request->session()->put('adminName' , $adminUser->name);
                $request->session()->put('adminImage' , $adminUser->image);
                $request->session()->put('adminEmail' , $adminUser->email);

                return redirect()->route('admin.dashboard');
            }else{
                return back()->with('error', 'Invalid Password.');
            }
        }else{
            return back()->with('error', 'Invalid Email.');
        }
   }

    public function adminDashboard(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Dashboard',
            'url' => route('admin.dashboard')
        ];
        $data['title'] = "Dashboard";

        return view('Backend.Pages.dashboard', $data);
    }


    // logout function
    public function logoutAdmin(Request $request){
        $request->session()->forget('isAdmin' );
        $request->session()->forget('userName' );
        $request->session()->forget('userImage' );
        $request->session()->forget('userEmail' );
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
