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

    public function addTechnology(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Technologies',
            'url' => route('admin.technology'),
        ];
        $data['breadcrumbs'][] = [
            'text' => 'Add Technology',
            'url' => route('admin.addTechnology'),
        ];
        $data['title'] = "Add Technology";
        return view('Backend.Technologies.addTechnology', $data);
    }

    public function storeTechnology(Request $request){
        $validator = Validator::make($request->all(), [
            'tech_name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
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
            return redirect()->route('admin.technology')->with('success', 'Technology added successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }
}
