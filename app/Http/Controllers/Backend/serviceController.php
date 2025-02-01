<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function services(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Services',
            'url' => route('admin.services')
        ];
        $data['title'] = "Service List";
        return view('Backend.services.services', $data);
    }

    // add form services
    public function addService(Request $request){
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
        return view('Backend.services.addService', $data);
    }
}
