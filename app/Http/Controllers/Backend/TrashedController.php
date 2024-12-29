<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ModelHelper;
use App\Http\Controllers\Controller;

class TrashedController extends Controller
{
    public function getTrashedData($module){
        // Fetch all models from ModelHelper
        $moduleModels = ModelHelper::getAllModels();
        // echo $module;
        // dd($moduleModels);
        if(empty($moduleModels)){
            return redirect()->back()->with('error', 'No models found.');
        }
        // Check if the specified module exists in the models list
        if (!array_key_exists($module, $moduleModels)) {
            return redirect()->back()->with('error', 'Invalid module specified.');
        }

        // Fetch the corresponding model class
        $modelClass = $moduleModels[$module]['model'];

        // Get trashed data for the specified model
        $trashedData = $modelClass::onlyTrashed()->get();

        // Dynamically set breadcrumbs based on the module
        $breadcrumbs = [];
        $breadcrumbs[] = [
            'text' => ucfirst($module) ,
            'url' => route('admin.' . $module),
        ];
        $breadcrumbs[] = [
            'text' => 'Trashed ' . ucfirst($module),
            'url' => route('admin.trashed', ['module' => $module]),
        ];
        // dd($breadcrumbs);

        // Set the page title dynamically based on the module
        $title = "Trashed " . ucfirst($module) . " List";

        // Return the view with trashed data, breadcrumbs, and title
        return view('Backend.Trashed.trash-data-list', compact('trashedData', 'module', 'breadcrumbs', 'title'));
    }
}
