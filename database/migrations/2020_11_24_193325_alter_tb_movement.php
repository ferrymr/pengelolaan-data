<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbMovement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_movement', function (Blueprint $table) {                
            $table->dropPrimary();
        });

        if (!Schema::hasColumn('tb_movement', 'id')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->id()->first();
            });
        }

        if (!Schema::hasColumn('tb_movement', 'tb_spb_id_from')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->integer('tb_spb_id_from')->after('id');
            });
        }

        if (!Schema::hasColumn('tb_movement', 'tb_spb_id_to')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->integer('tb_spb_id_to')->after('id');
            });
        }

        // ================ remove this column ================

        if (Schema::hasColumn('tb_movement', 'kode_barang')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('kode_barang');
            });
        }

        if (Schema::hasColumn('tb_movement', 'nama_barang')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('nama_barang');
            });
        }

        if (Schema::hasColumn('tb_movement', 'jenis_barang')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('jenis_barang');
            });
        }

        if (Schema::hasColumn('tb_movement', 'jumlah')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('jumlah');
            });
        }

        if (Schema::hasColumn('tb_movement', 'id_member')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('id_member');
            });
        }

        if (Schema::hasColumn('tb_movement', 'nama')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('nama');
            });
        }

        if (Schema::hasColumn('tb_movement', 'waktu')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('waktu');
            });
        }

        // ================ remove this column ================
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('tb_movement', 'id')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('id');
            });
        }

        Schema::table('tb_movement', function (Blueprint $table) {
            $table->primary('no_faktur');
        });

        if (Schema::hasColumn('tb_movement', 'tb_spb_id_from')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('tb_spb_id_from');
            });
        }

        if (Schema::hasColumn('tb_movement', 'tb_spb_id_to')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->dropColumn('tb_spb_id_to');
            });
        }

        // ================ remove this column ================

        if (!Schema::hasColumn('tb_movement', 'kode_barang')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->string('kode_barang');
            });
        }

        if (!Schema::hasColumn('tb_movement', 'nama_barang')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->string('nama_barang');
            });
        }

        if (!Schema::hasColumn('tb_movement', 'jenis_barang')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->string('jenis_barang');
            });
        }

        if (!Schema::hasColumn('tb_movement', 'id_member')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->integer('id_member');
            });
        }

        if (!Schema::hasColumn('tb_movement', 'nama')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->integer('nama');
            });
        }

        if (!Schema::hasColumn('tb_movement', 'waktu')) {
            Schema::table('tb_movement', function (Blueprint $table) {
                $table->integer('waktu');
            });
        }

        // ================ remove this column ================
    }
}
