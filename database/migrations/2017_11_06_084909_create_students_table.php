<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();

                $table->unsignedInteger('created_by');
                $table->unsignedInteger('last_updated_by')->nullable();

                $table->string('reg_no', '25')->unique();
                $table->dateTime('reg_date');
                //$table->string('university_reg', '100')->nullable();

                $table->unsignedInteger('faculty')->nullable();
                $table->unsignedInteger('semester')->nullable();
                $table->unsignedInteger('academic_status')->nullable();
                $table->unsignedInteger('batch')->nullable();

                $table->string('first_name');
                $table->string('last_name')->nullable();
                $table->dateTime('date_of_birth');
                $table->string('gender', '10')->nullable();
                $table->string('blood_group', '10')->nullable();


                $table->string('religion', '25')->nullable();

                $table->string('nationality', '25')->nullable();
                $table->string('cnic_no', '15');

                $table->string('email', '100')->nullable();
                $table->string('home_phone', '15')->nullable();
                $table->string('mobile_1', '15')->nullable();
                $table->string('mobile_2', '15')->nullable();

                /* The below properties were added for Frontier Children Academy */
                $table->string('slc_no', '50')->nullable();
                $table->string('this_school_slc_no', '50')->nullable();
                $table->date('this_school_slc_issuance_date')->nullable();
                $table->string('this_school_leaving_reason', '200')->nullable();
                $table->date('test_date')->nullable();
                $table->string('old_school_slc_no', '50')->nullable();
                $table->date('old_school_slc_date')->nullable();
                $table->string('old_school_leaving_reason', '200')->nullable();
                $table->string('old_school_name', '80')->nullable();
                /* The above properties were added for Frontier Children Academy */
                
                $table->text("extra_info")->nullable();
                $table->text('student_image')->nullable();
                $table->text('student_signature')->nullable();

                $table->string('sbi_collect_no', '50')->nullable();
                $table->string('bank_ref_no', '50')->nullable();

                $table->string('university_enrollment_no', '100')->nullable()->default("");
                $table->string('university_reg', '100')->nullable()->default("");

                $table->dateTime('admission_date')->nullable();
                $table->string('admission_no', '25')->nullable();
                $table->integer('admission_course_fee')->nullable();

                $table->boolean('status')->default(1);
                $table->integer("branch_id")->default(1);

                $table->foreign('faculty')->references('id')->on('faculties');
                $table->foreign('semester')->references('id')->on('semesters');
                $table->foreign('academic_status')->references('id')->on('student_statuses');
                $table->foreign('batch')->references('id')->on('student_batches');
                $table->foreign("branch_id")->references("id")->on("branches");

            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
