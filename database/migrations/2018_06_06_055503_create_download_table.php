<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('downloads')) {
            Schema::create('downloads', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();

                $table->unsignedInteger('created_by');
                $table->unsignedInteger('last_updated_by')->nullable();

                $table->unsignedInteger('semesters_id')->nullable();
                $table->unsignedInteger('subjects_id')->nullable();

                $table->string('title', '100');
                $table->text('description')->nullable();
                $table->text('file')->nullable();
                $table->integer("branch_id")->default(1);

                $table->foreign("branch_id")->references("id")->on("branches");


                $table->boolean('status')->default(1);

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
        Schema::dropIfExists('downloads');
    }
}
