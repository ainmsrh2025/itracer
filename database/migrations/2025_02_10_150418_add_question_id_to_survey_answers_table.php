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
        Schema::table('survey_records', function (Blueprint $table) {
            $table->foreignId('question_id')->after('id')->constrained('survey_questions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('survey_records', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
        });
    }
};
