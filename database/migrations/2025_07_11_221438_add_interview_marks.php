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
        $table->integer('interview_marks')->nullable()->after('status'); 
        $table->date('call_date')->nullable()->after('interview_marks'); 
        $table->string('form_no', 50)->nullable()->after('call_date'); 
        $table->string('kmu_reg_no', 50)->nullable()->after('form_no'); 
        $table->string('pnc_reg_no', 50)->nullable()->after('kmu_reg_no'); 
        $table->string('father_cnic', 15)->nullable()->after('pnc_reg_no'); 
        $table->integer('fine_exempted')->default(0)->after('father_cnic'); 
        $table->unsignedBigInteger('domicile_id')->nullable()->after('fine_exempted');
        $table->date('arrival_date')->nullable()->after('domicile_id');
        $table->string('interview_remarks')->nullable()->after('arrival_date'); 

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
                'interview_marks',
                'call_date',
                'form_no',
                'kmu_reg_no',
                'pnc_reg_no',
                'father_cnic',
                'fine_exempted',
                'domicile_id',
                'arrival_date'
            ]);
        });
    }
}
