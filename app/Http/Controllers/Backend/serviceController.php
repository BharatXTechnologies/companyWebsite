<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\feature;
use App\Models\Admin\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class serviceController extends Controller
{
    protected $features;
    protected $services;
    public function __construct(){
        $this->features = new feature();
        $this->services = new service();
    }
    public function services(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Services',
            'url' => route('admin.services')
        ];
        $data['title'] = "Service List";
        $data['servicesData'] = $this->services->getService();
        return view('Backend.services.services', $data);
    }

    // add form services
    public function addService(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Services',
            'url' => route('admin.services')
        ];
        $data['breadcrumbs'][] = [
            'text' => 'Add Service',
            'url' => route('admin.addService')
        ];
        $data['title'] = "Add Service";
        $data['features'] = $this->features->getFeature();
        return view('Backend.services.addService', $data);
    }

    // store and upadate service
    public function storeService(Request $request, $id = null){

        // Define validation rules
        $rules = [
            'service_name' => 'required|string|max:255',
            'service_icon' => 'required|string|max:255',
            'service_s_desc' => 'required|string',
            'feature_ids' => 'required|array',
            'feature_ids.*' => 'exists:features,id',
            'service_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'service_desc' => 'nullable|string',
        ];

        // Custom error messages (optional)
        $messages = [
            'service_name.required' => 'The service name is required.',
            'service_icon.required' => 'The service icon is required.',
            'service_s_desc.required' => 'The small service description is required.',
            'feature_ids.required' => 'Please select at least one technology.',
            'service_image.image' => 'The project image must be an image file.',
            'service_image.mimes' => 'The project image must be a file of type: jpeg, png, jpg.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // check folder is available
        $uploadPath = public_path('assets/uploads/services');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true);
        }
        
        // Check if image is being uploaded
        if ($request->hasFile('service_image')) {
            // Get the new image
            $image = $request->file('service_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // update project data
            // if(!is_null($id)){
            //     // Fetch the project by ID (ensure the ID is valid)
            //     $project = $this->project->getProjects($id);
            //     if ($project && $project->thumbnail) {
            //         $oldImagePath = $uploadPath . '/' . $project->thumbnail;
            
            //         // Delete the old image if it exists
            //         if (File::exists($oldImagePath)) {
            //             File::delete($oldImagePath);
            //         }
            //     }   
            // }
        
            // Move the new image to the folder
            $image->move($uploadPath, $imageName);
            $imageData['image'] = $imageName;
        }

        // Prepare data for insertion

        $feature_ids = implode(',', $request->feature_ids);

        $data = [
            'name' => $request->service_name,
            'icon' => $request->service_icon,
            'image' => $imageData['image'],
            'small_desc' => $request->service_s_desc,
            'full_desc' => $request->service_desc,
            'feature_ids' => $feature_ids,
        ];

        // insert data
        if($this->services->insert($data)){
            return redirect()->route('admin.services')->with('success', 'Service added successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to add service.')->withInput();
        }
    }

    // change service status
    public function changeServiceStatus($id){
        if(is_null($id)) {
            return redirect()->route('admin.services')->with('error', 'Service ID does not exist.');
        }
        $service = $this->services->find($id);
        $service->status =!$service->status;
        if($service->save()){
            return redirect()->route('admin.services')->with('success', 'Service status changed successfully.');
        } else {
            return redirect()->route('admin.services')->with('error', 'Failed to change service status.');
        }
    }
}
