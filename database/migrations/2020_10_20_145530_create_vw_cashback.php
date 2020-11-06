<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVwCashback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW `vw_cashback` AS select 
                `tb_head_jual`.`no_do` AS `no_do`,
                `tb_head_jual`.`tanggal` AS `tanggal`,
                `users`.`no_member` AS `no_member`,
                `users`.`name` AS `nama`,
                `users`.`kode_dr` AS `kode_dr`,
                `users`.`kode_up` AS `kode_up`,
                `tb_det_jual`.`kode_barang` AS `kode_barang`,
                `tb_det_jual`.`poin` AS `poin`,
                `users`.`bank` AS `bank`,
                `users`.`norek` AS `norek`,
                `users`.`tipe` AS `tipe`,
                `users`.`daftar` AS `daftar`,
                `tb_head_jual`.`move` AS `move`,
                `tb_head_jual`.`kassir` AS `kassir`

            FROM ((`tb_det_jual` 
                JOIN `tb_head_jual` ON (`tb_det_jual`.`no_do` = `tb_head_jual`.`no_do`)) 
                JOIN `users` ON (`tb_head_jual`.`user_id` = `users`.`id`))

            WHERE `tb_det_jual`.`kode_barang` NOT LIKE '90%' 
                AND `tb_det_jual`.`kode_barang` NOT IN ('SK001','SK002','SK003','SK004')
                AND `tb_det_jual`.`kode_barang` NOT LIKE 'OK%' 
                AND `tb_det_jual`.`jenis` NOT LIKE '%CLINIC%'

            ORDER BY `tb_head_jual`.`no_do`;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
            DROP VIEW vw_cashback; 
        ");
    }
}
