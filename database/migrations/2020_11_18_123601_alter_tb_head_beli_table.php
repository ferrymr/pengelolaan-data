<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbHeadBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_head_beli', 'id')) {
            Schema::table('tb_head_beli', function (Blueprint $table) {
                $table->bigIncrements('id')->first();
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
        if (Schema::hasColumn('tb_head_beli', 'id')) {
            Schema::table('tb_head_beli', function (Blueprint $table) {
                $table->dropColumn('id');
            });
        }
    }
}
