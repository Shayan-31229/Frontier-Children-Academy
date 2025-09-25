<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sms_emails')) {
            Schema::create('sms_emails', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();

                $table->unsignedInteger('created_by');
                $table->unsignedInteger('last_updated_by')->nullable();

                $table->string('subject', '100')->nullable();
                $table->text('message');
                $table->boolean('sms')->default(0);
                $table->boolean('email')->default(0);
                $table->text('group')->nullable;
                $table->text('ref')->nullable;
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
        Schema::dropIfExists('sms_emails');
    }
}
