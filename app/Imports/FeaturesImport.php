<?php

namespace App\Imports;

use App\Models\Admin\feature as AdminFeature;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FeaturesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Check if the required columns are present in the row
        if (!isset($row['name']) || !isset($row['image_path']) || !isset($row['description'])) {
            return null;
        }

        // Convert the name from the Excel row to lowercase for comparison
        $nameLower = strtolower($row['name']);

        // Check if a feature with the same name already exists in the database (case-insensitive)
        if (AdminFeature::whereRaw('LOWER(name) = ?', [$nameLower])->exists()) {
            return null;
        }

        // Generate a unique image name using the feature name and timestamp
        $imageName = $row['name'] . '-' . time() . '.jpg';
        $imagePath = public_path('assets/uploads/features/' . $imageName);

        // Check if the image file exists at the specified path and copy it
        if (!empty($row['image_path']) && File::exists($row['image_path'])) {
            File::copy($row['image_path'], $imagePath);
        }

        return new AdminFeature([
            'name' => $row['name'],
            'icon' => $imageName,
            'description' => $row['description'],
        ]);
    }
}
