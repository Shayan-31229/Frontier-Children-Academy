<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sms_settings')) {
            Schema::create('sms_settings', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();

                $table->string('identity');
                $table->string('logo');
                $table->string('link');
                $table->text('config');
                $table->integer('sort');

                $table->boolean('status')->default(1);
                $table->integer("branch_id")->default(1);

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
        Schema::dropIfExists('sms_settings');
    }
}
