<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHomeworksTableAddClassId extends Migration
{
    public function up()
    {
        Schema::table('homeworks', function (Blueprint $table) {
            // Check if column exists before adding it
            if (!Schema::hasColumn('homeworks', 'class_id')) {
                $table->unsignedBigInteger('class_id')->after('description');
                $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('homeworks', function (Blueprint $table) {
            // Drop the foreign key and class_id column
            $table->dropForeign(['class_id']);
            $table->dropColumn('class_id');
        });
    }
}
