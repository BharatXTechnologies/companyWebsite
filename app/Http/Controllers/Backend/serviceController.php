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
}
