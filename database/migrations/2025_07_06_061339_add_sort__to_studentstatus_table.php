<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSortToStudentstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_statuses', function (Blueprint $table) {
            $table->integer('sort')->nullable()->after('status');
            $table->integer('preadmission')->default(0)->after('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_statuses', function (Blueprint $table) {
            $table->dropColumn('sort');
            $table->dropColumn('preadmission');
        });
    }
}
