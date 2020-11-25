<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbDetStomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_det_stom', function (Blueprint $table) {                
            $table->dropPrimary();
        });

        if (!Schema::hasColumn('tb_det_stom', 'id')) {
            Schema::table('tb_det_stom', function (Blueprint $table) {
                $table->id()->first();
                $table->integer('tb_head_stom_id')->after('id');
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
        if (Schema::hasColumn('tb_det_stom', 'id')) {
            Schema::table('tb_det_stom', function (Blueprint $table) {
                $table->dropColumn('id');
                $table->dropColumn('tb_head_stom_id');
            });
        }

        Schema::table('tb_det_stom', function (Blueprint $table) {
            $table->primary('no_sm');
        });
    }
}
