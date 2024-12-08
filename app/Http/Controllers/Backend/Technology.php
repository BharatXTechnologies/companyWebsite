<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Technologies;
use Illuminate\Http\Request;

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
        // dd($data['technologiesData']);
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
            'url' => route('admin.add-technology'),
        ];
        $data['title'] = "Add Technology";
        return view('Backend.Technologies.addTechnology', $data);
    }
}
