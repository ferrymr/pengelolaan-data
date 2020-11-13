<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbBarangImagesAddAltAlter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tb_barang_images', 'alt')) {
            Schema::table('tb_barang_images', function(Blueprint $table) {
                $table->text('alt')->after('nama_file')->nullable();
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
        if (Schema::hasColumn('tb_barang_images', 'alt')) {
            Schema::table('tb_barang_images', function(Blueprint $table) {
                $table->dropColumn('alt');
            });
        }
    }
}
