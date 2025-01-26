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
            $table->string('project_name');
            $table->integer('client_id');
            $table->integer('category_id');
            $table->text('project_description');
            $table->string('thumbnail');
            $table->boolean('status')->default(false);
            $table->decimal('budget', 10, 2)->nullable();
            $table->string('project_url')->nullable();
            $table->text('technologies');
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
