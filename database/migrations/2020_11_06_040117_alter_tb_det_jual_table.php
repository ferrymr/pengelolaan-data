<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbDetJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_head_jual', 'resi')) {
            Schema::table('tb_head_jual', function(Blueprint $table) {
                $table->string('resi')->after('move')->nullable();
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
        if (Schema::hasColumn('tb_head_jual', 'resi')) {
            Schema::table('tb_head_jual', function(Blueprint $table) {
                $table->dropColumn('resi');
            });
        }
    }
}
