<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class ModelHelper
{
    public static function getAllModels()
    {
        // Base directory for models
        $modelsPath = app_path('Models'); 
        $moduleModels = [];
        self::scanDirectory($modelsPath, $moduleModels);
        return $moduleModels;
    }

    private static function scanDirectory($directory, &$moduleModels) {
        $files = scandir($directory);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                // Skip current and parent directories
                continue; 
            }

            $fullPath = $directory . DIRECTORY_SEPARATOR . $file;
            
            if (is_dir($fullPath)) {
                // If it's a directory, scan it recursively
                self::scanDirectory($fullPath, $moduleModels);
            } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                // If it's a PHP file, assume it's a model
                $relativePath = str_replace(app_path(), '', $fullPath); 
                $relativePath = ltrim($relativePath, DIRECTORY_SEPARATOR);
                $className = str_replace(DIRECTORY_SEPARATOR, '\\', $relativePath);
                $className = 'App\\' . str_replace('.php', '', $className);
                if (class_exists($className)) {
                    // Get table name dynamically
                    $tableName = (new $className)->getTable(); 
                    $moduleKey = strtolower(Str::snake(class_basename($className)));

                    $moduleModels[$moduleKey] = [
                        'model' => $className,
                        'table' => $tableName,
                    ];
                }
            }
        }
    }
}
