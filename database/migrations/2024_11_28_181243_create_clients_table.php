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
            $table->id(); // Primary key
            $table->string('contact_name', 255); // Contact Name
            $table->string('business_name', 255)->nullable(); // Business Name (nullable)
            $table->text('address')->nullable(); // Address (nullable)
            $table->string('email', 255); // Email
            $table->string('phone', 50); // Phone
            $table->string('city', 100)->nullable(); // City (nullable)
            $table->string('state', 100)->nullable(); // State (nullable)
            $table->string('country', 255); // Country
            $table->string('pin', 10)->nullable(); // PIN Code (nullable)
            $table->string('gst_no', 20)->nullable(); // GST Number (nullable)
            $table->string('pan_no', 20)->nullable(); // PAN Number (nullable)
            $table->boolean('status')->default(1); // Status (1 = Active, 0 = Inactive)
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
