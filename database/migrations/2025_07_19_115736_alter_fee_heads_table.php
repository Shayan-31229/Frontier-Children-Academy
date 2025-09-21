<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFeeHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fee_heads', function (Blueprint $table) {
            $table->boolean('fine_applicable')->default(false)->after('fee_head_title');
            $table->integer('per_day_fine')->default(0)->after('fine_applicable');
            $table->enum('fine_frequency', ['N/A', 'Daily', 'Monthly', 'Once'])->default('N/A')->after('per_day_fine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_heads', function (Blueprint $table) {
            $table->dropColumn(['fine_applicable', 'per_day_fine']);
        });
    }
}
