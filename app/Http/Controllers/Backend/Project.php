<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use App\Models\Admin\Clients;
use App\Models\Admin\Projects;
use App\Models\Admin\Technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class Project extends Controller
{
    protected $category;
    protected $project;
    public function __construct(){
        $this->category = new category();
        $this->project = new Projects();
    }
    public function projectsList(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Projects',
            'url' => route('admin.projects')
        ];
        $data['title'] = "Projects List";
        $data['projectsData'] = $this->project->getProjects();

        return view('Backend.Projects.Projects', $data);
    }

    public function addProject($id = null){
        $clients = new Clients();
        $technologies = new Technologies();

        $projectData = null;
        if(!is_null($id)){
            $projectData = $this->project->getProjects($id);
        }
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Projects',
            'url' => route('admin.projects')
        ];
        $data['breadcrumbs'][] = [
            'text' => $id ? 'Edit Project' :'Add Projects',
            'url' => $id ? route('admin.editProject', $id) : route('admin.addProject')
        ];
        $data['title'] = $id ? "Edit Project" :"Add Project";
        $data['clientsData'] = $clients->getClientsData();
        $data['technologiesData'] = $technologies->getTechnologies();
        $data['categoryData'] = $this->category->getCategory();

        return view('Backend.Projects.addProject', $data, compact('projectData'));
    }

    // store project data
    public function storeProject(Request $request, $id = null){

        // Define validation rules
       $rules = [
           'project_name' => 'required|string|max:255',
           'client' => 'required|exists:clients,id',
           'project_budgte' => 'required|numeric|min:1',
           'project_category' => 'required|exists:categories,id',
           'technologies' => 'required|array',
           'technologies.*' => 'exists:technologies,id',
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
       ];

       // Validate the request
       $validator = Validator::make($request->all(), $rules, $messages);
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }

        // check folder is available
        $uploadPath = public_path('assets/uploads/projects');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true);
        }
        
        // Check if image is being uploaded
        if ($request->hasFile('project_image')) {
            // Get the new image
            $image = $request->file('project_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // update project data
            if(!is_null($id)){
                // Fetch the project by ID (ensure the ID is valid)
                $project = $this->project->getProjects($id);
                if ($project && $project->thumbnail) {
                    $oldImagePath = $uploadPath . '/' . $project->thumbnail;
            
                    // Delete the old image if it exists
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }   
            }
        
            // Move the new image to the folder
            $image->move($uploadPath, $imageName);
            $imageData['thumbnail'] = $imageName;
        }

        // Prepare data for insertion
        $data = [
            'project_name' => $request->project_name,
            'client_id' => $request->client,
            'category_id' => $request->project_category,
            'project_description' => $request->description?? null,
            'thumbnail' => $imageData['thumbnail']?? null,
            'status' => $request->status,
            'budget' => $request->project_budgte,
            'project_url' => $request->project_url?? null,
            'technologies' => implode(',', $request->technologies),
        ];

        if(!is_null($id)){
            // Update project data
            if($this->project->updateProject($id, $data)) {
                return redirect()->route('admin.projects')->with('success', 'Project updated successfully.');
            } else{
                return redirect()->back()->with('error', 'Failed to update project.');
            }
        }else{
            // Insert project data
            if($this->project->insert($data)) {
                return redirect()->route('admin.projects')->with('success', 'Project added successfully.');
            }else{
                return redirect()->back()->with('error', 'Failed to add project.');
            }
        }
    }

    // delete project data
    public function deleteProject($id){
        if(is_null($id)){
            return redirect()->route('admin.projects')->with('error', 'Project ID does not exist.');
        } else{
            if($this->project->deleteProject($id)){
                return redirect()->route('admin.projects')->with('success', 'Project deleted successfully.');
            } else{
                return redirect()->route('admin.projects')->with('error', 'Failed to delete project.');
            }
        }
    }

    // change status of project
    public function toggleProjectStatus($id){
        if(is_null($id)){
            return redirect()->route('admin.projects')->with('error', 'Project ID does not exist.');
        }else{
            $project = $this->project->getProjects($id);
            if(empty($project)){
                return redirect()->route('admin.projects')->with('error', 'Project not found.');
            }
            $data = ['status' => !$project->status];
            $project = $this->project->updateProjectStatus($id, $data);
            if($project){
                return redirect()->route('admin.projects')->with('success', 'Project status changed successfully.');
            } else {
                return redirect()->route('admin.projects')->with('error', 'Failed to change project status.');
            }
        }
    }
}
