<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expensestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('expenses')) {
            Schema::create('expenses', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('account_category_id'); // Foreign key
                $table->text('description')->nullable();
                $table->decimal('amount', 10, 2);
                $table->date('expense_date');
                $table->date('created_on');
                $table->unsignedInteger('created_by')->nullable();
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('account_category_id')
                    ->references('id')
                    ->on('account_categories')
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
        Schema::dropIfExists('expenses');
    }
}
