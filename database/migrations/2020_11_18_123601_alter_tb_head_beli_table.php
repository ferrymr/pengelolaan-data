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
        Schema::table('tb_head_beli', function (Blueprint $table) {
            $table->dropPrimary('no_po');
        });

        if (!Schema::hasColumn('tb_head_beli', 'id')) {
            Schema::table('tb_head_beli', function (Blueprint $table) {
                $table->id()->first();
            });
        }

        if (!Schema::hasColumn('tb_head_beli', 'status')) {
            Schema::table('tb_head_beli', function (Blueprint $table) {
                $table->string('status')->after('waktu')->default('created');
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

        if (Schema::hasColumn('tb_head_beli', 'status')) {
            Schema::table('tb_head_beli', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }

        Schema::table('tb_head_beli', function (Blueprint $table) {
            $table->primary('no_po');
        });
    }
}
