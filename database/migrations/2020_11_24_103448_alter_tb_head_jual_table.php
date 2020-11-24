<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbHeadJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_head_jual', 'no_member')) {
            Schema::table('tb_head_jual', function (Blueprint $table) {
                $table->string('no_member')->after('user_id');
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
        if (Schema::hasColumn('tb_head_jual', 'no_member')) {
            Schema::table('tb_head_jual', function (Blueprint $table) {
                $table->dropColumn('no_member');
            });
        }
    }
}
