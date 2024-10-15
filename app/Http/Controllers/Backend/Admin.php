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

    public function ClientsList(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Clients',
            'url' => route('admin.clients')
        ];
        $data['title'] = "Clients List";
        $data['clients'] = DB::table('clients')->get();
        // return view('Backend.Pages.clients', $data);
        return view('Backend.Pages.clients', $data);
    }

    public function addClient(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Clients',
            'url' => route('admin.clients')
        ];
        $data['breadcrumbs'][] = [
            'text' => 'Add Client',
            'url' => route('admin.addClient')
        ];
        $data['title'] = "Add Client";
        return view('Backend.Pages.addClient', $data);
    }

    public function storeClient(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|numeric|digits:10',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pin' => 'nullable|numeric',
            'gst' => 'nullable|string|max:15',
            'pan' => 'nullable|string|max:10',
            'status' => 'required|boolean',
            'address' => 'nullable|string',
            'country' => 'nullable|string|max:255',
        ]);

        // Insert the validated data into the 'clients' table
        DB::table('clients')->insert([
            'contact_name' => $request->name,
            'business_name' => $request->business_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pin' => $request->pin,
            'gst_no' => $request->gst,
            'pan_no' => $request->pan,
            'status' => $request->status,
        ]);

        // Redirect back to the clients list with a success message
        return redirect()->route('admin.clients')->with('success', 'Client added successfully.');
    }

    // toggle status of clients
    public function toggleClientStatus($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();

        // Toggle the status
        $client->status =!$client->status;

        // Update the client status in the 'clients' table
        DB::table('clients')->where('id', $id)->update(['status' => $client->status]);

        // Redirect back to the clients list with a success message
        return redirect()->route('admin.clients')->with('success', 'Client status updated successfully.');
    }

    // profile page
    public function profile(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Profile',
            'url' => route('admin.profile')
        ];
        $data['title'] = "Profile";
        return view('Backend.Pages.profile', $data);
    }
}
