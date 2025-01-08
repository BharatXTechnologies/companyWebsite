<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clients;
use App\Models\Admin\Technologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Project extends Controller
{
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

        return view('Backend.Projects.addProject', $data);
    }
}
