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
        Schema::create('causes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('subtype');
            $table->timestamps();
        });
        Schema::create('incident_causes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cause_id')->nullable()->constrained('causes');
            $table->foreignId('incident_id')->nullable()->constrained('incidents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causes');
        Schema::dropIfExists('incident_causes');
    }
};
