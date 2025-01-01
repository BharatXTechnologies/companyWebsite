<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class Technology extends Controller
{
    protected $technologies;
    public function __construct(){
        $this->technologies = new Technologies();
    }
    public function index(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Technologies',
            'url' => route('admin.technologies'),
        ];
        $data['title'] = "Technologies List";
        $data['technologiesData'] = $this->technologies->getTechnologies();
        return view('Backend.Technologies.technologiesList', $data);
    }

    public function addTechnology($tech_id = null){
        $technologyData = null;
        $data = [
            'breadcrumbs' => [
                [
                    'text' => 'Technologies',
                    'url' => route('admin.technologies'),
                ]
            ],
            'title' => $tech_id ? "Edit Technology" : "Add Technology",
        ];
        
        $data['breadcrumbs'][] = [
            'text' => $tech_id ? 'Edit Technology' : 'Add Technology',
            'url' => $tech_id ? route('admin.editTechnology', ['id' => $tech_id]) : route('admin.addTechnology'),
        ];
        
        // Technology data for edit
        if ($tech_id) {
            $technologyData = $this->technologies->getTechnologies($tech_id);
        
            if (!$technologyData) {
                return redirect()->route('admin.technologies')->with('error', 'Technology not found');
            }
        }
        return view('Backend.Technologies.addTechnology', $data, compact('technologyData'));
    }

    public function storeTechnology(Request $request, $tech_id = null) {
        $validator = Validator::make($request->all(), [
            'technology_name' => 'required|string|max:255',
            'technology_status' => 'required|in:1,0',
            'technology_description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($tech_id){
            $technology = $this->technologies->find($tech_id);
            if(!$technology){
                return redirect()->route('admin.technologies')->with('error', 'Technology not found.');
            }
            $data = $request->except('logo');
            $uploadPath = public_path('assets/uploads/technologies');

            if(!File::exists($uploadPath)){
                File::makeDirectory($uploadPath, 0777, true);
            }

            if($request->hasFile('logo')){
                if($technology->technology_icon) {
                    $oldImagePath = public_path('assets/uploads/technologies/' . $technology->technology_icon);
                    if(File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
        
                // Upload new image
                $logo = $request->file('logo');
                $logoName = time(). '_'. $logo->getClientOriginalName();
                $logo->move($uploadPath, $logoName);
                $data['technology_icon'] = $logoName;
            }

            if($technology->update($data)){
                return redirect()->route('admin.technologies')->with('success', 'Technology updated successfully.');
            }else{
                return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
            }
        }
        $data = $request->except('logo');

        $uploadPath = public_path('assets/uploads/technologies');

        if(!File::exists($uploadPath)){
            File::makeDirectory($uploadPath, 0777, true);
        }

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = time(). '_'. $logo->getClientOriginalName();
            $logo->move($uploadPath, $logoName);
            $data['technology_icon'] = $logoName;
        }

        if($this->technologies::create($data)){
            return redirect()->route('admin.technologies')->with('success', 'Technology added successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    // changae status
    public function toggleTechnologyStatus($tech_id){
        if(is_null($tech_id)) {
            return redirect()->route('admin.technologies')->with('error', 'Technology ID does not exist.');
        }
        $technology = $this->technologies->find($tech_id);
        if(empty($technology)){
            return redirect()->route('admin.technologies')->with('error', 'Technology not found.');
        }
        $technology->technology_status =!$technology->technology_status;
        if($technology->save()){
            return redirect()->route('admin.technologies')->with('success', 'Technology status changed successfully.');
        } else {
            return redirect()->route('admin.technologies')->with('error', 'Failed to change technology status.');
        }
    }

    // soft delete item
    public function deleteTechnology($id)
    {
        if (is_null($id)) {
            return redirect()->route('admin.technologies')->with('error', 'Technology ID does not exist.');
        }
    
        $technology = $this->technologies->find($id);
    
        if (empty($technology)) {
            return redirect()->route('admin.technologies')->with('error', 'Technology not found.');
        }
    
        if ($technology->delete()) { 
            return redirect()->route('admin.technologies')->with('success', 'Technology deleted successfully.');
        } else {
            return redirect()->route('admin.technologies')->with('error', 'Failed to delete technology.');
        }
    }

    // get temporary deleted data
    public function getTrashedData(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Technologies',
            'url' => route('admin.technologies'),
        ];
        $data['breadcrumbs'][] = [
            'text' => 'Trashed Technologies',
            'url' => route('admin.trshed'),
        ];
        $data['title'] = "Trashed Technologies List";
        $data['technologiesData'] = $this->technologies->onlyTrashed()->get();
        return view('Backend.Technologies.trashTechnologiesList', $data);
    }
}
