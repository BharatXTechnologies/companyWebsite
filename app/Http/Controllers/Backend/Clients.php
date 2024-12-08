<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clients as AdminClients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Clients extends Controller
{
    protected $clients;
    public function __construct(){
        $this->clients = new AdminClients();
    }

    public function ClientsList()
    {
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Clients',
            'url' => route('admin.clients')
        ];
        $data['title'] = "Clients List";
        $data['clients'] = $this->clients->getClientsData();
        // return view('Backend.Pages.clients', $data);
        return view('Backend.Pages.clients', $data);
    }

    public function addClient($clientId = null)
    {
        $clientData = null;
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Clients',
            'url' => route('admin.clients')
        ];
        if (!is_null($clientId)) {
            $data['breadcrumbs'][] = [
                'text' => 'Edit client',
                'url' => route('admin.editClient', ['id' => $clientId])
            ];
            $data['title'] = "Edit client";
            $clientData = $this->clients->getClientsData($clientId);
            if(empty($clientData)){
                return redirect()->route('admin.clients')->with('error', 'Client not found.');
            }
            return view('Backend.Pages.addClient', $data, compact('clientData'));
        }
        $data['breadcrumbs'][] = [
            'text' => 'Add Client',
            'url' => route('admin.addClient')
        ];
        $data['title'] = "Add Client";
        return view('Backend.Pages.addClient', $data, compact('clientData'));
    }

    public function storeClient(Request $request, $clientId = null){
    // Validation rules

    // Validate the incoming request data
    $validatedData = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'business_name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email' . ($clientId ? ",$clientId" : ''),
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
    if($validatedData->fails()){
        return redirect()->back()->withErrors($validatedData)->withInput();
    }
    // Prepare data for insertion/updation

    $data = [
        'contact_name' => $request->name,
        'business_name' => $request->business_name,
        'address' => $request->address ?? null,
        'email' => $request->email,
        'phone' => $request->phone,
        'city' => $request->city ?? null,
        'state' => $request->state ?? null,
        'country' => $request->country ?? null,
        'pin' => $request->pin ?? null,
        'gst_no' => $request->gst ?? null,
        'pan_no' => $request->pan ?? null,
        'status' => $request->status,
    ];

    if (!is_null($clientId)) {
        // Update existing client
        $this->clients->where('id', $clientId)->update($data);
        return redirect()->route('admin.clients')->with('success', 'Client updated successfully.');
    } else {
        // Insert new client
        $this->clients->insert($data);
        return redirect()->route('admin.clients')->with('success', 'Client added successfully.');
    }
}

    // toggle status of clients
    public function toggleClientStatus($id)
    {
        if(is_null($id)) {
            return redirect()->route('admin.clients')->with('error', 'Client ID does not exist.');
        }
        $client = $this->clients->getClientsData($id);
        if(empty($client)){
            return redirect()->route('admin.clients')->with('error', 'Client not found.');
        }
        $client->status = !$client->status;
        $updateStatus = $client->update(['status' => $client->status]);
        if($updateStatus){
            return redirect()->route('admin.clients')->with('success', 'Client status updated successfully.');
        }else{
            return redirect()->route('admin.clients')->with('error', 'Failed to update client status.');
        }
    }

    // delete a client
    public function deleteClient($id)
    {
        if(is_null($id)) {
            return redirect()->route('admin.clients')->with('error', 'Client ID does not exist.');
        }
        $client = $this->clients->getClientsData($id);
        if(empty($client)){
            return redirect()->route('admin.clients')->with('error', 'Client not found.');
        }
        if($client->delete()){
            return redirect()->route('admin.clients')->with('success', 'Client deleted successfully.');
        }else{
            return redirect()->route('admin.clients')->with('error', 'Failed to delete client.');
        }
    }
}
