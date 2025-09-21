<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {

        if(!Schema::hasTable('fines')) {
            Schema::create('fines', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('fee_masters_id'); // Foreign key
                $table->unsignedInteger('fine_amount');
                $table->date('fine_date');
                $table->text('remarks');
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('fee_masters_id')
                    ->references('id')
                    ->on('fee_masters')
                    ->onDelete('restrict');
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
        Schema::dropIfExists('fines');
    }
}
