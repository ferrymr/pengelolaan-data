<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbDetBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_det_beli', function (Blueprint $table) {                
            $table->dropPrimary();
        });

        if (!Schema::hasColumn('tb_det_beli', 'id')) {
            Schema::table('tb_det_beli', function (Blueprint $table) {
                $table->id()->first();
                $table->integer('tb_head_beli_id')->after('id');
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
        if (Schema::hasColumn('tb_det_beli', 'id')) {
            Schema::table('tb_det_beli', function (Blueprint $table) {
                $table->dropColumn('id');
                $table->dropColumn('tb_head_beli_id');
            });
        }

        Schema::table('tb_det_beli', function (Blueprint $table) {
            $table->primary('no_po');
        });        
    }
}
