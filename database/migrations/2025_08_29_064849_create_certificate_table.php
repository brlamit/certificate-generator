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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('certificate_type');
            $table->string('position')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('issuer_name');
            $table->string('issuer_title');
            $table->string('company_name');
            $table->text('signature'); // Changed to text to store base64 data
            $table->date('issued_date');
            $table->text('description')->nullable(); // Added for certificate description
            $table->string('certificate_id')->unique()->nullable(); // Added for unique certificate ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('template_id')->constrained('certificate_templates')->onDelete('cascade');
            $table->timestamps();
            
            // Add index for better performance
            $table->index('certificate_id');
            $table->index('user_id');
            $table->index('template_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};