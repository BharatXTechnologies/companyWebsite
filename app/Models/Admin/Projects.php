<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['project_name', 'client_id', 'category_id', 'project_description', 'thumbnail', 'project_status', 'technologies'];

    // get projects data from database
    public function getProjects($id = null){
        if(is_null($id)){
            return Projects::all();
        } else{
            return Projects::find($id);
        }
    }
    // update projects data
    function updateProjectStatus($id, $data){
        return Projects::where('id', $id)->update($data);
    }

    // delete projects
    function deleteProject($id){
        return Projects::where('id', $id)->delete();
    }
}
