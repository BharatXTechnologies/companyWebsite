<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\feature;
use App\Models\Admin\service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    protected $features;
    protected $services;
    public function __construct(){
        $this->features = new feature();
        $this->services = new service();
    }
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
        $data['features'] = $this->features->getFeature();
        return view('Backend.services.addService', $data);
    }
}
