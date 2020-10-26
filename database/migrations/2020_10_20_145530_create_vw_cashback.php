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
                `tb_member`.`no_member` AS `no_member`,
                `tb_member`.`nama` AS `nama`,
                `tb_member`.`kode_dr` AS `kode_dr`,
                `tb_member`.`kode_up` AS `kode_up`,
                `tb_det_jual`.`kode_barang` AS `kode_barang`,
                `tb_det_jual`.`t_hpb` AS `t_hpb`,
                `tb_det_jual`.`poin` AS `poin`,
                `tb_member`.`tabungan` AS `tabungan`,
                `tb_member`.`norek` AS `norek`,
                `tb_member`.`tipe` AS `tipe`,
                `tb_member`.`tanggal` AS `tgl_m`,
                `tb_head_jual`.`move` AS `move`

            FROM ((`tb_det_jual` 
                JOIN `tb_head_jual` ON (`tb_det_jual`.`no_do` = `tb_head_jual`.`no_do`)) 
                JOIN `tb_member` ON (`tb_head_jual`.`kode_cust` = `tb_member`.`no_member`))

            WHERE `tb_det_jual`.`kode_barang` NOT LIKE '90%' 
                AND `tb_det_jual`.`kode_barang` NOT IN ('SK001','SK002','SK003','SK004') 
                AND `tb_det_jual`.`kode_barang` NOT LIKE 'REG%' 
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
        Schema::dropIfExists('vw_cashback');
    }
}
