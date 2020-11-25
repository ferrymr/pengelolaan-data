<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbHeadStomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_head_stom', function (Blueprint $table) {
            $table->dropPrimary('no_sm');
        });

        if (!Schema::hasColumn('tb_head_stom', 'id')) {
            Schema::table('tb_head_stom', function(Blueprint $table) {
                $table->id()->first();
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
        if (Schema::hasColumn('tb_head_stom', 'id')) {
            Schema::table('tb_head_stom', function(Blueprint $table) {
                $table->dropColumn('id');
            });
        }

        Schema::table('tb_head_stom', function (Blueprint $table) {
            $table->primary('no_sm');
        });
    }
}
