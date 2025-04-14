<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('survey_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumni_id'); // ID alumni
            $table->text('answers'); // Jawapan
            $table->timestamps();

            $table->foreign('alumni_id')->references('id')->on('alumni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
