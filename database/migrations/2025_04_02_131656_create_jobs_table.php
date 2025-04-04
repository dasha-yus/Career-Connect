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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('title');
            $table->string('company');
            $table->string('website');
            $table->string('email');
            $table->string('logo');
            $table->string('location');
            $table->text('description');
            $table->timestamps();
            // $table->integer('job_type_id')->unsigned();

            // Foreign key constraint
            // $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
