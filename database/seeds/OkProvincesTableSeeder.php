<?php

use Illuminate\Database\Seeder;

class OkProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ok_provinces')->delete();
        
        \DB::table('ok_provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => 1,
                'name' => 'Bali',
                'created_at' => '2020-08-28 03:45:03',
                'updated_at' => '2020-08-28 03:45:03',
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => 2,
                'name' => 'Bangka Belitung',
                'created_at' => '2020-08-28 03:45:32',
                'updated_at' => '2020-08-28 03:45:32',
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => 3,
                'name' => 'Banten',
                'created_at' => '2020-08-28 03:45:56',
                'updated_at' => '2020-08-28 03:45:56',
            ),
            3 => 
            array (
                'id' => 4,
                'province_id' => 4,
                'name' => 'Bengkulu',
                'created_at' => '2020-08-28 03:46:36',
                'updated_at' => '2020-08-28 03:46:36',
            ),
            4 => 
            array (
                'id' => 5,
                'province_id' => 5,
                'name' => 'DI Yogyakarta',
                'created_at' => '2020-08-28 03:47:22',
                'updated_at' => '2020-08-28 03:47:22',
            ),
            5 => 
            array (
                'id' => 6,
                'province_id' => 6,
                'name' => 'DKI Jakarta',
                'created_at' => '2020-08-28 03:47:43',
                'updated_at' => '2020-08-28 03:47:43',
            ),
            6 => 
            array (
                'id' => 7,
                'province_id' => 7,
                'name' => 'Gorontalo',
                'created_at' => '2020-08-28 03:48:08',
                'updated_at' => '2020-08-28 03:48:08',
            ),
            7 => 
            array (
                'id' => 8,
                'province_id' => 8,
                'name' => 'Jambi',
                'created_at' => '2020-08-28 03:48:31',
                'updated_at' => '2020-08-28 03:48:31',
            ),
            8 => 
            array (
                'id' => 9,
                'province_id' => 9,
                'name' => 'Jawa Barat',
                'created_at' => '2020-08-28 03:49:20',
                'updated_at' => '2020-08-28 03:49:20',
            ),
            9 => 
            array (
                'id' => 10,
                'province_id' => 10,
                'name' => 'Jawa Tengah',
                'created_at' => '2020-08-28 03:52:00',
                'updated_at' => '2020-08-28 03:52:00',
            ),
            10 => 
            array (
                'id' => 11,
                'province_id' => 11,
                'name' => 'Jawa Timur',
                'created_at' => '2020-08-28 03:54:45',
                'updated_at' => '2020-08-28 03:54:45',
            ),
            11 => 
            array (
                'id' => 12,
                'province_id' => 12,
                'name' => 'Kalimantan Barat',
                'created_at' => '2020-08-28 03:57:57',
                'updated_at' => '2020-08-28 03:57:57',
            ),
            12 => 
            array (
                'id' => 13,
                'province_id' => 13,
                'name' => 'Kalimantan Selatan',
                'created_at' => '2020-08-28 03:58:47',
                'updated_at' => '2020-08-28 03:58:47',
            ),
            13 => 
            array (
                'id' => 14,
                'province_id' => 14,
                'name' => 'Kalimantan Tengah',
                'created_at' => '2020-08-28 03:59:35',
                'updated_at' => '2020-08-28 03:59:35',
            ),
            14 => 
            array (
                'id' => 15,
                'province_id' => 15,
                'name' => 'Kalimantan Timur',
                'created_at' => '2020-08-28 04:00:36',
                'updated_at' => '2020-08-28 04:00:36',
            ),
            15 => 
            array (
                'id' => 16,
                'province_id' => 16,
                'name' => 'Kalimantan Utara',
                'created_at' => '2020-08-28 04:01:10',
                'updated_at' => '2020-08-28 04:01:10',
            ),
            16 => 
            array (
                'id' => 17,
                'province_id' => 17,
                'name' => 'Kepulauan Riau',
                'created_at' => '2020-08-28 04:01:31',
                'updated_at' => '2020-08-28 04:01:31',
            ),
            17 => 
            array (
                'id' => 18,
                'province_id' => 18,
                'name' => 'Lampung',
                'created_at' => '2020-08-28 04:02:01',
                'updated_at' => '2020-08-28 04:02:01',
            ),
            18 => 
            array (
                'id' => 19,
                'province_id' => 19,
                'name' => 'Maluku',
                'created_at' => '2020-08-28 04:03:07',
                'updated_at' => '2020-08-28 04:03:07',
            ),
            19 => 
            array (
                'id' => 20,
                'province_id' => 20,
                'name' => 'Maluku Utara',
                'created_at' => '2020-08-28 04:03:58',
                'updated_at' => '2020-08-28 04:03:58',
            ),
            20 => 
            array (
                'id' => 21,
                'province_id' => 21,
            'name' => 'Nanggroe Aceh Darussalam (NAD)',
                'created_at' => '2020-08-28 04:04:43',
                'updated_at' => '2020-08-28 04:04:43',
            ),
            21 => 
            array (
                'id' => 22,
                'province_id' => 22,
            'name' => 'Nusa Tenggara Barat (NTB)',
                'created_at' => '2020-08-28 04:06:19',
                'updated_at' => '2020-08-28 04:06:19',
            ),
            22 => 
            array (
                'id' => 23,
                'province_id' => 23,
            'name' => 'Nusa Tenggara Timur (NTT)',
                'created_at' => '2020-08-28 04:06:59',
                'updated_at' => '2020-08-28 04:06:59',
            ),
            23 => 
            array (
                'id' => 24,
                'province_id' => 24,
                'name' => 'Papua',
                'created_at' => '2020-08-28 04:08:24',
                'updated_at' => '2020-08-28 04:08:24',
            ),
            24 => 
            array (
                'id' => 25,
                'province_id' => 25,
                'name' => 'Papua Barat',
                'created_at' => '2020-08-28 04:10:39',
                'updated_at' => '2020-08-28 04:10:39',
            ),
            25 => 
            array (
                'id' => 26,
                'province_id' => 26,
                'name' => 'Riau',
                'created_at' => '2020-08-28 04:11:30',
                'updated_at' => '2020-08-28 04:11:30',
            ),
            26 => 
            array (
                'id' => 27,
                'province_id' => 27,
                'name' => 'Sulawesi Barat',
                'created_at' => '2020-08-28 04:12:28',
                'updated_at' => '2020-08-28 04:12:28',
            ),
            27 => 
            array (
                'id' => 28,
                'province_id' => 28,
                'name' => 'Sulawesi Selatan',
                'created_at' => '2020-08-28 04:12:52',
                'updated_at' => '2020-08-28 04:12:52',
            ),
            28 => 
            array (
                'id' => 29,
                'province_id' => 29,
                'name' => 'Sulawesi Tengah',
                'created_at' => '2020-08-28 04:14:21',
                'updated_at' => '2020-08-28 04:14:21',
            ),
            29 => 
            array (
                'id' => 30,
                'province_id' => 30,
                'name' => 'Sulawesi Tenggara',
                'created_at' => '2020-08-28 04:15:12',
                'updated_at' => '2020-08-28 04:15:12',
            ),
            30 => 
            array (
                'id' => 31,
                'province_id' => 31,
                'name' => 'Sulawesi Utara',
                'created_at' => '2020-08-28 04:16:10',
                'updated_at' => '2020-08-28 04:16:10',
            ),
            31 => 
            array (
                'id' => 32,
                'province_id' => 32,
                'name' => 'Sumatera Barat',
                'created_at' => '2020-08-28 04:17:05',
                'updated_at' => '2020-08-28 04:17:05',
            ),
            32 => 
            array (
                'id' => 33,
                'province_id' => 33,
                'name' => 'Sumatera Selatan',
                'created_at' => '2020-08-28 04:18:10',
                'updated_at' => '2020-08-28 04:18:10',
            ),
            33 => 
            array (
                'id' => 34,
                'province_id' => 34,
                'name' => 'Sumatera Utara',
                'created_at' => '2020-08-28 04:19:06',
                'updated_at' => '2020-08-28 04:19:06',
            ),
        ));
        
        
    }
}