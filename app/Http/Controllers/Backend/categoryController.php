<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Category',
            'url' => route('admin.category')
        ];
        $data['title'] = "Category List";
        return view('Backend.Category.category', $data);
    }
}
