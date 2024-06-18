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
        Schema::create('incident_states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('activity');
            $table->string('location');
            $table->date('lifting_period')->nullable();
            $table->timestamps();
            $table->foreignId('reported_user')->constrained('users');
            $table->foreignId('registered_user')->constrained('users');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreignId('bussiness_unit_id')->constrained('bussiness_units');
            $table->foreignId('electrical_service_id')->constrained('electrical_services');
            $table->foreignId('area_id');
            $table->foreignId('event_id');
            $table->foreignId('incident_state_id')->constrained('incident_states');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
        Schema::dropIfExists('incident_states');
    }
};
