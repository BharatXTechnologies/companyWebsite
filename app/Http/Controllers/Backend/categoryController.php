<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = new category();
    }
    public function index(){
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => 'Category',
            'url' => route('admin.category')
        ];
        $data['title'] = "Category List";
        $data['categories'] = $this->category->getCategory();
        return view('Backend.Category.category', $data);
    }

    // store category code
    public function storeCategory(Request $req){
        $validate = Validator::make($req->all(), [
            'category_name' => 'required'
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }
        $data = [
            'name' => $req->category_name
        ];
        if($this->category->insert($data)){
            return redirect()->route('admin.category')->with('success', 'Category added successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    // delete category
    public function deleteCategory($id){
        if(is_null($id)){
            return redirect()->route('admin.category')->with('error', 'Category ID does not exist.');
        }else{
            if($this->category->deleteCategory($id)){
                return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
            }else{
                return redirect()->route('admin.category')->with('error', 'Something went wrong.');
            }
        }
    }
}
