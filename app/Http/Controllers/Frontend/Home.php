<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use App\Models\Admin\feature;
use App\Models\Admin\Projects;
use App\Models\Admin\service;
use Illuminate\Http\Request;

class Home extends Controller
{
    protected $category;
    protected $projects;
    protected $services;
    protected $features;
    public function __construct(){
        $this->category = new category();
        $this->projects = new Projects();
        $this->services = new service();
        $this->features = new feature();
    }
    public function index(){
        $data['title'] = 'Home | Zero1infinity Innovations A Software Solution Company';
        $data['category'] = $this->category->getCategory();
        $data['projects'] = $this->projects->getProjects();
        $data['services'] = $this->services->getService();
        return view('Frontend.index', $data);
    }

    // about us
    public function aboutUs(){
        $data['title'] = 'About Us | Zero1infinity Innovations A Software Solution Company';
        $data['pageTitle'] = 'About Zero1Infinity';
        $data['services'] = $this->services->getService();
        return view('Frontend.about-us', $data);
    }

    // service Details
    public function serviceDetails($serviceName){
        $serviceName = explode('-', $serviceName);
        $serviceName = implode(' ', $serviceName);
        $data['services'] = $this->services->getService();
        $data['service'] = $this->services->getServiceByName($serviceName);
        $data['features'] = $this->features->getFeatureById($data['service']->feature_ids);
        $data['title'] = $data['service']->name . ' | Zero1infinity Innovations A Software Solution Company';
        return view('Frontend.service-details', $data);
    }
}
