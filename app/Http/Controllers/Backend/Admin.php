<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin as AdminAdmin;
use App\Models\Admin\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    protected $clients;
    public function __construct(){
        $this->clients = new Clients();
    }
    public function AdminLogin()
    {
        return view('Backend.login');
    }

    public function AdminLoginProccess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $adminUser = AdminAdmin::where('email', $credentials['email'])->first();

        if ($adminUser) {
            $password = $request->request->get('password');
            if ($password) {
                $request->session()->put('isAdmin', $adminUser->id);


                
                $request->session()->put('adminName', $adminUser->name);
                $request->session()->put('adminImage', $adminUser->image);
                $request->session()->put('adminEmail', $adminUser->email);

                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('error', 'Invalid Password.');
            }
        } else {
            return back()->with('error', 'Invalid Email.');
        }
    }

    public function adminDashboard()
    {
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Dashboard',
            'url' => route('admin.dashboard')
        ];
        $data['title'] = "Dashboard";

        return view('Backend.Pages.dashboard', $data);
    }


    // logout function
    public function logoutAdmin(Request $request)
    {
        $request->session()->forget('isAdmin');
        $request->session()->forget('userName');
        $request->session()->forget('userImage');
        $request->session()->forget('userEmail');
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }


    // Website Settings
    public function mediaSetting()
    {
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Website Settings',
            'url' => ""
        ];
        $data['breadcrumbs'][] = [
            'text' => 'Media',
            'url' => route('admin.mediaSetting')
        ];
        $data['title'] = "Media Settings";
        return view('Backend.Pages.mediaSetting', $data);
    }

    public function storeMediaSetting(Request $request, $name = null)
    {
        // for logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = $name . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move('uploads/logo/', $logoName);
            DB::table('settings')->update(['value' => 'uploads/logo/' . $logoName]);
        }

        // for favicon
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = $name . '_favicon.' . $favicon->getClientOriginalExtension();
            $favicon->move('uploads/favicon/', $faviconName);
            DB::table('settings')->update(['value' => 'uploads/favicon/' . $faviconName]);
        }

        return redirect()->route('admin.mediaSetting')->with('success', 'Settings saved successfully.');
    }

    // profile page
    public function profile()
    {
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Profile',
            'url' => route('admin.profile')
        ];
        $data['title'] = "Profile";
        return view('Backend.Pages.profile', $data);
    }
}
