<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ModelHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class TrashedController extends Controller
{
    public function getTrashedData($module)
    {
        // Fetch all models from ModelHelper
        $moduleModels = ModelHelper::getAllModels();

        if (empty($moduleModels)) {
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

        // Fetch table columns dynamically
        $tableName = $moduleModels[$module]['table'];
        $columns = Schema::getColumnListing($tableName);
        // Get only the first 4 columns
        $columns = array_slice($columns, 0, 4);
        // dd($columns);
        // Dynamically set breadcrumbs based on the module
        $breadcrumbs = [];
        $breadcrumbs[] = [
            'text' => ucfirst($module),
            'url' => route('admin.' . $module),
        ];
        $breadcrumbs[] = [
            'text' => 'Trashed ' . ucfirst($module),
            'url' => route('admin.trashed', ['module' => $module]),
        ];

        // Set the page title dynamically based on the module
        $title = "Trashed " . ucfirst($module) . " List";

        // Return the view with trashed data, columns, breadcrumbs, and title
        return view('Backend.Trashed.trash-data-list', compact('trashedData', 'module', 'columns', 'breadcrumbs', 'title'));
    }


    // restore All
    public function restoreAll($module)
    {
        $moduleModels = ModelHelper::getAllModels();

        if (empty($moduleModels) || !array_key_exists($module, $moduleModels)) {
            return redirect()->back()->with('error', 'Invalid module specified.');
        }

        $modelClass = $moduleModels[$module]['model'];

        // Restore all trashed records
        $modelClass::onlyTrashed()->restore();

        return redirect()->route('admin.trashed', ['module' => $module])->with('success', ucfirst($module) . ' records restored successfully.');
    }


}
