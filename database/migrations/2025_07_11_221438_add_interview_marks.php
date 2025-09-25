<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInterviewMarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
        $table->date('call_date')->nullable()->after('status');
        $table->string('father_cnic', 15)->nullable()->after('call_date'); 
        $table->integer('fine_exempted')->default(0)->after('father_cnic'); 
        $table->unsignedBigInteger('domicile_id')->nullable()->after('fine_exempted');
        $table->date('arrival_date')->nullable()->after('domicile_id');

        $table->foreign('domicile_id')->references('id')->on('domiciles')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'call_date',
                'father_cnic',
                'fine_exempted',
                'domicile_id',
                'arrival_date'
            ]);
        });
    }
}
