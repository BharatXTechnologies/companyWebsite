<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use App\Models\Admin\Clients;
use App\Models\Admin\Technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Project extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = new category();
    }
    public function projectsList(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Projects',
            'url' => route('admin.projects')
        ];
        $data['title'] = "Projects List";
        $data['projectsData'] = DB::table('projects')->get();

        return view('Backend.Projects.Projects', $data);
    }

    public function addProject(){
        $clients = new Clients();
        $technologies = new Technologies();
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Projects',
            'url' => route('admin.projects')
        ];
        $data['breadcrumbs'][] = [
            'text' => 'Add Projects',
            'url' => route('admin.addProject')
        ];
        $data['title'] = "Add Project";
        $data['clientsData'] = $clients->getClientsData();
        $data['technologiesData'] = $technologies->getTechnologies();
        $data['categoryData'] = $this->category->getCategory();

        return view('Backend.Projects.addProject', $data);
    }

    // store project data
    public function storeProject(Request $request){
         // Define validation rules
        $rules = [
            'project_name' => 'required|string|max:255',
            'client' => 'required|exists:clients,id',
            'project_budgte' => 'required|numeric|min:1',
            'project_category' => 'required|exists:categories,id',
            'technologies' => 'required|array',
            'technologies.*' => 'exists:technologies,id',
            'status' => 'required|boolean',
            'project_url' => 'nullable|url',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg',
            'description' => 'nullable|string',
        ];

        // Custom error messages (optional)
        $messages = [
            'project_name.required' => 'The project name is required.',
            'client.required' => 'Please select a client.',
            'project_budgte.required' => 'The project budget is required.',
            'project_category.required' => 'Please select a category.',
            'technologies.required' => 'Please select at least one technology.',
            'status.required' => 'The project status is required.',
            'project_url.url' => 'The project URL must be a valid URL.',
            'project_image.image' => 'The project image must be an image file.',
            'project_image.mimes' => 'The project image must be a file of type: jpeg, png, jpg, gif.',
            'project_image.max' => 'The project image may not be greater than 2MB.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
