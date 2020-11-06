<?php

use Illuminate\Database\Seeder;

class SpbTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tb_spb')->delete();
        
        \DB::table('tb_spb')->insert(
            array (
                'id' => 1,
                'name' => 'SPB00000',
                'code' => '00000',
                'province_id' => 9,
                'city_id' => 23,
                'subdistrict_id' => 359,
                'city_name' => 'BANDUNG',
                'subdistrict_name' => 'Lengkong',
                'phone' => '+6282119163629',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 2,
                'name' => 'SPB00014',
                'code' => '00014',
                'province_id' => 9,
                'city_id' => 23,
                'subdistrict_id' => 361,
                'city_name' => 'BANDUNG',
                'subdistrict_name' => 'Panyileukan',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 3,
                'name' => 'SPB13722',
                'code' => '13722',
                'province_id' => 9,
                'city_id' => 54,
                'subdistrict_id' => 733,
                'city_name' => 'BEKASI',
                'subdistrict_name' => 'Cikarang Selatan',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 4,
                'name' => 'SPB00217',
                'code' => '00217',
                'province_id' => 9,
                'city_id' => 55,
                'subdistrict_id' => 757,
                'city_name' => 'BEKASI',
                'subdistrict_name' => 'Mustika Jaya',
                'phone' => '+6281360360688',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 5,
                'name' => 'SPB00553',
                'code' => '00553',
                'province_id' => 9,
                'city_id' => 79,
                'subdistrict_id' => 1067,
                'city_name' => 'BOGOR',
                'subdistrict_name' => 'Tanah Sereal',
                'phone' => '+6289513313909',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 6,
                'name' => 'SPB05624',
                'code' => '05624',
                'province_id' => 9,
                'city_id' => 104,
                'subdistrict_id' => 1415,
                'city_name' => 'CIANJUR',
                'subdistrict_name' => 'Cikalong',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 7,
                'name' => 'SPB15658',
                'code' => '15658',
                'province_id' => 9,
                'city_id' => 115,
                'subdistrict_id' => 1585,
                'city_name' => 'DEPOK',
                'subdistrict_name' => 'Sawangan',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 8,
                'name' => 'SPB00985',
                'code' => '00985',
                'province_id' => 3,
                'city_id' => 232,
                'subdistrict_id' => 3308,
                'city_name' => 'LEBAK',
                'subdistrict_name' => 'Cilograng',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 9,
                'name' => 'SPB00539',
                'code' => '00539',
                'province_id' => 34,
                'city_id' => 278,
                'subdistrict_id' => 3918,
                'city_name' => 'MEDAN',
                'subdistrict_name' => 'Medan Marelan',
                'phone' => '+6287868981767',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 10,
                'name' => 'SPB00042',
                'code' => '00042',
                'province_id' => 9,
                'city_id' => 430,
                'subdistrict_id' => 5954,
                'city_name' => 'PELABUHAN RATU',
                'subdistrict_name' => 'Pelabuhan/Palabuhan Ratu',
                'phone' => '+6281337479174',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 11,
                'name' => 'SPB01835',
                'code' => '01835',
                'province_id' => 9,
                'city_id' => 376,
                'subdistrict_id' => 5218,
                'city_name' => 'PURWAKARTA',
                // 'subdistrict_old_id' => 5954,
                'subdistrict_name' => 'Bojong',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 12,
                'name' => 'SPB01838',
                'code' => '01838',
                'province_id' => 10,
                'city_id' => 41,
                'subdistrict_id' => 591,
                'city_name' => 'PURWOKERTO',
                'subdistrict_name' => 'Purwokerto Timur',
                'phone' => '+6283818235538',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 13,
                'name' => 'SPB00005',
                'code' => '00005',
                'province_id' => 9,
                'city_id' => 431,
                'subdistrict_id' => 5936,
                'city_name' => 'SUKABUMI',
                'subdistrict_name' => 'Cisaat',
                'phone' => '+6281563205235',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 14,
                'name' => 'SPB01340',
                'code' => '01340',
                'province_id' => 9,
                'city_id' => 430,
                'subdistrict_id' => 5951,
                'city_name' => 'SUKABUMI',
                'subdistrict_name' => 'Pabuaran',
                'phone' => '+6285798847881',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            )
        );
        \DB::table('tb_spb')->insert(
            array (
                'id' => 15,
                'name' => 'SPB00004',
                'code' => '00004',
                'province_id' => 3,
                'city_id' => 457,
                'subdistrict_id' => 6313,
                'city_name' => 'TANGERANG SELATAN',
                'subdistrict_name' => 'Pondok Aren',
                'phone' => '-',
                'disabled' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                )
        );        
        
    }
}