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
            'url' => route('admin.technology'),
        ];
        $data['title'] = "Technologies List";
        $data['technologiesData'] = $this->technologies->getTechnologies();
        return view('Backend.Technologies.technologiesList', $data);
    }

    public function addTechnology($tech_id = null){
        $data = [
            'breadcrumbs' => [
                [
                    'text' => 'Technologies',
                    'url' => route('admin.technology'),
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
            $data['technologyData'] = $this->technologies->getTechnologies($tech_id);
        
            if (!$data['technologyData']) {
                return redirect()->route('admin.technology')->with('error', 'Technology not found');
            }
        }
        
        return view('Backend.Technologies.addTechnology', $data);
    }

    public function storeTechnology(Request $request){
        $validator = Validator::make($request->all(), [
            'technology_name' => 'required|string|max:255',
            'technology_status' => 'required|in:1,0',
            'technology_description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if($validator->fails()){
            dd('hello');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd('hell');
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
            return redirect()->route('admin.technology')->with('success', 'Technology added successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    // soft delete item
    public function deleteTechnology($id){
        if(is_null($id)) {
            return redirect()->route('admin.technology')->with('error', 'Technology ID does not exist.');
        }
        $technology = $this->technologies->getTechnologiesData($id);
        if(empty($technology)){
            return redirect()->route('admin.technology')->with('error', 'Technology not found.');
        }
        if($technology->delete()){
            return redirect()->route('admin.technology')->with('success', 'Technology deleted successfully.');
        } else{
            return redirect()->route('admin.technology')->with('error', 'Failed to delete technology.');
        }
    }
}
