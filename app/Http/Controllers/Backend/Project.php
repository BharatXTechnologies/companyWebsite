<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clients;
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

        return view('Backend.Pages.Projects', $data);
    }

    public function addProject(){
        $clients = new Clients();
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

        return view('Backend.Pages.addProject', $data);
    }
}
