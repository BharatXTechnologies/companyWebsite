<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ModelHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $restoreData = $modelClass::onlyTrashed()->get();
        if($restoreData->isEmpty()) {
            return redirect()->route('admin.trashed', ['module' => $module])->with('error', 'No trashed records found.');
        }else{
            foreach ($restoreData as $record) {
                $record->restore();
            }
        }

        return redirect()->route('admin.trashed', ['module' => $module])->with('success', ucfirst($module) . ' records restored successfully.');
    }

    // permanent delete
    public function permanentDelete($module, $id)
    {
        $moduleModels = ModelHelper::getAllModels();

        if (empty($moduleModels) || !array_key_exists($module, $moduleModels)) {
            return redirect()->back()->with('error', 'Invalid module specified.');
        }

        $modelClass = $moduleModels[$module]['model'];

        // Find the record by ID
        $record = $modelClass::onlyTrashed()->find($id);

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Define image fields for different modules
        $imageFields = [
            'technologies' => [
                'field' => 'technology_icon',
                'path' => 'assets/uploads/technologies/'
            ],
            // Add more modules and their respective image fields here
        ];

        // Check if this module has image handling
        if (isset($imageFields[$module])) {
            $imageField = $imageFields[$module]['field'];
            $imagePath = $imageFields[$module]['path'];

            // Check and remove image if exists
            if (property_exists($record, $imageField) && $record->$imageField) {
                $fullPath = public_path($imagePath . $record->$imageField);
                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        // Delete the record permanently
        $record->forceDelete();

        return redirect()->route('admin.trashed', ['module' => $module])->with('success', ucfirst($module) . ' record permanently deleted successfully.');
    }
}
