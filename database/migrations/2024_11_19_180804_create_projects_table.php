<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->index(); 
            $table->text('project_description');
            $table->string('thumbnail')->nullable(); 
            $table->unsignedBigInteger('client_id');
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending'); 
            $table->string('technologies')->nullable(); 
            $table->decimal('budget', 10, 2)->nullable();
            $table->string('project_url')->nullable(); 
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
