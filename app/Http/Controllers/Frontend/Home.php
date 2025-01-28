<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $data['title'] = 'Home | Zero1infinity Innovations A Software Solution Company';
        return view('Frontend.index', $data);
    }
}
