<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\FeaturesImport;
use App\Models\Admin\feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class featureController extends Controller
{
    protected $features;
    public function __construct(){
        $this->features = new feature();
    }
    public function Features(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Features',
            'url' => route('admin.features')
        ];
        $data['title'] = "Feature List";
        $data['featuresData'] = $this->features->getFeature();
        return view('Backend.features.features', $data);
    }

    public function storeFeature(Request $request){
        // Define validation rules
        $rules = [
            'feature_name' => 'required|string|max:255',
            'feature_icon' => 'nullable|image|mimes:jpeg,png,jpg',
            'feature_desc' => 'nullable|string',
        ];

        // Custom error messages (optional)
        $messages = [
            'feature_name.required' => 'The project name is required.',
            'feature_icon.image' => 'The project image must be an image file.',
            'feature_icon.mimes' => 'The project image must be a file of type: jpeg, png, jpg, gif.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // check folder is available
        $uploadPath = public_path('assets/uploads/features');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true);
        }
        
        // Check if image is being uploaded
        if ($request->hasFile('feature_icon')) {
            // Get the new image
            $icon = $request->file('feature_icon');
            $imageName = $request->feature_name . '-' . time() . '.' . $icon->getClientOriginalExtension();
            // Move the new image to the folder
            $icon->move($uploadPath, $imageName);
            $imageData['icon'] = $imageName;
        }

        // Prepare data for insertion
        $data = [
            'name' => $request->feature_name,
            'icon' => isset($imageData['icon'])? $imageData['icon'] : null,
            'description' => $request->feature_desc,
        ];

        if($this->features->insert($data)){
            return redirect()->route('admin.features')->with('success', 'Feature added successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    //import features
    public function importFeatures(Request $request){
        $request->validate([
            'importFile' => 'required|mimes:xlsx,csv',
        ]);

        if(Excel::import(new FeaturesImport, $request->file('importFile'))){
            return back()->with('success', 'Data Imported Successfully!');
        }else{
            return back()->with('error', 'An error occurred while importing data.');
        }

    }

    // delete feature
    public function deleteFeature($id){
        if(is_null($id)){
            return redirect()->route('admin.features')->with('error', 'Feature ID - ' . $id . ' does not exist.');
        } else{
            if($this->features->deleteFeature($id)){
                return redirect()->route('admin.features')->with('success', 'Feature ID - '. $id .' deleted successfully.');
            } else{
                return redirect()->route('admin.features')->with('error', 'Failed to delete feature.');
            }
        }
    }
}
