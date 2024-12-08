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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); 
            $table->string('contact_name', 255); 
            $table->string('business_name', 255)->nullable(); 
            $table->text('address')->nullable(); 
            $table->string('email', 255); 
            $table->string('phone', 50); 
            $table->string('city', 100)->nullable(); 
            $table->string('state', 100)->nullable();
            $table->string('country', 255); 
            $table->string('pin', 10)->nullable();
            $table->string('gst_no', 20)->nullable();
            $table->string('pan_no', 20)->nullable();
            $table->boolean('status')->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
