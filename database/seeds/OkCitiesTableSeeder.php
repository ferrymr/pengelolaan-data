<?php

use Illuminate\Database\Seeder;

class OkCitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ok_cities')->delete();
        
        \DB::table('ok_cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => 1,
                'city_id' => 17,
                'type' => 'Kabupaten',
                'name' => 'Badung',
                'created_at' => '2020-08-28 03:45:05',
                'updated_at' => '2020-08-28 03:45:05',
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => 1,
                'city_id' => 32,
                'type' => 'Kabupaten',
                'name' => 'Bangli',
                'created_at' => '2020-08-28 03:45:09',
                'updated_at' => '2020-08-28 03:45:09',
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => 1,
                'city_id' => 94,
                'type' => 'Kabupaten',
                'name' => 'Buleleng',
                'created_at' => '2020-08-28 03:45:13',
                'updated_at' => '2020-08-28 03:45:13',
            ),
            3 => 
            array (
                'id' => 4,
                'province_id' => 1,
                'city_id' => 114,
                'type' => 'Kota',
                'name' => 'Denpasar',
                'created_at' => '2020-08-28 03:45:16',
                'updated_at' => '2020-08-28 03:45:16',
            ),
            4 => 
            array (
                'id' => 5,
                'province_id' => 1,
                'city_id' => 128,
                'type' => 'Kabupaten',
                'name' => 'Gianyar',
                'created_at' => '2020-08-28 03:45:17',
                'updated_at' => '2020-08-28 03:45:17',
            ),
            5 => 
            array (
                'id' => 6,
                'province_id' => 1,
                'city_id' => 161,
                'type' => 'Kabupaten',
                'name' => 'Jembrana',
                'created_at' => '2020-08-28 03:45:21',
                'updated_at' => '2020-08-28 03:45:21',
            ),
            6 => 
            array (
                'id' => 7,
                'province_id' => 1,
                'city_id' => 170,
                'type' => 'Kabupaten',
                'name' => 'Karangasem',
                'created_at' => '2020-08-28 03:45:23',
                'updated_at' => '2020-08-28 03:45:23',
            ),
            7 => 
            array (
                'id' => 8,
                'province_id' => 1,
                'city_id' => 197,
                'type' => 'Kabupaten',
                'name' => 'Klungkung',
                'created_at' => '2020-08-28 03:45:26',
                'updated_at' => '2020-08-28 03:45:26',
            ),
            8 => 
            array (
                'id' => 9,
                'province_id' => 1,
                'city_id' => 447,
                'type' => 'Kabupaten',
                'name' => 'Tabanan',
                'created_at' => '2020-08-28 03:45:29',
                'updated_at' => '2020-08-28 03:45:29',
            ),
            9 => 
            array (
                'id' => 10,
                'province_id' => 2,
                'city_id' => 27,
                'type' => 'Kabupaten',
                'name' => 'Bangka',
                'created_at' => '2020-08-28 03:45:33',
                'updated_at' => '2020-08-28 03:45:33',
            ),
            10 => 
            array (
                'id' => 11,
                'province_id' => 2,
                'city_id' => 28,
                'type' => 'Kabupaten',
                'name' => 'Bangka Barat',
                'created_at' => '2020-08-28 03:45:37',
                'updated_at' => '2020-08-28 03:45:37',
            ),
            11 => 
            array (
                'id' => 12,
                'province_id' => 2,
                'city_id' => 29,
                'type' => 'Kabupaten',
                'name' => 'Bangka Selatan',
                'created_at' => '2020-08-28 03:45:39',
                'updated_at' => '2020-08-28 03:45:39',
            ),
            12 => 
            array (
                'id' => 13,
                'province_id' => 2,
                'city_id' => 30,
                'type' => 'Kabupaten',
                'name' => 'Bangka Tengah',
                'created_at' => '2020-08-28 03:45:44',
                'updated_at' => '2020-08-28 03:45:44',
            ),
            13 => 
            array (
                'id' => 14,
                'province_id' => 2,
                'city_id' => 56,
                'type' => 'Kabupaten',
                'name' => 'Belitung',
                'created_at' => '2020-08-28 03:45:47',
                'updated_at' => '2020-08-28 03:45:47',
            ),
            14 => 
            array (
                'id' => 15,
                'province_id' => 2,
                'city_id' => 57,
                'type' => 'Kabupaten',
                'name' => 'Belitung Timur',
                'created_at' => '2020-08-28 03:45:51',
                'updated_at' => '2020-08-28 03:45:51',
            ),
            15 => 
            array (
                'id' => 16,
                'province_id' => 2,
                'city_id' => 334,
                'type' => 'Kota',
                'name' => 'Pangkal Pinang',
                'created_at' => '2020-08-28 03:45:54',
                'updated_at' => '2020-08-28 03:45:54',
            ),
            16 => 
            array (
                'id' => 17,
                'province_id' => 3,
                'city_id' => 106,
                'type' => 'Kota',
                'name' => 'Cilegon',
                'created_at' => '2020-08-28 03:45:57',
                'updated_at' => '2020-08-28 03:45:57',
            ),
            17 => 
            array (
                'id' => 18,
                'province_id' => 3,
                'city_id' => 232,
                'type' => 'Kabupaten',
                'name' => 'Lebak',
                'created_at' => '2020-08-28 03:45:58',
                'updated_at' => '2020-08-28 03:45:58',
            ),
            18 => 
            array (
                'id' => 19,
                'province_id' => 3,
                'city_id' => 331,
                'type' => 'Kabupaten',
                'name' => 'Pandeglang',
                'created_at' => '2020-08-28 03:46:01',
                'updated_at' => '2020-08-28 03:46:01',
            ),
            19 => 
            array (
                'id' => 20,
                'province_id' => 3,
                'city_id' => 402,
                'type' => 'Kabupaten',
                'name' => 'Serang',
                'created_at' => '2020-08-28 03:46:08',
                'updated_at' => '2020-08-28 03:46:08',
            ),
            20 => 
            array (
                'id' => 21,
                'province_id' => 3,
                'city_id' => 403,
                'type' => 'Kota',
                'name' => 'Serang',
                'created_at' => '2020-08-28 03:46:16',
                'updated_at' => '2020-08-28 03:46:16',
            ),
            21 => 
            array (
                'id' => 22,
                'province_id' => 3,
                'city_id' => 455,
                'type' => 'Kabupaten',
                'name' => 'Tangerang',
                'created_at' => '2020-08-28 03:46:18',
                'updated_at' => '2020-08-28 03:46:18',
            ),
            22 => 
            array (
                'id' => 23,
                'province_id' => 3,
                'city_id' => 456,
                'type' => 'Kota',
                'name' => 'Tangerang',
                'created_at' => '2020-08-28 03:46:27',
                'updated_at' => '2020-08-28 03:46:27',
            ),
            23 => 
            array (
                'id' => 24,
                'province_id' => 3,
                'city_id' => 457,
                'type' => 'Kota',
                'name' => 'Tangerang Selatan',
                'created_at' => '2020-08-28 03:46:31',
                'updated_at' => '2020-08-28 03:46:31',
            ),
            24 => 
            array (
                'id' => 25,
                'province_id' => 4,
                'city_id' => 62,
                'type' => 'Kota',
                'name' => 'Bengkulu',
                'created_at' => '2020-08-28 03:46:39',
                'updated_at' => '2020-08-28 03:46:39',
            ),
            25 => 
            array (
                'id' => 26,
                'province_id' => 4,
                'city_id' => 63,
                'type' => 'Kabupaten',
                'name' => 'Bengkulu Selatan',
                'created_at' => '2020-08-28 03:46:45',
                'updated_at' => '2020-08-28 03:46:45',
            ),
            26 => 
            array (
                'id' => 27,
                'province_id' => 4,
                'city_id' => 64,
                'type' => 'Kabupaten',
                'name' => 'Bengkulu Tengah',
                'created_at' => '2020-08-28 03:46:49',
                'updated_at' => '2020-08-28 03:46:49',
            ),
            27 => 
            array (
                'id' => 28,
                'province_id' => 4,
                'city_id' => 65,
                'type' => 'Kabupaten',
                'name' => 'Bengkulu Utara',
                'created_at' => '2020-08-28 03:46:53',
                'updated_at' => '2020-08-28 03:46:53',
            ),
            28 => 
            array (
                'id' => 29,
                'province_id' => 4,
                'city_id' => 175,
                'type' => 'Kabupaten',
                'name' => 'Kaur',
                'created_at' => '2020-08-28 03:46:57',
                'updated_at' => '2020-08-28 03:46:57',
            ),
            29 => 
            array (
                'id' => 30,
                'province_id' => 4,
                'city_id' => 183,
                'type' => 'Kabupaten',
                'name' => 'Kepahiang',
                'created_at' => '2020-08-28 03:47:00',
                'updated_at' => '2020-08-28 03:47:00',
            ),
            30 => 
            array (
                'id' => 31,
                'province_id' => 4,
                'city_id' => 233,
                'type' => 'Kabupaten',
                'name' => 'Lebong',
                'created_at' => '2020-08-28 03:47:04',
                'updated_at' => '2020-08-28 03:47:04',
            ),
            31 => 
            array (
                'id' => 32,
                'province_id' => 4,
                'city_id' => 294,
                'type' => 'Kabupaten',
                'name' => 'Muko Muko',
                'created_at' => '2020-08-28 03:47:08',
                'updated_at' => '2020-08-28 03:47:08',
            ),
            32 => 
            array (
                'id' => 33,
                'province_id' => 4,
                'city_id' => 379,
                'type' => 'Kabupaten',
                'name' => 'Rejang Lebong',
                'created_at' => '2020-08-28 03:47:12',
                'updated_at' => '2020-08-28 03:47:12',
            ),
            33 => 
            array (
                'id' => 34,
                'province_id' => 4,
                'city_id' => 397,
                'type' => 'Kabupaten',
                'name' => 'Seluma',
                'created_at' => '2020-08-28 03:47:19',
                'updated_at' => '2020-08-28 03:47:19',
            ),
            34 => 
            array (
                'id' => 35,
                'province_id' => 5,
                'city_id' => 39,
                'type' => 'Kabupaten',
                'name' => 'Bantul',
                'created_at' => '2020-08-28 03:47:24',
                'updated_at' => '2020-08-28 03:47:24',
            ),
            35 => 
            array (
                'id' => 36,
                'province_id' => 5,
                'city_id' => 135,
                'type' => 'Kabupaten',
                'name' => 'Gunung Kidul',
                'created_at' => '2020-08-28 03:47:29',
                'updated_at' => '2020-08-28 03:47:29',
            ),
            36 => 
            array (
                'id' => 37,
                'province_id' => 5,
                'city_id' => 210,
                'type' => 'Kabupaten',
                'name' => 'Kulon Progo',
                'created_at' => '2020-08-28 03:47:33',
                'updated_at' => '2020-08-28 03:47:33',
            ),
            37 => 
            array (
                'id' => 38,
                'province_id' => 5,
                'city_id' => 419,
                'type' => 'Kabupaten',
                'name' => 'Sleman',
                'created_at' => '2020-08-28 03:47:36',
                'updated_at' => '2020-08-28 03:47:36',
            ),
            38 => 
            array (
                'id' => 39,
                'province_id' => 5,
                'city_id' => 501,
                'type' => 'Kota',
                'name' => 'Yogyakarta',
                'created_at' => '2020-08-28 03:47:39',
                'updated_at' => '2020-08-28 03:47:39',
            ),
            39 => 
            array (
                'id' => 40,
                'province_id' => 6,
                'city_id' => 151,
                'type' => 'Kota',
                'name' => 'Jakarta Barat',
                'created_at' => '2020-08-28 03:47:44',
                'updated_at' => '2020-08-28 03:47:44',
            ),
            40 => 
            array (
                'id' => 41,
                'province_id' => 6,
                'city_id' => 152,
                'type' => 'Kota',
                'name' => 'Jakarta Pusat',
                'created_at' => '2020-08-28 03:47:49',
                'updated_at' => '2020-08-28 03:47:49',
            ),
            41 => 
            array (
                'id' => 42,
                'province_id' => 6,
                'city_id' => 153,
                'type' => 'Kota',
                'name' => 'Jakarta Selatan',
                'created_at' => '2020-08-28 03:47:54',
                'updated_at' => '2020-08-28 03:47:54',
            ),
            42 => 
            array (
                'id' => 43,
                'province_id' => 6,
                'city_id' => 154,
                'type' => 'Kota',
                'name' => 'Jakarta Timur',
                'created_at' => '2020-08-28 03:48:00',
                'updated_at' => '2020-08-28 03:48:00',
            ),
            43 => 
            array (
                'id' => 44,
                'province_id' => 6,
                'city_id' => 155,
                'type' => 'Kota',
                'name' => 'Jakarta Utara',
                'created_at' => '2020-08-28 03:48:04',
                'updated_at' => '2020-08-28 03:48:04',
            ),
            44 => 
            array (
                'id' => 45,
                'province_id' => 6,
                'city_id' => 189,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Seribu',
                'created_at' => '2020-08-28 03:48:06',
                'updated_at' => '2020-08-28 03:48:06',
            ),
            45 => 
            array (
                'id' => 46,
                'province_id' => 7,
                'city_id' => 77,
                'type' => 'Kabupaten',
                'name' => 'Boalemo',
                'created_at' => '2020-08-28 03:48:09',
                'updated_at' => '2020-08-28 03:48:09',
            ),
            46 => 
            array (
                'id' => 47,
                'province_id' => 7,
                'city_id' => 88,
                'type' => 'Kabupaten',
                'name' => 'Bone Bolango',
                'created_at' => '2020-08-28 03:48:13',
                'updated_at' => '2020-08-28 03:48:13',
            ),
            47 => 
            array (
                'id' => 48,
                'province_id' => 7,
                'city_id' => 129,
                'type' => 'Kabupaten',
                'name' => 'Gorontalo',
                'created_at' => '2020-08-28 03:48:16',
                'updated_at' => '2020-08-28 03:48:16',
            ),
            48 => 
            array (
                'id' => 49,
                'province_id' => 7,
                'city_id' => 130,
                'type' => 'Kota',
                'name' => 'Gorontalo',
                'created_at' => '2020-08-28 03:48:22',
                'updated_at' => '2020-08-28 03:48:22',
            ),
            49 => 
            array (
                'id' => 50,
                'province_id' => 7,
                'city_id' => 131,
                'type' => 'Kabupaten',
                'name' => 'Gorontalo Utara',
                'created_at' => '2020-08-28 03:48:26',
                'updated_at' => '2020-08-28 03:48:26',
            ),
            50 => 
            array (
                'id' => 51,
                'province_id' => 7,
                'city_id' => 361,
                'type' => 'Kabupaten',
                'name' => 'Pohuwato',
                'created_at' => '2020-08-28 03:48:29',
                'updated_at' => '2020-08-28 03:48:29',
            ),
            51 => 
            array (
                'id' => 52,
                'province_id' => 8,
                'city_id' => 50,
                'type' => 'Kabupaten',
                'name' => 'Batang Hari',
                'created_at' => '2020-08-28 03:48:32',
                'updated_at' => '2020-08-28 03:48:32',
            ),
            52 => 
            array (
                'id' => 53,
                'province_id' => 8,
                'city_id' => 97,
                'type' => 'Kabupaten',
                'name' => 'Bungo',
                'created_at' => '2020-08-28 03:48:36',
                'updated_at' => '2020-08-28 03:48:36',
            ),
            53 => 
            array (
                'id' => 54,
                'province_id' => 8,
                'city_id' => 156,
                'type' => 'Kota',
                'name' => 'Jambi',
                'created_at' => '2020-08-28 03:48:42',
                'updated_at' => '2020-08-28 03:48:42',
            ),
            54 => 
            array (
                'id' => 55,
                'province_id' => 8,
                'city_id' => 194,
                'type' => 'Kabupaten',
                'name' => 'Kerinci',
                'created_at' => '2020-08-28 03:48:44',
                'updated_at' => '2020-08-28 03:48:44',
            ),
            55 => 
            array (
                'id' => 56,
                'province_id' => 8,
                'city_id' => 280,
                'type' => 'Kabupaten',
                'name' => 'Merangin',
                'created_at' => '2020-08-28 03:48:49',
                'updated_at' => '2020-08-28 03:48:49',
            ),
            56 => 
            array (
                'id' => 57,
                'province_id' => 8,
                'city_id' => 293,
                'type' => 'Kabupaten',
                'name' => 'Muaro Jambi',
                'created_at' => '2020-08-28 03:48:55',
                'updated_at' => '2020-08-28 03:48:55',
            ),
            57 => 
            array (
                'id' => 58,
                'province_id' => 8,
                'city_id' => 393,
                'type' => 'Kabupaten',
                'name' => 'Sarolangun',
                'created_at' => '2020-08-28 03:48:59',
                'updated_at' => '2020-08-28 03:48:59',
            ),
            58 => 
            array (
                'id' => 59,
                'province_id' => 8,
                'city_id' => 442,
                'type' => 'Kota',
                'name' => 'Sungaipenuh',
                'created_at' => '2020-08-28 03:49:04',
                'updated_at' => '2020-08-28 03:49:04',
            ),
            59 => 
            array (
                'id' => 60,
                'province_id' => 8,
                'city_id' => 460,
                'type' => 'Kabupaten',
                'name' => 'Tanjung Jabung Barat',
                'created_at' => '2020-08-28 03:49:07',
                'updated_at' => '2020-08-28 03:49:07',
            ),
            60 => 
            array (
                'id' => 61,
                'province_id' => 8,
                'city_id' => 461,
                'type' => 'Kabupaten',
                'name' => 'Tanjung Jabung Timur',
                'created_at' => '2020-08-28 03:49:11',
                'updated_at' => '2020-08-28 03:49:11',
            ),
            61 => 
            array (
                'id' => 62,
                'province_id' => 8,
                'city_id' => 471,
                'type' => 'Kabupaten',
                'name' => 'Tebo',
                'created_at' => '2020-08-28 03:49:14',
                'updated_at' => '2020-08-28 03:49:14',
            ),
            62 => 
            array (
                'id' => 63,
                'province_id' => 9,
                'city_id' => 22,
                'type' => 'Kabupaten',
                'name' => 'Bandung',
                'created_at' => '2020-08-28 03:49:21',
                'updated_at' => '2020-08-28 03:49:21',
            ),
            63 => 
            array (
                'id' => 64,
                'province_id' => 9,
                'city_id' => 23,
                'type' => 'Kota',
                'name' => 'Bandung',
                'created_at' => '2020-08-28 03:49:25',
                'updated_at' => '2020-08-28 03:49:25',
            ),
            64 => 
            array (
                'id' => 65,
                'province_id' => 9,
                'city_id' => 24,
                'type' => 'Kabupaten',
                'name' => 'Bandung Barat',
                'created_at' => '2020-08-28 03:49:29',
                'updated_at' => '2020-08-28 03:49:29',
            ),
            65 => 
            array (
                'id' => 66,
                'province_id' => 9,
                'city_id' => 34,
                'type' => 'Kota',
                'name' => 'Banjar',
                'created_at' => '2020-08-28 03:49:32',
                'updated_at' => '2020-08-28 03:49:32',
            ),
            66 => 
            array (
                'id' => 67,
                'province_id' => 9,
                'city_id' => 54,
                'type' => 'Kabupaten',
                'name' => 'Bekasi',
                'created_at' => '2020-08-28 03:49:34',
                'updated_at' => '2020-08-28 03:49:34',
            ),
            67 => 
            array (
                'id' => 68,
                'province_id' => 9,
                'city_id' => 55,
                'type' => 'Kota',
                'name' => 'Bekasi',
                'created_at' => '2020-08-28 03:49:38',
                'updated_at' => '2020-08-28 03:49:38',
            ),
            68 => 
            array (
                'id' => 69,
                'province_id' => 9,
                'city_id' => 78,
                'type' => 'Kabupaten',
                'name' => 'Bogor',
                'created_at' => '2020-08-28 03:49:42',
                'updated_at' => '2020-08-28 03:49:42',
            ),
            69 => 
            array (
                'id' => 70,
                'province_id' => 9,
                'city_id' => 79,
                'type' => 'Kota',
                'name' => 'Bogor',
                'created_at' => '2020-08-28 03:49:52',
                'updated_at' => '2020-08-28 03:49:52',
            ),
            70 => 
            array (
                'id' => 71,
                'province_id' => 9,
                'city_id' => 103,
                'type' => 'Kabupaten',
                'name' => 'Ciamis',
                'created_at' => '2020-08-28 03:49:54',
                'updated_at' => '2020-08-28 03:49:54',
            ),
            71 => 
            array (
                'id' => 72,
                'province_id' => 9,
                'city_id' => 104,
                'type' => 'Kabupaten',
                'name' => 'Cianjur',
                'created_at' => '2020-08-28 03:50:02',
                'updated_at' => '2020-08-28 03:50:02',
            ),
            72 => 
            array (
                'id' => 73,
                'province_id' => 9,
                'city_id' => 107,
                'type' => 'Kota',
                'name' => 'Cimahi',
                'created_at' => '2020-08-28 03:50:09',
                'updated_at' => '2020-08-28 03:50:09',
            ),
            73 => 
            array (
                'id' => 74,
                'province_id' => 9,
                'city_id' => 108,
                'type' => 'Kabupaten',
                'name' => 'Cirebon',
                'created_at' => '2020-08-28 03:50:11',
                'updated_at' => '2020-08-28 03:50:11',
            ),
            74 => 
            array (
                'id' => 75,
                'province_id' => 9,
                'city_id' => 109,
                'type' => 'Kota',
                'name' => 'Cirebon',
                'created_at' => '2020-08-28 03:50:18',
                'updated_at' => '2020-08-28 03:50:18',
            ),
            75 => 
            array (
                'id' => 76,
                'province_id' => 9,
                'city_id' => 115,
                'type' => 'Kota',
                'name' => 'Depok',
                'created_at' => '2020-08-28 03:50:21',
                'updated_at' => '2020-08-28 03:50:21',
            ),
            76 => 
            array (
                'id' => 77,
                'province_id' => 9,
                'city_id' => 126,
                'type' => 'Kabupaten',
                'name' => 'Garut',
                'created_at' => '2020-08-28 03:50:27',
                'updated_at' => '2020-08-28 03:50:27',
            ),
            77 => 
            array (
                'id' => 78,
                'province_id' => 9,
                'city_id' => 149,
                'type' => 'Kabupaten',
                'name' => 'Indramayu',
                'created_at' => '2020-08-28 03:50:37',
                'updated_at' => '2020-08-28 03:50:37',
            ),
            78 => 
            array (
                'id' => 79,
                'province_id' => 9,
                'city_id' => 171,
                'type' => 'Kabupaten',
                'name' => 'Karawang',
                'created_at' => '2020-08-28 03:50:45',
                'updated_at' => '2020-08-28 03:50:45',
            ),
            79 => 
            array (
                'id' => 80,
                'province_id' => 9,
                'city_id' => 211,
                'type' => 'Kabupaten',
                'name' => 'Kuningan',
                'created_at' => '2020-08-28 03:50:50',
                'updated_at' => '2020-08-28 03:50:50',
            ),
            80 => 
            array (
                'id' => 81,
                'province_id' => 9,
                'city_id' => 252,
                'type' => 'Kabupaten',
                'name' => 'Majalengka',
                'created_at' => '2020-08-28 03:51:00',
                'updated_at' => '2020-08-28 03:51:00',
            ),
            81 => 
            array (
                'id' => 82,
                'province_id' => 9,
                'city_id' => 332,
                'type' => 'Kabupaten',
                'name' => 'Pangandaran',
                'created_at' => '2020-08-28 03:51:05',
                'updated_at' => '2020-08-28 03:51:05',
            ),
            82 => 
            array (
                'id' => 83,
                'province_id' => 9,
                'city_id' => 376,
                'type' => 'Kabupaten',
                'name' => 'Purwakarta',
                'created_at' => '2020-08-28 03:51:11',
                'updated_at' => '2020-08-28 03:51:11',
            ),
            83 => 
            array (
                'id' => 84,
                'province_id' => 9,
                'city_id' => 428,
                'type' => 'Kabupaten',
                'name' => 'Subang',
                'created_at' => '2020-08-28 03:51:16',
                'updated_at' => '2020-08-28 03:51:16',
            ),
            84 => 
            array (
                'id' => 85,
                'province_id' => 9,
                'city_id' => 430,
                'type' => 'Kabupaten',
                'name' => 'Sukabumi',
                'created_at' => '2020-08-28 03:51:21',
                'updated_at' => '2020-08-28 03:51:21',
            ),
            85 => 
            array (
                'id' => 86,
                'province_id' => 9,
                'city_id' => 431,
                'type' => 'Kota',
                'name' => 'Sukabumi',
                'created_at' => '2020-08-28 03:51:33',
                'updated_at' => '2020-08-28 03:51:33',
            ),
            86 => 
            array (
                'id' => 87,
                'province_id' => 9,
                'city_id' => 440,
                'type' => 'Kabupaten',
                'name' => 'Sumedang',
                'created_at' => '2020-08-28 03:51:37',
                'updated_at' => '2020-08-28 03:51:37',
            ),
            87 => 
            array (
                'id' => 88,
                'province_id' => 9,
                'city_id' => 468,
                'type' => 'Kabupaten',
                'name' => 'Tasikmalaya',
                'created_at' => '2020-08-28 03:51:42',
                'updated_at' => '2020-08-28 03:51:42',
            ),
            88 => 
            array (
                'id' => 89,
                'province_id' => 9,
                'city_id' => 469,
                'type' => 'Kota',
                'name' => 'Tasikmalaya',
                'created_at' => '2020-08-28 03:51:56',
                'updated_at' => '2020-08-28 03:51:56',
            ),
            89 => 
            array (
                'id' => 90,
                'province_id' => 10,
                'city_id' => 37,
                'type' => 'Kabupaten',
                'name' => 'Banjarnegara',
                'created_at' => '2020-08-28 03:52:02',
                'updated_at' => '2020-08-28 03:52:02',
            ),
            90 => 
            array (
                'id' => 91,
                'province_id' => 10,
                'city_id' => 41,
                'type' => 'Kabupaten',
                'name' => 'Banyumas',
                'created_at' => '2020-08-28 03:52:09',
                'updated_at' => '2020-08-28 03:52:09',
            ),
            91 => 
            array (
                'id' => 92,
                'province_id' => 10,
                'city_id' => 49,
                'type' => 'Kabupaten',
                'name' => 'Batang',
                'created_at' => '2020-08-28 03:52:16',
                'updated_at' => '2020-08-28 03:52:16',
            ),
            92 => 
            array (
                'id' => 93,
                'province_id' => 10,
                'city_id' => 76,
                'type' => 'Kabupaten',
                'name' => 'Blora',
                'created_at' => '2020-08-28 03:52:22',
                'updated_at' => '2020-08-28 03:52:22',
            ),
            93 => 
            array (
                'id' => 94,
                'province_id' => 10,
                'city_id' => 91,
                'type' => 'Kabupaten',
                'name' => 'Boyolali',
                'created_at' => '2020-08-28 03:52:27',
                'updated_at' => '2020-08-28 03:52:27',
            ),
            94 => 
            array (
                'id' => 95,
                'province_id' => 10,
                'city_id' => 92,
                'type' => 'Kabupaten',
                'name' => 'Brebes',
                'created_at' => '2020-08-28 03:52:31',
                'updated_at' => '2020-08-28 03:52:31',
            ),
            95 => 
            array (
                'id' => 96,
                'province_id' => 10,
                'city_id' => 105,
                'type' => 'Kabupaten',
                'name' => 'Cilacap',
                'created_at' => '2020-08-28 03:52:34',
                'updated_at' => '2020-08-28 03:52:34',
            ),
            96 => 
            array (
                'id' => 97,
                'province_id' => 10,
                'city_id' => 113,
                'type' => 'Kabupaten',
                'name' => 'Demak',
                'created_at' => '2020-08-28 03:52:39',
                'updated_at' => '2020-08-28 03:52:39',
            ),
            97 => 
            array (
                'id' => 98,
                'province_id' => 10,
                'city_id' => 134,
                'type' => 'Kabupaten',
                'name' => 'Grobogan',
                'created_at' => '2020-08-28 03:52:42',
                'updated_at' => '2020-08-28 03:52:42',
            ),
            98 => 
            array (
                'id' => 99,
                'province_id' => 10,
                'city_id' => 163,
                'type' => 'Kabupaten',
                'name' => 'Jepara',
                'created_at' => '2020-08-28 03:52:50',
                'updated_at' => '2020-08-28 03:52:50',
            ),
            99 => 
            array (
                'id' => 100,
                'province_id' => 10,
                'city_id' => 169,
                'type' => 'Kabupaten',
                'name' => 'Karanganyar',
                'created_at' => '2020-08-28 03:52:52',
                'updated_at' => '2020-08-28 03:52:52',
            ),
            100 => 
            array (
                'id' => 101,
                'province_id' => 10,
                'city_id' => 177,
                'type' => 'Kabupaten',
                'name' => 'Kebumen',
                'created_at' => '2020-08-28 03:52:58',
                'updated_at' => '2020-08-28 03:52:58',
            ),
            101 => 
            array (
                'id' => 102,
                'province_id' => 10,
                'city_id' => 181,
                'type' => 'Kabupaten',
                'name' => 'Kendal',
                'created_at' => '2020-08-28 03:53:02',
                'updated_at' => '2020-08-28 03:53:02',
            ),
            102 => 
            array (
                'id' => 103,
                'province_id' => 10,
                'city_id' => 196,
                'type' => 'Kabupaten',
                'name' => 'Klaten',
                'created_at' => '2020-08-28 03:53:08',
                'updated_at' => '2020-08-28 03:53:08',
            ),
            103 => 
            array (
                'id' => 104,
                'province_id' => 10,
                'city_id' => 209,
                'type' => 'Kabupaten',
                'name' => 'Kudus',
                'created_at' => '2020-08-28 03:53:13',
                'updated_at' => '2020-08-28 03:53:13',
            ),
            104 => 
            array (
                'id' => 105,
                'province_id' => 10,
                'city_id' => 249,
                'type' => 'Kabupaten',
                'name' => 'Magelang',
                'created_at' => '2020-08-28 03:53:16',
                'updated_at' => '2020-08-28 03:53:16',
            ),
            105 => 
            array (
                'id' => 106,
                'province_id' => 10,
                'city_id' => 250,
                'type' => 'Kota',
                'name' => 'Magelang',
                'created_at' => '2020-08-28 03:53:20',
                'updated_at' => '2020-08-28 03:53:20',
            ),
            106 => 
            array (
                'id' => 107,
                'province_id' => 10,
                'city_id' => 344,
                'type' => 'Kabupaten',
                'name' => 'Pati',
                'created_at' => '2020-08-28 03:53:23',
                'updated_at' => '2020-08-28 03:53:23',
            ),
            107 => 
            array (
                'id' => 108,
                'province_id' => 10,
                'city_id' => 348,
                'type' => 'Kabupaten',
                'name' => 'Pekalongan',
                'created_at' => '2020-08-28 03:53:29',
                'updated_at' => '2020-08-28 03:53:29',
            ),
            108 => 
            array (
                'id' => 109,
                'province_id' => 10,
                'city_id' => 349,
                'type' => 'Kota',
                'name' => 'Pekalongan',
                'created_at' => '2020-08-28 03:53:34',
                'updated_at' => '2020-08-28 03:53:34',
            ),
            109 => 
            array (
                'id' => 110,
                'province_id' => 10,
                'city_id' => 352,
                'type' => 'Kabupaten',
                'name' => 'Pemalang',
                'created_at' => '2020-08-28 03:53:36',
                'updated_at' => '2020-08-28 03:53:36',
            ),
            110 => 
            array (
                'id' => 111,
                'province_id' => 10,
                'city_id' => 375,
                'type' => 'Kabupaten',
                'name' => 'Purbalingga',
                'created_at' => '2020-08-28 03:53:43',
                'updated_at' => '2020-08-28 03:53:43',
            ),
            111 => 
            array (
                'id' => 112,
                'province_id' => 10,
                'city_id' => 377,
                'type' => 'Kabupaten',
                'name' => 'Purworejo',
                'created_at' => '2020-08-28 03:53:47',
                'updated_at' => '2020-08-28 03:53:47',
            ),
            112 => 
            array (
                'id' => 113,
                'province_id' => 10,
                'city_id' => 380,
                'type' => 'Kabupaten',
                'name' => 'Rembang',
                'created_at' => '2020-08-28 03:53:51',
                'updated_at' => '2020-08-28 03:53:51',
            ),
            113 => 
            array (
                'id' => 114,
                'province_id' => 10,
                'city_id' => 386,
                'type' => 'Kota',
                'name' => 'Salatiga',
                'created_at' => '2020-08-28 03:53:54',
                'updated_at' => '2020-08-28 03:53:54',
            ),
            114 => 
            array (
                'id' => 115,
                'province_id' => 10,
                'city_id' => 398,
                'type' => 'Kabupaten',
                'name' => 'Semarang',
                'created_at' => '2020-08-28 03:53:55',
                'updated_at' => '2020-08-28 03:53:55',
            ),
            115 => 
            array (
                'id' => 116,
                'province_id' => 10,
                'city_id' => 399,
                'type' => 'Kota',
                'name' => 'Semarang',
                'created_at' => '2020-08-28 03:54:01',
                'updated_at' => '2020-08-28 03:54:01',
            ),
            116 => 
            array (
                'id' => 117,
                'province_id' => 10,
                'city_id' => 427,
                'type' => 'Kabupaten',
                'name' => 'Sragen',
                'created_at' => '2020-08-28 03:54:06',
                'updated_at' => '2020-08-28 03:54:06',
            ),
            117 => 
            array (
                'id' => 118,
                'province_id' => 10,
                'city_id' => 433,
                'type' => 'Kabupaten',
                'name' => 'Sukoharjo',
                'created_at' => '2020-08-28 03:54:12',
                'updated_at' => '2020-08-28 03:54:12',
            ),
            118 => 
            array (
                'id' => 119,
                'province_id' => 10,
                'city_id' => 445,
                'type' => 'Kota',
            'name' => 'Surakarta (Solo)',
                'created_at' => '2020-08-28 03:54:16',
                'updated_at' => '2020-08-28 03:54:16',
            ),
            119 => 
            array (
                'id' => 120,
                'province_id' => 10,
                'city_id' => 472,
                'type' => 'Kabupaten',
                'name' => 'Tegal',
                'created_at' => '2020-08-28 03:54:21',
                'updated_at' => '2020-08-28 03:54:21',
            ),
            120 => 
            array (
                'id' => 121,
                'province_id' => 10,
                'city_id' => 473,
                'type' => 'Kota',
                'name' => 'Tegal',
                'created_at' => '2020-08-28 03:54:26',
                'updated_at' => '2020-08-28 03:54:26',
            ),
            121 => 
            array (
                'id' => 122,
                'province_id' => 10,
                'city_id' => 476,
                'type' => 'Kabupaten',
                'name' => 'Temanggung',
                'created_at' => '2020-08-28 03:54:28',
                'updated_at' => '2020-08-28 03:54:28',
            ),
            122 => 
            array (
                'id' => 123,
                'province_id' => 10,
                'city_id' => 497,
                'type' => 'Kabupaten',
                'name' => 'Wonogiri',
                'created_at' => '2020-08-28 03:54:34',
                'updated_at' => '2020-08-28 03:54:34',
            ),
            123 => 
            array (
                'id' => 124,
                'province_id' => 10,
                'city_id' => 498,
                'type' => 'Kabupaten',
                'name' => 'Wonosobo',
                'created_at' => '2020-08-28 03:54:41',
                'updated_at' => '2020-08-28 03:54:41',
            ),
            124 => 
            array (
                'id' => 125,
                'province_id' => 11,
                'city_id' => 31,
                'type' => 'Kabupaten',
                'name' => 'Bangkalan',
                'created_at' => '2020-08-28 03:54:46',
                'updated_at' => '2020-08-28 03:54:46',
            ),
            125 => 
            array (
                'id' => 126,
                'province_id' => 11,
                'city_id' => 42,
                'type' => 'Kabupaten',
                'name' => 'Banyuwangi',
                'created_at' => '2020-08-28 03:54:49',
                'updated_at' => '2020-08-28 03:54:49',
            ),
            126 => 
            array (
                'id' => 127,
                'province_id' => 11,
                'city_id' => 51,
                'type' => 'Kota',
                'name' => 'Batu',
                'created_at' => '2020-08-28 03:54:57',
                'updated_at' => '2020-08-28 03:54:57',
            ),
            127 => 
            array (
                'id' => 128,
                'province_id' => 11,
                'city_id' => 74,
                'type' => 'Kabupaten',
                'name' => 'Blitar',
                'created_at' => '2020-08-28 03:54:59',
                'updated_at' => '2020-08-28 03:54:59',
            ),
            128 => 
            array (
                'id' => 129,
                'province_id' => 11,
                'city_id' => 75,
                'type' => 'Kota',
                'name' => 'Blitar',
                'created_at' => '2020-08-28 03:55:02',
                'updated_at' => '2020-08-28 03:55:02',
            ),
            129 => 
            array (
                'id' => 130,
                'province_id' => 11,
                'city_id' => 80,
                'type' => 'Kabupaten',
                'name' => 'Bojonegoro',
                'created_at' => '2020-08-28 03:55:04',
                'updated_at' => '2020-08-28 03:55:04',
            ),
            130 => 
            array (
                'id' => 131,
                'province_id' => 11,
                'city_id' => 86,
                'type' => 'Kabupaten',
                'name' => 'Bondowoso',
                'created_at' => '2020-08-28 03:55:09',
                'updated_at' => '2020-08-28 03:55:09',
            ),
            131 => 
            array (
                'id' => 132,
                'province_id' => 11,
                'city_id' => 133,
                'type' => 'Kabupaten',
                'name' => 'Gresik',
                'created_at' => '2020-08-28 03:55:15',
                'updated_at' => '2020-08-28 03:55:15',
            ),
            132 => 
            array (
                'id' => 133,
                'province_id' => 11,
                'city_id' => 160,
                'type' => 'Kabupaten',
                'name' => 'Jember',
                'created_at' => '2020-08-28 03:55:19',
                'updated_at' => '2020-08-28 03:55:19',
            ),
            133 => 
            array (
                'id' => 134,
                'province_id' => 11,
                'city_id' => 164,
                'type' => 'Kabupaten',
                'name' => 'Jombang',
                'created_at' => '2020-08-28 03:55:25',
                'updated_at' => '2020-08-28 03:55:25',
            ),
            134 => 
            array (
                'id' => 135,
                'province_id' => 11,
                'city_id' => 178,
                'type' => 'Kabupaten',
                'name' => 'Kediri',
                'created_at' => '2020-08-28 03:55:32',
                'updated_at' => '2020-08-28 03:55:32',
            ),
            135 => 
            array (
                'id' => 136,
                'province_id' => 11,
                'city_id' => 179,
                'type' => 'Kota',
                'name' => 'Kediri',
                'created_at' => '2020-08-28 03:55:41',
                'updated_at' => '2020-08-28 03:55:41',
            ),
            136 => 
            array (
                'id' => 137,
                'province_id' => 11,
                'city_id' => 222,
                'type' => 'Kabupaten',
                'name' => 'Lamongan',
                'created_at' => '2020-08-28 03:55:44',
                'updated_at' => '2020-08-28 03:55:44',
            ),
            137 => 
            array (
                'id' => 138,
                'province_id' => 11,
                'city_id' => 243,
                'type' => 'Kabupaten',
                'name' => 'Lumajang',
                'created_at' => '2020-08-28 03:55:51',
                'updated_at' => '2020-08-28 03:55:51',
            ),
            138 => 
            array (
                'id' => 139,
                'province_id' => 11,
                'city_id' => 247,
                'type' => 'Kabupaten',
                'name' => 'Madiun',
                'created_at' => '2020-08-28 03:55:57',
                'updated_at' => '2020-08-28 03:55:57',
            ),
            139 => 
            array (
                'id' => 140,
                'province_id' => 11,
                'city_id' => 248,
                'type' => 'Kota',
                'name' => 'Madiun',
                'created_at' => '2020-08-28 03:56:01',
                'updated_at' => '2020-08-28 03:56:01',
            ),
            140 => 
            array (
                'id' => 141,
                'province_id' => 11,
                'city_id' => 251,
                'type' => 'Kabupaten',
                'name' => 'Magetan',
                'created_at' => '2020-08-28 03:56:04',
                'updated_at' => '2020-08-28 03:56:04',
            ),
            141 => 
            array (
                'id' => 142,
                'province_id' => 11,
                'city_id' => 256,
                'type' => 'Kota',
                'name' => 'Malang',
                'created_at' => '2020-08-28 03:56:06',
                'updated_at' => '2020-08-28 03:56:06',
            ),
            142 => 
            array (
                'id' => 143,
                'province_id' => 11,
                'city_id' => 255,
                'type' => 'Kabupaten',
                'name' => 'Malang',
                'created_at' => '2020-08-28 03:56:09',
                'updated_at' => '2020-08-28 03:56:09',
            ),
            143 => 
            array (
                'id' => 144,
                'province_id' => 11,
                'city_id' => 289,
                'type' => 'Kabupaten',
                'name' => 'Mojokerto',
                'created_at' => '2020-08-28 03:56:19',
                'updated_at' => '2020-08-28 03:56:19',
            ),
            144 => 
            array (
                'id' => 145,
                'province_id' => 11,
                'city_id' => 290,
                'type' => 'Kota',
                'name' => 'Mojokerto',
                'created_at' => '2020-08-28 03:56:24',
                'updated_at' => '2020-08-28 03:56:24',
            ),
            145 => 
            array (
                'id' => 146,
                'province_id' => 11,
                'city_id' => 305,
                'type' => 'Kabupaten',
                'name' => 'Nganjuk',
                'created_at' => '2020-08-28 03:56:27',
                'updated_at' => '2020-08-28 03:56:27',
            ),
            146 => 
            array (
                'id' => 147,
                'province_id' => 11,
                'city_id' => 306,
                'type' => 'Kabupaten',
                'name' => 'Ngawi',
                'created_at' => '2020-08-28 03:56:34',
                'updated_at' => '2020-08-28 03:56:34',
            ),
            147 => 
            array (
                'id' => 148,
                'province_id' => 11,
                'city_id' => 317,
                'type' => 'Kabupaten',
                'name' => 'Pacitan',
                'created_at' => '2020-08-28 03:56:40',
                'updated_at' => '2020-08-28 03:56:40',
            ),
            148 => 
            array (
                'id' => 149,
                'province_id' => 11,
                'city_id' => 330,
                'type' => 'Kabupaten',
                'name' => 'Pamekasan',
                'created_at' => '2020-08-28 03:56:43',
                'updated_at' => '2020-08-28 03:56:43',
            ),
            149 => 
            array (
                'id' => 150,
                'province_id' => 11,
                'city_id' => 342,
                'type' => 'Kabupaten',
                'name' => 'Pasuruan',
                'created_at' => '2020-08-28 03:56:45',
                'updated_at' => '2020-08-28 03:56:45',
            ),
            150 => 
            array (
                'id' => 151,
                'province_id' => 11,
                'city_id' => 343,
                'type' => 'Kota',
                'name' => 'Pasuruan',
                'created_at' => '2020-08-28 03:56:53',
                'updated_at' => '2020-08-28 03:56:53',
            ),
            151 => 
            array (
                'id' => 152,
                'province_id' => 11,
                'city_id' => 363,
                'type' => 'Kabupaten',
                'name' => 'Ponorogo',
                'created_at' => '2020-08-28 03:56:58',
                'updated_at' => '2020-08-28 03:56:58',
            ),
            152 => 
            array (
                'id' => 153,
                'province_id' => 11,
                'city_id' => 369,
                'type' => 'Kabupaten',
                'name' => 'Probolinggo',
                'created_at' => '2020-08-28 03:57:02',
                'updated_at' => '2020-08-28 03:57:02',
            ),
            153 => 
            array (
                'id' => 154,
                'province_id' => 11,
                'city_id' => 370,
                'type' => 'Kota',
                'name' => 'Probolinggo',
                'created_at' => '2020-08-28 03:57:08',
                'updated_at' => '2020-08-28 03:57:08',
            ),
            154 => 
            array (
                'id' => 155,
                'province_id' => 11,
                'city_id' => 390,
                'type' => 'Kabupaten',
                'name' => 'Sampang',
                'created_at' => '2020-08-28 03:57:10',
                'updated_at' => '2020-08-28 03:57:10',
            ),
            155 => 
            array (
                'id' => 156,
                'province_id' => 11,
                'city_id' => 409,
                'type' => 'Kabupaten',
                'name' => 'Sidoarjo',
                'created_at' => '2020-08-28 03:57:13',
                'updated_at' => '2020-08-28 03:57:13',
            ),
            156 => 
            array (
                'id' => 157,
                'province_id' => 11,
                'city_id' => 418,
                'type' => 'Kabupaten',
                'name' => 'Situbondo',
                'created_at' => '2020-08-28 03:57:17',
                'updated_at' => '2020-08-28 03:57:17',
            ),
            157 => 
            array (
                'id' => 158,
                'province_id' => 11,
                'city_id' => 441,
                'type' => 'Kabupaten',
                'name' => 'Sumenep',
                'created_at' => '2020-08-28 03:57:24',
                'updated_at' => '2020-08-28 03:57:24',
            ),
            158 => 
            array (
                'id' => 159,
                'province_id' => 11,
                'city_id' => 444,
                'type' => 'Kota',
                'name' => 'Surabaya',
                'created_at' => '2020-08-28 03:57:29',
                'updated_at' => '2020-08-28 03:57:29',
            ),
            159 => 
            array (
                'id' => 160,
                'province_id' => 11,
                'city_id' => 487,
                'type' => 'Kabupaten',
                'name' => 'Trenggalek',
                'created_at' => '2020-08-28 03:57:36',
                'updated_at' => '2020-08-28 03:57:36',
            ),
            160 => 
            array (
                'id' => 161,
                'province_id' => 11,
                'city_id' => 489,
                'type' => 'Kabupaten',
                'name' => 'Tuban',
                'created_at' => '2020-08-28 03:57:41',
                'updated_at' => '2020-08-28 03:57:41',
            ),
            161 => 
            array (
                'id' => 162,
                'province_id' => 11,
                'city_id' => 492,
                'type' => 'Kabupaten',
                'name' => 'Tulungagung',
                'created_at' => '2020-08-28 03:57:49',
                'updated_at' => '2020-08-28 03:57:49',
            ),
            162 => 
            array (
                'id' => 163,
                'province_id' => 12,
                'city_id' => 61,
                'type' => 'Kabupaten',
                'name' => 'Bengkayang',
                'created_at' => '2020-08-28 03:57:59',
                'updated_at' => '2020-08-28 03:57:59',
            ),
            163 => 
            array (
                'id' => 164,
                'province_id' => 12,
                'city_id' => 168,
                'type' => 'Kabupaten',
                'name' => 'Kapuas Hulu',
                'created_at' => '2020-08-28 03:58:02',
                'updated_at' => '2020-08-28 03:58:02',
            ),
            164 => 
            array (
                'id' => 165,
                'province_id' => 12,
                'city_id' => 176,
                'type' => 'Kabupaten',
                'name' => 'Kayong Utara',
                'created_at' => '2020-08-28 03:58:06',
                'updated_at' => '2020-08-28 03:58:06',
            ),
            165 => 
            array (
                'id' => 166,
                'province_id' => 12,
                'city_id' => 195,
                'type' => 'Kabupaten',
                'name' => 'Ketapang',
                'created_at' => '2020-08-28 03:58:09',
                'updated_at' => '2020-08-28 03:58:09',
            ),
            166 => 
            array (
                'id' => 167,
                'province_id' => 12,
                'city_id' => 208,
                'type' => 'Kabupaten',
                'name' => 'Kubu Raya',
                'created_at' => '2020-08-28 03:58:14',
                'updated_at' => '2020-08-28 03:58:14',
            ),
            167 => 
            array (
                'id' => 168,
                'province_id' => 12,
                'city_id' => 228,
                'type' => 'Kabupaten',
                'name' => 'Landak',
                'created_at' => '2020-08-28 03:58:18',
                'updated_at' => '2020-08-28 03:58:18',
            ),
            168 => 
            array (
                'id' => 169,
                'province_id' => 12,
                'city_id' => 279,
                'type' => 'Kabupaten',
                'name' => 'Melawi',
                'created_at' => '2020-08-28 03:58:22',
                'updated_at' => '2020-08-28 03:58:22',
            ),
            169 => 
            array (
                'id' => 170,
                'province_id' => 12,
                'city_id' => 364,
                'type' => 'Kabupaten',
                'name' => 'Pontianak',
                'created_at' => '2020-08-28 03:58:25',
                'updated_at' => '2020-08-28 03:58:25',
            ),
            170 => 
            array (
                'id' => 171,
                'province_id' => 12,
                'city_id' => 365,
                'type' => 'Kota',
                'name' => 'Pontianak',
                'created_at' => '2020-08-28 03:58:28',
                'updated_at' => '2020-08-28 03:58:28',
            ),
            171 => 
            array (
                'id' => 172,
                'province_id' => 12,
                'city_id' => 388,
                'type' => 'Kabupaten',
                'name' => 'Sambas',
                'created_at' => '2020-08-28 03:58:29',
                'updated_at' => '2020-08-28 03:58:29',
            ),
            172 => 
            array (
                'id' => 173,
                'province_id' => 12,
                'city_id' => 391,
                'type' => 'Kabupaten',
                'name' => 'Sanggau',
                'created_at' => '2020-08-28 03:58:34',
                'updated_at' => '2020-08-28 03:58:34',
            ),
            173 => 
            array (
                'id' => 174,
                'province_id' => 12,
                'city_id' => 395,
                'type' => 'Kabupaten',
                'name' => 'Sekadau',
                'created_at' => '2020-08-28 03:58:39',
                'updated_at' => '2020-08-28 03:58:39',
            ),
            174 => 
            array (
                'id' => 175,
                'province_id' => 12,
                'city_id' => 415,
                'type' => 'Kota',
                'name' => 'Singkawang',
                'created_at' => '2020-08-28 03:58:43',
                'updated_at' => '2020-08-28 03:58:43',
            ),
            175 => 
            array (
                'id' => 176,
                'province_id' => 12,
                'city_id' => 417,
                'type' => 'Kabupaten',
                'name' => 'Sintang',
                'created_at' => '2020-08-28 03:58:44',
                'updated_at' => '2020-08-28 03:58:44',
            ),
            176 => 
            array (
                'id' => 177,
                'province_id' => 13,
                'city_id' => 18,
                'type' => 'Kabupaten',
                'name' => 'Balangan',
                'created_at' => '2020-08-28 03:58:49',
                'updated_at' => '2020-08-28 03:58:49',
            ),
            177 => 
            array (
                'id' => 178,
                'province_id' => 13,
                'city_id' => 33,
                'type' => 'Kabupaten',
                'name' => 'Banjar',
                'created_at' => '2020-08-28 03:58:52',
                'updated_at' => '2020-08-28 03:58:52',
            ),
            178 => 
            array (
                'id' => 179,
                'province_id' => 13,
                'city_id' => 35,
                'type' => 'Kota',
                'name' => 'Banjarbaru',
                'created_at' => '2020-08-28 03:58:56',
                'updated_at' => '2020-08-28 03:58:56',
            ),
            179 => 
            array (
                'id' => 180,
                'province_id' => 13,
                'city_id' => 36,
                'type' => 'Kota',
                'name' => 'Banjarmasin',
                'created_at' => '2020-08-28 03:58:57',
                'updated_at' => '2020-08-28 03:58:57',
            ),
            180 => 
            array (
                'id' => 181,
                'province_id' => 13,
                'city_id' => 43,
                'type' => 'Kabupaten',
                'name' => 'Barito Kuala',
                'created_at' => '2020-08-28 03:59:01',
                'updated_at' => '2020-08-28 03:59:01',
            ),
            181 => 
            array (
                'id' => 182,
                'province_id' => 13,
                'city_id' => 143,
                'type' => 'Kabupaten',
                'name' => 'Hulu Sungai Selatan',
                'created_at' => '2020-08-28 03:59:05',
                'updated_at' => '2020-08-28 03:59:05',
            ),
            182 => 
            array (
                'id' => 183,
                'province_id' => 13,
                'city_id' => 144,
                'type' => 'Kabupaten',
                'name' => 'Hulu Sungai Tengah',
                'created_at' => '2020-08-28 03:59:08',
                'updated_at' => '2020-08-28 03:59:08',
            ),
            183 => 
            array (
                'id' => 184,
                'province_id' => 13,
                'city_id' => 145,
                'type' => 'Kabupaten',
                'name' => 'Hulu Sungai Utara',
                'created_at' => '2020-08-28 03:59:11',
                'updated_at' => '2020-08-28 03:59:11',
            ),
            184 => 
            array (
                'id' => 185,
                'province_id' => 13,
                'city_id' => 203,
                'type' => 'Kabupaten',
                'name' => 'Kotabaru',
                'created_at' => '2020-08-28 03:59:14',
                'updated_at' => '2020-08-28 03:59:14',
            ),
            185 => 
            array (
                'id' => 186,
                'province_id' => 13,
                'city_id' => 446,
                'type' => 'Kabupaten',
                'name' => 'Tabalong',
                'created_at' => '2020-08-28 03:59:17',
                'updated_at' => '2020-08-28 03:59:17',
            ),
            186 => 
            array (
                'id' => 187,
                'province_id' => 13,
                'city_id' => 452,
                'type' => 'Kabupaten',
                'name' => 'Tanah Bumbu',
                'created_at' => '2020-08-28 03:59:22',
                'updated_at' => '2020-08-28 03:59:22',
            ),
            187 => 
            array (
                'id' => 188,
                'province_id' => 13,
                'city_id' => 454,
                'type' => 'Kabupaten',
                'name' => 'Tanah Laut',
                'created_at' => '2020-08-28 03:59:28',
                'updated_at' => '2020-08-28 03:59:28',
            ),
            188 => 
            array (
                'id' => 189,
                'province_id' => 13,
                'city_id' => 466,
                'type' => 'Kabupaten',
                'name' => 'Tapin',
                'created_at' => '2020-08-28 03:59:31',
                'updated_at' => '2020-08-28 03:59:31',
            ),
            189 => 
            array (
                'id' => 190,
                'province_id' => 14,
                'city_id' => 44,
                'type' => 'Kabupaten',
                'name' => 'Barito Selatan',
                'created_at' => '2020-08-28 03:59:36',
                'updated_at' => '2020-08-28 03:59:36',
            ),
            190 => 
            array (
                'id' => 191,
                'province_id' => 14,
                'city_id' => 45,
                'type' => 'Kabupaten',
                'name' => 'Barito Timur',
                'created_at' => '2020-08-28 03:59:39',
                'updated_at' => '2020-08-28 03:59:39',
            ),
            191 => 
            array (
                'id' => 192,
                'province_id' => 14,
                'city_id' => 46,
                'type' => 'Kabupaten',
                'name' => 'Barito Utara',
                'created_at' => '2020-08-28 03:59:42',
                'updated_at' => '2020-08-28 03:59:42',
            ),
            192 => 
            array (
                'id' => 193,
                'province_id' => 14,
                'city_id' => 136,
                'type' => 'Kabupaten',
                'name' => 'Gunung Mas',
                'created_at' => '2020-08-28 03:59:44',
                'updated_at' => '2020-08-28 03:59:44',
            ),
            193 => 
            array (
                'id' => 194,
                'province_id' => 14,
                'city_id' => 167,
                'type' => 'Kabupaten',
                'name' => 'Kapuas',
                'created_at' => '2020-08-28 03:59:50',
                'updated_at' => '2020-08-28 03:59:50',
            ),
            194 => 
            array (
                'id' => 195,
                'province_id' => 14,
                'city_id' => 174,
                'type' => 'Kabupaten',
                'name' => 'Katingan',
                'created_at' => '2020-08-28 03:59:53',
                'updated_at' => '2020-08-28 03:59:53',
            ),
            195 => 
            array (
                'id' => 196,
                'province_id' => 14,
                'city_id' => 205,
                'type' => 'Kabupaten',
                'name' => 'Kotawaringin Barat',
                'created_at' => '2020-08-28 03:59:57',
                'updated_at' => '2020-08-28 03:59:57',
            ),
            196 => 
            array (
                'id' => 197,
                'province_id' => 14,
                'city_id' => 206,
                'type' => 'Kabupaten',
                'name' => 'Kotawaringin Timur',
                'created_at' => '2020-08-28 04:00:01',
                'updated_at' => '2020-08-28 04:00:01',
            ),
            197 => 
            array (
                'id' => 198,
                'province_id' => 14,
                'city_id' => 221,
                'type' => 'Kabupaten',
                'name' => 'Lamandau',
                'created_at' => '2020-08-28 04:00:07',
                'updated_at' => '2020-08-28 04:00:07',
            ),
            198 => 
            array (
                'id' => 199,
                'province_id' => 14,
                'city_id' => 296,
                'type' => 'Kabupaten',
                'name' => 'Murung Raya',
                'created_at' => '2020-08-28 04:00:11',
                'updated_at' => '2020-08-28 04:00:11',
            ),
            199 => 
            array (
                'id' => 200,
                'province_id' => 14,
                'city_id' => 326,
                'type' => 'Kota',
                'name' => 'Palangka Raya',
                'created_at' => '2020-08-28 04:00:15',
                'updated_at' => '2020-08-28 04:00:15',
            ),
            200 => 
            array (
                'id' => 201,
                'province_id' => 14,
                'city_id' => 371,
                'type' => 'Kabupaten',
                'name' => 'Pulang Pisau',
                'created_at' => '2020-08-28 04:00:20',
                'updated_at' => '2020-08-28 04:00:20',
            ),
            201 => 
            array (
                'id' => 202,
                'province_id' => 14,
                'city_id' => 405,
                'type' => 'Kabupaten',
                'name' => 'Seruyan',
                'created_at' => '2020-08-28 04:00:28',
                'updated_at' => '2020-08-28 04:00:28',
            ),
            202 => 
            array (
                'id' => 203,
                'province_id' => 14,
                'city_id' => 432,
                'type' => 'Kabupaten',
                'name' => 'Sukamara',
                'created_at' => '2020-08-28 04:00:34',
                'updated_at' => '2020-08-28 04:00:34',
            ),
            203 => 
            array (
                'id' => 204,
                'province_id' => 15,
                'city_id' => 19,
                'type' => 'Kota',
                'name' => 'Balikpapan',
                'created_at' => '2020-08-28 04:00:37',
                'updated_at' => '2020-08-28 04:00:37',
            ),
            204 => 
            array (
                'id' => 205,
                'province_id' => 15,
                'city_id' => 66,
                'type' => 'Kabupaten',
                'name' => 'Berau',
                'created_at' => '2020-08-28 04:00:40',
                'updated_at' => '2020-08-28 04:00:40',
            ),
            205 => 
            array (
                'id' => 206,
                'province_id' => 15,
                'city_id' => 89,
                'type' => 'Kota',
                'name' => 'Bontang',
                'created_at' => '2020-08-28 04:00:44',
                'updated_at' => '2020-08-28 04:00:44',
            ),
            206 => 
            array (
                'id' => 207,
                'province_id' => 15,
                'city_id' => 214,
                'type' => 'Kabupaten',
                'name' => 'Kutai Barat',
                'created_at' => '2020-08-28 04:00:48',
                'updated_at' => '2020-08-28 04:00:48',
            ),
            207 => 
            array (
                'id' => 208,
                'province_id' => 15,
                'city_id' => 215,
                'type' => 'Kabupaten',
                'name' => 'Kutai Kartanegara',
                'created_at' => '2020-08-28 04:00:54',
                'updated_at' => '2020-08-28 04:00:54',
            ),
            208 => 
            array (
                'id' => 209,
                'province_id' => 15,
                'city_id' => 216,
                'type' => 'Kabupaten',
                'name' => 'Kutai Timur',
                'created_at' => '2020-08-28 04:00:57',
                'updated_at' => '2020-08-28 04:00:57',
            ),
            209 => 
            array (
                'id' => 210,
                'province_id' => 15,
                'city_id' => 341,
                'type' => 'Kabupaten',
                'name' => 'Paser',
                'created_at' => '2020-08-28 04:00:59',
                'updated_at' => '2020-08-28 04:00:59',
            ),
            210 => 
            array (
                'id' => 211,
                'province_id' => 15,
                'city_id' => 354,
                'type' => 'Kabupaten',
                'name' => 'Penajam Paser Utara',
                'created_at' => '2020-08-28 04:01:02',
                'updated_at' => '2020-08-28 04:01:02',
            ),
            211 => 
            array (
                'id' => 212,
                'province_id' => 15,
                'city_id' => 387,
                'type' => 'Kota',
                'name' => 'Samarinda',
                'created_at' => '2020-08-28 04:01:06',
                'updated_at' => '2020-08-28 04:01:06',
            ),
            212 => 
            array (
                'id' => 213,
                'province_id' => 16,
                'city_id' => 96,
                'type' => 'Kabupaten',
            'name' => 'Bulungan (Bulongan)',
                'created_at' => '2020-08-28 04:01:11',
                'updated_at' => '2020-08-28 04:01:11',
            ),
            213 => 
            array (
                'id' => 214,
                'province_id' => 16,
                'city_id' => 257,
                'type' => 'Kabupaten',
                'name' => 'Malinau',
                'created_at' => '2020-08-28 04:01:17',
                'updated_at' => '2020-08-28 04:01:17',
            ),
            214 => 
            array (
                'id' => 215,
                'province_id' => 16,
                'city_id' => 311,
                'type' => 'Kabupaten',
                'name' => 'Nunukan',
                'created_at' => '2020-08-28 04:01:20',
                'updated_at' => '2020-08-28 04:01:20',
            ),
            215 => 
            array (
                'id' => 216,
                'province_id' => 16,
                'city_id' => 450,
                'type' => 'Kabupaten',
                'name' => 'Tana Tidung',
                'created_at' => '2020-08-28 04:01:27',
                'updated_at' => '2020-08-28 04:01:27',
            ),
            216 => 
            array (
                'id' => 217,
                'province_id' => 16,
                'city_id' => 467,
                'type' => 'Kota',
                'name' => 'Tarakan',
                'created_at' => '2020-08-28 04:01:29',
                'updated_at' => '2020-08-28 04:01:29',
            ),
            217 => 
            array (
                'id' => 218,
                'province_id' => 17,
                'city_id' => 48,
                'type' => 'Kota',
                'name' => 'Batam',
                'created_at' => '2020-08-28 04:01:32',
                'updated_at' => '2020-08-28 04:01:32',
            ),
            218 => 
            array (
                'id' => 219,
                'province_id' => 17,
                'city_id' => 71,
                'type' => 'Kabupaten',
                'name' => 'Bintan',
                'created_at' => '2020-08-28 04:01:40',
                'updated_at' => '2020-08-28 04:01:40',
            ),
            219 => 
            array (
                'id' => 220,
                'province_id' => 17,
                'city_id' => 172,
                'type' => 'Kabupaten',
                'name' => 'Karimun',
                'created_at' => '2020-08-28 04:01:43',
                'updated_at' => '2020-08-28 04:01:43',
            ),
            220 => 
            array (
                'id' => 221,
                'province_id' => 17,
                'city_id' => 184,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Anambas',
                'created_at' => '2020-08-28 04:01:46',
                'updated_at' => '2020-08-28 04:01:46',
            ),
            221 => 
            array (
                'id' => 222,
                'province_id' => 17,
                'city_id' => 237,
                'type' => 'Kabupaten',
                'name' => 'Lingga',
                'created_at' => '2020-08-28 04:01:50',
                'updated_at' => '2020-08-28 04:01:50',
            ),
            222 => 
            array (
                'id' => 223,
                'province_id' => 17,
                'city_id' => 302,
                'type' => 'Kabupaten',
                'name' => 'Natuna',
                'created_at' => '2020-08-28 04:01:52',
                'updated_at' => '2020-08-28 04:01:52',
            ),
            223 => 
            array (
                'id' => 224,
                'province_id' => 17,
                'city_id' => 462,
                'type' => 'Kota',
                'name' => 'Tanjung Pinang',
                'created_at' => '2020-08-28 04:01:57',
                'updated_at' => '2020-08-28 04:01:57',
            ),
            224 => 
            array (
                'id' => 225,
                'province_id' => 18,
                'city_id' => 21,
                'type' => 'Kota',
                'name' => 'Bandar Lampung',
                'created_at' => '2020-08-28 04:02:02',
                'updated_at' => '2020-08-28 04:02:02',
            ),
            225 => 
            array (
                'id' => 226,
                'province_id' => 18,
                'city_id' => 223,
                'type' => 'Kabupaten',
                'name' => 'Lampung Barat',
                'created_at' => '2020-08-28 04:02:07',
                'updated_at' => '2020-08-28 04:02:07',
            ),
            226 => 
            array (
                'id' => 227,
                'province_id' => 18,
                'city_id' => 224,
                'type' => 'Kabupaten',
                'name' => 'Lampung Selatan',
                'created_at' => '2020-08-28 04:02:13',
                'updated_at' => '2020-08-28 04:02:13',
            ),
            227 => 
            array (
                'id' => 228,
                'province_id' => 18,
                'city_id' => 225,
                'type' => 'Kabupaten',
                'name' => 'Lampung Tengah',
                'created_at' => '2020-08-28 04:02:17',
                'updated_at' => '2020-08-28 04:02:17',
            ),
            228 => 
            array (
                'id' => 229,
                'province_id' => 18,
                'city_id' => 226,
                'type' => 'Kabupaten',
                'name' => 'Lampung Timur',
                'created_at' => '2020-08-28 04:02:23',
                'updated_at' => '2020-08-28 04:02:23',
            ),
            229 => 
            array (
                'id' => 230,
                'province_id' => 18,
                'city_id' => 227,
                'type' => 'Kabupaten',
                'name' => 'Lampung Utara',
                'created_at' => '2020-08-28 04:02:27',
                'updated_at' => '2020-08-28 04:02:27',
            ),
            230 => 
            array (
                'id' => 231,
                'province_id' => 18,
                'city_id' => 282,
                'type' => 'Kabupaten',
                'name' => 'Mesuji',
                'created_at' => '2020-08-28 04:02:33',
                'updated_at' => '2020-08-28 04:02:33',
            ),
            231 => 
            array (
                'id' => 232,
                'province_id' => 18,
                'city_id' => 283,
                'type' => 'Kota',
                'name' => 'Metro',
                'created_at' => '2020-08-28 04:02:37',
                'updated_at' => '2020-08-28 04:02:37',
            ),
            232 => 
            array (
                'id' => 233,
                'province_id' => 18,
                'city_id' => 355,
                'type' => 'Kabupaten',
                'name' => 'Pesawaran',
                'created_at' => '2020-08-28 04:02:40',
                'updated_at' => '2020-08-28 04:02:40',
            ),
            233 => 
            array (
                'id' => 234,
                'province_id' => 18,
                'city_id' => 356,
                'type' => 'Kabupaten',
                'name' => 'Pesisir Barat',
                'created_at' => '2020-08-28 04:02:45',
                'updated_at' => '2020-08-28 04:02:45',
            ),
            234 => 
            array (
                'id' => 235,
                'province_id' => 18,
                'city_id' => 368,
                'type' => 'Kabupaten',
                'name' => 'Pringsewu',
                'created_at' => '2020-08-28 04:02:50',
                'updated_at' => '2020-08-28 04:02:50',
            ),
            235 => 
            array (
                'id' => 236,
                'province_id' => 18,
                'city_id' => 458,
                'type' => 'Kabupaten',
                'name' => 'Tanggamus',
                'created_at' => '2020-08-28 04:02:52',
                'updated_at' => '2020-08-28 04:02:52',
            ),
            236 => 
            array (
                'id' => 237,
                'province_id' => 18,
                'city_id' => 490,
                'type' => 'Kabupaten',
                'name' => 'Tulang Bawang',
                'created_at' => '2020-08-28 04:02:56',
                'updated_at' => '2020-08-28 04:02:56',
            ),
            237 => 
            array (
                'id' => 238,
                'province_id' => 18,
                'city_id' => 491,
                'type' => 'Kabupaten',
                'name' => 'Tulang Bawang Barat',
                'created_at' => '2020-08-28 04:03:00',
                'updated_at' => '2020-08-28 04:03:00',
            ),
            238 => 
            array (
                'id' => 239,
                'province_id' => 18,
                'city_id' => 496,
                'type' => 'Kabupaten',
                'name' => 'Way Kanan',
                'created_at' => '2020-08-28 04:03:05',
                'updated_at' => '2020-08-28 04:03:05',
            ),
            239 => 
            array (
                'id' => 240,
                'province_id' => 19,
                'city_id' => 14,
                'type' => 'Kota',
                'name' => 'Ambon',
                'created_at' => '2020-08-28 04:03:09',
                'updated_at' => '2020-08-28 04:03:09',
            ),
            240 => 
            array (
                'id' => 241,
                'province_id' => 19,
                'city_id' => 99,
                'type' => 'Kabupaten',
                'name' => 'Buru',
                'created_at' => '2020-08-28 04:03:12',
                'updated_at' => '2020-08-28 04:03:12',
            ),
            241 => 
            array (
                'id' => 242,
                'province_id' => 19,
                'city_id' => 100,
                'type' => 'Kabupaten',
                'name' => 'Buru Selatan',
                'created_at' => '2020-08-28 04:03:18',
                'updated_at' => '2020-08-28 04:03:18',
            ),
            242 => 
            array (
                'id' => 243,
                'province_id' => 19,
                'city_id' => 185,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Aru',
                'created_at' => '2020-08-28 04:03:19',
                'updated_at' => '2020-08-28 04:03:19',
            ),
            243 => 
            array (
                'id' => 244,
                'province_id' => 19,
                'city_id' => 258,
                'type' => 'Kabupaten',
                'name' => 'Maluku Barat Daya',
                'created_at' => '2020-08-28 04:03:23',
                'updated_at' => '2020-08-28 04:03:23',
            ),
            244 => 
            array (
                'id' => 245,
                'province_id' => 19,
                'city_id' => 259,
                'type' => 'Kabupaten',
                'name' => 'Maluku Tengah',
                'created_at' => '2020-08-28 04:03:29',
                'updated_at' => '2020-08-28 04:03:29',
            ),
            245 => 
            array (
                'id' => 246,
                'province_id' => 19,
                'city_id' => 260,
                'type' => 'Kabupaten',
                'name' => 'Maluku Tenggara',
                'created_at' => '2020-08-28 04:03:35',
                'updated_at' => '2020-08-28 04:03:35',
            ),
            246 => 
            array (
                'id' => 247,
                'province_id' => 19,
                'city_id' => 261,
                'type' => 'Kabupaten',
                'name' => 'Maluku Tenggara Barat',
                'created_at' => '2020-08-28 04:03:40',
                'updated_at' => '2020-08-28 04:03:40',
            ),
            247 => 
            array (
                'id' => 248,
                'province_id' => 19,
                'city_id' => 400,
                'type' => 'Kabupaten',
                'name' => 'Seram Bagian Barat',
                'created_at' => '2020-08-28 04:03:46',
                'updated_at' => '2020-08-28 04:03:46',
            ),
            248 => 
            array (
                'id' => 249,
                'province_id' => 19,
                'city_id' => 401,
                'type' => 'Kabupaten',
                'name' => 'Seram Bagian Timur',
                'created_at' => '2020-08-28 04:03:50',
                'updated_at' => '2020-08-28 04:03:50',
            ),
            249 => 
            array (
                'id' => 250,
                'province_id' => 19,
                'city_id' => 488,
                'type' => 'Kota',
                'name' => 'Tual',
                'created_at' => '2020-08-28 04:03:55',
                'updated_at' => '2020-08-28 04:03:55',
            ),
            250 => 
            array (
                'id' => 251,
                'province_id' => 20,
                'city_id' => 138,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Barat',
                'created_at' => '2020-08-28 04:03:59',
                'updated_at' => '2020-08-28 04:03:59',
            ),
            251 => 
            array (
                'id' => 252,
                'province_id' => 20,
                'city_id' => 139,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Selatan',
                'created_at' => '2020-08-28 04:04:01',
                'updated_at' => '2020-08-28 04:04:01',
            ),
            252 => 
            array (
                'id' => 253,
                'province_id' => 20,
                'city_id' => 140,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Tengah',
                'created_at' => '2020-08-28 04:04:11',
                'updated_at' => '2020-08-28 04:04:11',
            ),
            253 => 
            array (
                'id' => 254,
                'province_id' => 20,
                'city_id' => 141,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Timur',
                'created_at' => '2020-08-28 04:04:14',
                'updated_at' => '2020-08-28 04:04:14',
            ),
            254 => 
            array (
                'id' => 255,
                'province_id' => 20,
                'city_id' => 142,
                'type' => 'Kabupaten',
                'name' => 'Halmahera Utara',
                'created_at' => '2020-08-28 04:04:23',
                'updated_at' => '2020-08-28 04:04:23',
            ),
            255 => 
            array (
                'id' => 256,
                'province_id' => 20,
                'city_id' => 191,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Sula',
                'created_at' => '2020-08-28 04:04:28',
                'updated_at' => '2020-08-28 04:04:28',
            ),
            256 => 
            array (
                'id' => 257,
                'province_id' => 20,
                'city_id' => 372,
                'type' => 'Kabupaten',
                'name' => 'Pulau Morotai',
                'created_at' => '2020-08-28 04:04:33',
                'updated_at' => '2020-08-28 04:04:33',
            ),
            257 => 
            array (
                'id' => 258,
                'province_id' => 20,
                'city_id' => 477,
                'type' => 'Kota',
                'name' => 'Ternate',
                'created_at' => '2020-08-28 04:04:36',
                'updated_at' => '2020-08-28 04:04:36',
            ),
            258 => 
            array (
                'id' => 259,
                'province_id' => 20,
                'city_id' => 478,
                'type' => 'Kota',
                'name' => 'Tidore Kepulauan',
                'created_at' => '2020-08-28 04:04:40',
                'updated_at' => '2020-08-28 04:04:40',
            ),
            259 => 
            array (
                'id' => 260,
                'province_id' => 21,
                'city_id' => 1,
                'type' => 'Kabupaten',
                'name' => 'Aceh Barat',
                'created_at' => '2020-08-28 04:04:44',
                'updated_at' => '2020-08-28 04:04:44',
            ),
            260 => 
            array (
                'id' => 261,
                'province_id' => 21,
                'city_id' => 2,
                'type' => 'Kabupaten',
                'name' => 'Aceh Barat Daya',
                'created_at' => '2020-08-28 04:04:51',
                'updated_at' => '2020-08-28 04:04:51',
            ),
            261 => 
            array (
                'id' => 262,
                'province_id' => 21,
                'city_id' => 3,
                'type' => 'Kabupaten',
                'name' => 'Aceh Besar',
                'created_at' => '2020-08-28 04:04:56',
                'updated_at' => '2020-08-28 04:04:56',
            ),
            262 => 
            array (
                'id' => 263,
                'province_id' => 21,
                'city_id' => 4,
                'type' => 'Kabupaten',
                'name' => 'Aceh Jaya',
                'created_at' => '2020-08-28 04:05:01',
                'updated_at' => '2020-08-28 04:05:01',
            ),
            263 => 
            array (
                'id' => 264,
                'province_id' => 21,
                'city_id' => 5,
                'type' => 'Kabupaten',
                'name' => 'Aceh Selatan',
                'created_at' => '2020-08-28 04:05:04',
                'updated_at' => '2020-08-28 04:05:04',
            ),
            264 => 
            array (
                'id' => 265,
                'province_id' => 21,
                'city_id' => 6,
                'type' => 'Kabupaten',
                'name' => 'Aceh Singkil',
                'created_at' => '2020-08-28 04:05:07',
                'updated_at' => '2020-08-28 04:05:07',
            ),
            265 => 
            array (
                'id' => 266,
                'province_id' => 21,
                'city_id' => 7,
                'type' => 'Kabupaten',
                'name' => 'Aceh Tamiang',
                'created_at' => '2020-08-28 04:05:17',
                'updated_at' => '2020-08-28 04:05:17',
            ),
            266 => 
            array (
                'id' => 267,
                'province_id' => 21,
                'city_id' => 8,
                'type' => 'Kabupaten',
                'name' => 'Aceh Tengah',
                'created_at' => '2020-08-28 04:05:23',
                'updated_at' => '2020-08-28 04:05:23',
            ),
            267 => 
            array (
                'id' => 268,
                'province_id' => 21,
                'city_id' => 9,
                'type' => 'Kabupaten',
                'name' => 'Aceh Tenggara',
                'created_at' => '2020-08-28 04:05:29',
                'updated_at' => '2020-08-28 04:05:29',
            ),
            268 => 
            array (
                'id' => 269,
                'province_id' => 21,
                'city_id' => 10,
                'type' => 'Kabupaten',
                'name' => 'Aceh Timur',
                'created_at' => '2020-08-28 04:05:33',
                'updated_at' => '2020-08-28 04:05:33',
            ),
            269 => 
            array (
                'id' => 270,
                'province_id' => 21,
                'city_id' => 11,
                'type' => 'Kabupaten',
                'name' => 'Aceh Utara',
                'created_at' => '2020-08-28 04:05:37',
                'updated_at' => '2020-08-28 04:05:37',
            ),
            270 => 
            array (
                'id' => 271,
                'province_id' => 21,
                'city_id' => 20,
                'type' => 'Kota',
                'name' => 'Banda Aceh',
                'created_at' => '2020-08-28 04:05:42',
                'updated_at' => '2020-08-28 04:05:42',
            ),
            271 => 
            array (
                'id' => 272,
                'province_id' => 21,
                'city_id' => 59,
                'type' => 'Kabupaten',
                'name' => 'Bener Meriah',
                'created_at' => '2020-08-28 04:05:45',
                'updated_at' => '2020-08-28 04:05:45',
            ),
            272 => 
            array (
                'id' => 273,
                'province_id' => 21,
                'city_id' => 72,
                'type' => 'Kabupaten',
                'name' => 'Bireuen',
                'created_at' => '2020-08-28 04:05:48',
                'updated_at' => '2020-08-28 04:05:48',
            ),
            273 => 
            array (
                'id' => 274,
                'province_id' => 21,
                'city_id' => 127,
                'type' => 'Kabupaten',
                'name' => 'Gayo Lues',
                'created_at' => '2020-08-28 04:05:53',
                'updated_at' => '2020-08-28 04:05:53',
            ),
            274 => 
            array (
                'id' => 275,
                'province_id' => 21,
                'city_id' => 230,
                'type' => 'Kota',
                'name' => 'Langsa',
                'created_at' => '2020-08-28 04:05:57',
                'updated_at' => '2020-08-28 04:05:57',
            ),
            275 => 
            array (
                'id' => 276,
                'province_id' => 21,
                'city_id' => 235,
                'type' => 'Kota',
                'name' => 'Lhokseumawe',
                'created_at' => '2020-08-28 04:06:00',
                'updated_at' => '2020-08-28 04:06:00',
            ),
            276 => 
            array (
                'id' => 277,
                'province_id' => 21,
                'city_id' => 300,
                'type' => 'Kabupaten',
                'name' => 'Nagan Raya',
                'created_at' => '2020-08-28 04:06:02',
                'updated_at' => '2020-08-28 04:06:02',
            ),
            277 => 
            array (
                'id' => 278,
                'province_id' => 21,
                'city_id' => 358,
                'type' => 'Kabupaten',
                'name' => 'Pidie',
                'created_at' => '2020-08-28 04:06:06',
                'updated_at' => '2020-08-28 04:06:06',
            ),
            278 => 
            array (
                'id' => 279,
                'province_id' => 21,
                'city_id' => 359,
                'type' => 'Kabupaten',
                'name' => 'Pidie Jaya',
                'created_at' => '2020-08-28 04:06:09',
                'updated_at' => '2020-08-28 04:06:09',
            ),
            279 => 
            array (
                'id' => 280,
                'province_id' => 21,
                'city_id' => 384,
                'type' => 'Kota',
                'name' => 'Sabang',
                'created_at' => '2020-08-28 04:06:12',
                'updated_at' => '2020-08-28 04:06:12',
            ),
            280 => 
            array (
                'id' => 281,
                'province_id' => 21,
                'city_id' => 414,
                'type' => 'Kabupaten',
                'name' => 'Simeulue',
                'created_at' => '2020-08-28 04:06:14',
                'updated_at' => '2020-08-28 04:06:14',
            ),
            281 => 
            array (
                'id' => 282,
                'province_id' => 21,
                'city_id' => 429,
                'type' => 'Kota',
                'name' => 'Subulussalam',
                'created_at' => '2020-08-28 04:06:17',
                'updated_at' => '2020-08-28 04:06:17',
            ),
            282 => 
            array (
                'id' => 283,
                'province_id' => 22,
                'city_id' => 68,
                'type' => 'Kabupaten',
                'name' => 'Bima',
                'created_at' => '2020-08-28 04:06:21',
                'updated_at' => '2020-08-28 04:06:21',
            ),
            283 => 
            array (
                'id' => 284,
                'province_id' => 22,
                'city_id' => 69,
                'type' => 'Kota',
                'name' => 'Bima',
                'created_at' => '2020-08-28 04:06:30',
                'updated_at' => '2020-08-28 04:06:30',
            ),
            284 => 
            array (
                'id' => 285,
                'province_id' => 22,
                'city_id' => 118,
                'type' => 'Kabupaten',
                'name' => 'Dompu',
                'created_at' => '2020-08-28 04:06:32',
                'updated_at' => '2020-08-28 04:06:32',
            ),
            285 => 
            array (
                'id' => 286,
                'province_id' => 22,
                'city_id' => 238,
                'type' => 'Kabupaten',
                'name' => 'Lombok Barat',
                'created_at' => '2020-08-28 04:06:35',
                'updated_at' => '2020-08-28 04:06:35',
            ),
            286 => 
            array (
                'id' => 287,
                'province_id' => 22,
                'city_id' => 239,
                'type' => 'Kabupaten',
                'name' => 'Lombok Tengah',
                'created_at' => '2020-08-28 04:06:37',
                'updated_at' => '2020-08-28 04:06:37',
            ),
            287 => 
            array (
                'id' => 288,
                'province_id' => 22,
                'city_id' => 240,
                'type' => 'Kabupaten',
                'name' => 'Lombok Timur',
                'created_at' => '2020-08-28 04:06:41',
                'updated_at' => '2020-08-28 04:06:41',
            ),
            288 => 
            array (
                'id' => 289,
                'province_id' => 22,
                'city_id' => 241,
                'type' => 'Kabupaten',
                'name' => 'Lombok Utara',
                'created_at' => '2020-08-28 04:06:45',
                'updated_at' => '2020-08-28 04:06:45',
            ),
            289 => 
            array (
                'id' => 290,
                'province_id' => 22,
                'city_id' => 276,
                'type' => 'Kota',
                'name' => 'Mataram',
                'created_at' => '2020-08-28 04:06:46',
                'updated_at' => '2020-08-28 04:06:46',
            ),
            290 => 
            array (
                'id' => 291,
                'province_id' => 22,
                'city_id' => 438,
                'type' => 'Kabupaten',
                'name' => 'Sumbawa',
                'created_at' => '2020-08-28 04:06:50',
                'updated_at' => '2020-08-28 04:06:50',
            ),
            291 => 
            array (
                'id' => 292,
                'province_id' => 22,
                'city_id' => 439,
                'type' => 'Kabupaten',
                'name' => 'Sumbawa Barat',
                'created_at' => '2020-08-28 04:06:55',
                'updated_at' => '2020-08-28 04:06:55',
            ),
            292 => 
            array (
                'id' => 293,
                'province_id' => 23,
                'city_id' => 13,
                'type' => 'Kabupaten',
                'name' => 'Alor',
                'created_at' => '2020-08-28 04:07:01',
                'updated_at' => '2020-08-28 04:07:01',
            ),
            293 => 
            array (
                'id' => 294,
                'province_id' => 23,
                'city_id' => 58,
                'type' => 'Kabupaten',
                'name' => 'Belu',
                'created_at' => '2020-08-28 04:07:08',
                'updated_at' => '2020-08-28 04:07:08',
            ),
            294 => 
            array (
                'id' => 295,
                'province_id' => 23,
                'city_id' => 122,
                'type' => 'Kabupaten',
                'name' => 'Ende',
                'created_at' => '2020-08-28 04:07:13',
                'updated_at' => '2020-08-28 04:07:13',
            ),
            295 => 
            array (
                'id' => 296,
                'province_id' => 23,
                'city_id' => 125,
                'type' => 'Kabupaten',
                'name' => 'Flores Timur',
                'created_at' => '2020-08-28 04:07:17',
                'updated_at' => '2020-08-28 04:07:17',
            ),
            296 => 
            array (
                'id' => 297,
                'province_id' => 23,
                'city_id' => 212,
                'type' => 'Kabupaten',
                'name' => 'Kupang',
                'created_at' => '2020-08-28 04:07:23',
                'updated_at' => '2020-08-28 04:07:23',
            ),
            297 => 
            array (
                'id' => 298,
                'province_id' => 23,
                'city_id' => 213,
                'type' => 'Kota',
                'name' => 'Kupang',
                'created_at' => '2020-08-28 04:07:29',
                'updated_at' => '2020-08-28 04:07:29',
            ),
            298 => 
            array (
                'id' => 299,
                'province_id' => 23,
                'city_id' => 234,
                'type' => 'Kabupaten',
                'name' => 'Lembata',
                'created_at' => '2020-08-28 04:07:34',
                'updated_at' => '2020-08-28 04:07:34',
            ),
            299 => 
            array (
                'id' => 300,
                'province_id' => 23,
                'city_id' => 269,
                'type' => 'Kabupaten',
                'name' => 'Manggarai',
                'created_at' => '2020-08-28 04:07:36',
                'updated_at' => '2020-08-28 04:07:36',
            ),
            300 => 
            array (
                'id' => 301,
                'province_id' => 23,
                'city_id' => 270,
                'type' => 'Kabupaten',
                'name' => 'Manggarai Barat',
                'created_at' => '2020-08-28 04:07:39',
                'updated_at' => '2020-08-28 04:07:39',
            ),
            301 => 
            array (
                'id' => 302,
                'province_id' => 23,
                'city_id' => 271,
                'type' => 'Kabupaten',
                'name' => 'Manggarai Timur',
                'created_at' => '2020-08-28 04:07:43',
                'updated_at' => '2020-08-28 04:07:43',
            ),
            302 => 
            array (
                'id' => 303,
                'province_id' => 23,
                'city_id' => 301,
                'type' => 'Kabupaten',
                'name' => 'Nagekeo',
                'created_at' => '2020-08-28 04:07:47',
                'updated_at' => '2020-08-28 04:07:47',
            ),
            303 => 
            array (
                'id' => 304,
                'province_id' => 23,
                'city_id' => 304,
                'type' => 'Kabupaten',
                'name' => 'Ngada',
                'created_at' => '2020-08-28 04:07:49',
                'updated_at' => '2020-08-28 04:07:49',
            ),
            304 => 
            array (
                'id' => 305,
                'province_id' => 23,
                'city_id' => 383,
                'type' => 'Kabupaten',
                'name' => 'Rote Ndao',
                'created_at' => '2020-08-28 04:07:52',
                'updated_at' => '2020-08-28 04:07:52',
            ),
            305 => 
            array (
                'id' => 306,
                'province_id' => 23,
                'city_id' => 385,
                'type' => 'Kabupaten',
                'name' => 'Sabu Raijua',
                'created_at' => '2020-08-28 04:07:54',
                'updated_at' => '2020-08-28 04:07:54',
            ),
            306 => 
            array (
                'id' => 307,
                'province_id' => 23,
                'city_id' => 412,
                'type' => 'Kabupaten',
                'name' => 'Sikka',
                'created_at' => '2020-08-28 04:07:55',
                'updated_at' => '2020-08-28 04:07:55',
            ),
            307 => 
            array (
                'id' => 308,
                'province_id' => 23,
                'city_id' => 434,
                'type' => 'Kabupaten',
                'name' => 'Sumba Barat',
                'created_at' => '2020-08-28 04:08:01',
                'updated_at' => '2020-08-28 04:08:01',
            ),
            308 => 
            array (
                'id' => 309,
                'province_id' => 23,
                'city_id' => 435,
                'type' => 'Kabupaten',
                'name' => 'Sumba Barat Daya',
                'created_at' => '2020-08-28 04:08:03',
                'updated_at' => '2020-08-28 04:08:03',
            ),
            309 => 
            array (
                'id' => 310,
                'province_id' => 23,
                'city_id' => 436,
                'type' => 'Kabupaten',
                'name' => 'Sumba Tengah',
                'created_at' => '2020-08-28 04:08:07',
                'updated_at' => '2020-08-28 04:08:07',
            ),
            310 => 
            array (
                'id' => 311,
                'province_id' => 23,
                'city_id' => 437,
                'type' => 'Kabupaten',
                'name' => 'Sumba Timur',
                'created_at' => '2020-08-28 04:08:09',
                'updated_at' => '2020-08-28 04:08:09',
            ),
            311 => 
            array (
                'id' => 312,
                'province_id' => 23,
                'city_id' => 479,
                'type' => 'Kabupaten',
                'name' => 'Timor Tengah Selatan',
                'created_at' => '2020-08-28 04:08:14',
                'updated_at' => '2020-08-28 04:08:14',
            ),
            312 => 
            array (
                'id' => 313,
                'province_id' => 23,
                'city_id' => 480,
                'type' => 'Kabupaten',
                'name' => 'Timor Tengah Utara',
                'created_at' => '2020-08-28 04:08:19',
                'updated_at' => '2020-08-28 04:08:19',
            ),
            313 => 
            array (
                'id' => 314,
                'province_id' => 24,
                'city_id' => 16,
                'type' => 'Kabupaten',
                'name' => 'Asmat',
                'created_at' => '2020-08-28 04:08:26',
                'updated_at' => '2020-08-28 04:08:26',
            ),
            314 => 
            array (
                'id' => 315,
                'province_id' => 24,
                'city_id' => 67,
                'type' => 'Kabupaten',
                'name' => 'Biak Numfor',
                'created_at' => '2020-08-28 04:08:32',
                'updated_at' => '2020-08-28 04:08:32',
            ),
            315 => 
            array (
                'id' => 316,
                'province_id' => 24,
                'city_id' => 90,
                'type' => 'Kabupaten',
                'name' => 'Boven Digoel',
                'created_at' => '2020-08-28 04:08:38',
                'updated_at' => '2020-08-28 04:08:38',
            ),
            316 => 
            array (
                'id' => 317,
                'province_id' => 24,
                'city_id' => 111,
                'type' => 'Kabupaten',
            'name' => 'Deiyai (Deliyai)',
                'created_at' => '2020-08-28 04:08:43',
                'updated_at' => '2020-08-28 04:08:43',
            ),
            317 => 
            array (
                'id' => 318,
                'province_id' => 24,
                'city_id' => 117,
                'type' => 'Kabupaten',
                'name' => 'Dogiyai',
                'created_at' => '2020-08-28 04:08:45',
                'updated_at' => '2020-08-28 04:08:45',
            ),
            318 => 
            array (
                'id' => 319,
                'province_id' => 24,
                'city_id' => 150,
                'type' => 'Kabupaten',
                'name' => 'Intan Jaya',
                'created_at' => '2020-08-28 04:08:49',
                'updated_at' => '2020-08-28 04:08:49',
            ),
            319 => 
            array (
                'id' => 320,
                'province_id' => 24,
                'city_id' => 157,
                'type' => 'Kabupaten',
                'name' => 'Jayapura',
                'created_at' => '2020-08-28 04:08:52',
                'updated_at' => '2020-08-28 04:08:52',
            ),
            320 => 
            array (
                'id' => 321,
                'province_id' => 24,
                'city_id' => 158,
                'type' => 'Kota',
                'name' => 'Jayapura',
                'created_at' => '2020-08-28 04:08:59',
                'updated_at' => '2020-08-28 04:08:59',
            ),
            321 => 
            array (
                'id' => 322,
                'province_id' => 24,
                'city_id' => 159,
                'type' => 'Kabupaten',
                'name' => 'Jayawijaya',
                'created_at' => '2020-08-28 04:09:02',
                'updated_at' => '2020-08-28 04:09:02',
            ),
            322 => 
            array (
                'id' => 323,
                'province_id' => 24,
                'city_id' => 180,
                'type' => 'Kabupaten',
                'name' => 'Keerom',
                'created_at' => '2020-08-28 04:09:08',
                'updated_at' => '2020-08-28 04:09:08',
            ),
            323 => 
            array (
                'id' => 324,
                'province_id' => 24,
                'city_id' => 193,
                'type' => 'Kabupaten',
            'name' => 'Kepulauan Yapen (Yapen Waropen)',
                'created_at' => '2020-08-28 04:09:13',
                'updated_at' => '2020-08-28 04:09:13',
            ),
            324 => 
            array (
                'id' => 325,
                'province_id' => 24,
                'city_id' => 231,
                'type' => 'Kabupaten',
                'name' => 'Lanny Jaya',
                'created_at' => '2020-08-28 04:09:17',
                'updated_at' => '2020-08-28 04:09:17',
            ),
            325 => 
            array (
                'id' => 326,
                'province_id' => 24,
                'city_id' => 263,
                'type' => 'Kabupaten',
                'name' => 'Mamberamo Raya',
                'created_at' => '2020-08-28 04:09:20',
                'updated_at' => '2020-08-28 04:09:20',
            ),
            326 => 
            array (
                'id' => 327,
                'province_id' => 24,
                'city_id' => 264,
                'type' => 'Kabupaten',
                'name' => 'Mamberamo Tengah',
                'created_at' => '2020-08-28 04:09:22',
                'updated_at' => '2020-08-28 04:09:22',
            ),
            327 => 
            array (
                'id' => 328,
                'province_id' => 24,
                'city_id' => 274,
                'type' => 'Kabupaten',
                'name' => 'Mappi',
                'created_at' => '2020-08-28 04:09:26',
                'updated_at' => '2020-08-28 04:09:26',
            ),
            328 => 
            array (
                'id' => 329,
                'province_id' => 24,
                'city_id' => 281,
                'type' => 'Kabupaten',
                'name' => 'Merauke',
                'created_at' => '2020-08-28 04:09:31',
                'updated_at' => '2020-08-28 04:09:31',
            ),
            329 => 
            array (
                'id' => 330,
                'province_id' => 24,
                'city_id' => 284,
                'type' => 'Kabupaten',
                'name' => 'Mimika',
                'created_at' => '2020-08-28 04:09:40',
                'updated_at' => '2020-08-28 04:09:40',
            ),
            330 => 
            array (
                'id' => 331,
                'province_id' => 24,
                'city_id' => 299,
                'type' => 'Kabupaten',
                'name' => 'Nabire',
                'created_at' => '2020-08-28 04:09:43',
                'updated_at' => '2020-08-28 04:09:43',
            ),
            331 => 
            array (
                'id' => 332,
                'province_id' => 24,
                'city_id' => 303,
                'type' => 'Kabupaten',
                'name' => 'Nduga',
                'created_at' => '2020-08-28 04:09:46',
                'updated_at' => '2020-08-28 04:09:46',
            ),
            332 => 
            array (
                'id' => 333,
                'province_id' => 24,
                'city_id' => 335,
                'type' => 'Kabupaten',
                'name' => 'Paniai',
                'created_at' => '2020-08-28 04:09:52',
                'updated_at' => '2020-08-28 04:09:52',
            ),
            333 => 
            array (
                'id' => 334,
                'province_id' => 24,
                'city_id' => 347,
                'type' => 'Kabupaten',
                'name' => 'Pegunungan Bintang',
                'created_at' => '2020-08-28 04:09:54',
                'updated_at' => '2020-08-28 04:09:54',
            ),
            334 => 
            array (
                'id' => 335,
                'province_id' => 24,
                'city_id' => 373,
                'type' => 'Kabupaten',
                'name' => 'Puncak',
                'created_at' => '2020-08-28 04:10:00',
                'updated_at' => '2020-08-28 04:10:00',
            ),
            335 => 
            array (
                'id' => 336,
                'province_id' => 24,
                'city_id' => 374,
                'type' => 'Kabupaten',
                'name' => 'Puncak Jaya',
                'created_at' => '2020-08-28 04:10:03',
                'updated_at' => '2020-08-28 04:10:03',
            ),
            336 => 
            array (
                'id' => 337,
                'province_id' => 24,
                'city_id' => 392,
                'type' => 'Kabupaten',
                'name' => 'Sarmi',
                'created_at' => '2020-08-28 04:10:07',
                'updated_at' => '2020-08-28 04:10:07',
            ),
            337 => 
            array (
                'id' => 338,
                'province_id' => 24,
                'city_id' => 443,
                'type' => 'Kabupaten',
                'name' => 'Supiori',
                'created_at' => '2020-08-28 04:10:11',
                'updated_at' => '2020-08-28 04:10:11',
            ),
            338 => 
            array (
                'id' => 339,
                'province_id' => 24,
                'city_id' => 484,
                'type' => 'Kabupaten',
                'name' => 'Tolikara',
                'created_at' => '2020-08-28 04:10:14',
                'updated_at' => '2020-08-28 04:10:14',
            ),
            339 => 
            array (
                'id' => 340,
                'province_id' => 24,
                'city_id' => 495,
                'type' => 'Kabupaten',
                'name' => 'Waropen',
                'created_at' => '2020-08-28 04:10:22',
                'updated_at' => '2020-08-28 04:10:22',
            ),
            340 => 
            array (
                'id' => 341,
                'province_id' => 24,
                'city_id' => 499,
                'type' => 'Kabupaten',
                'name' => 'Yahukimo',
                'created_at' => '2020-08-28 04:10:26',
                'updated_at' => '2020-08-28 04:10:26',
            ),
            341 => 
            array (
                'id' => 342,
                'province_id' => 24,
                'city_id' => 500,
                'type' => 'Kabupaten',
                'name' => 'Yalimo',
                'created_at' => '2020-08-28 04:10:36',
                'updated_at' => '2020-08-28 04:10:36',
            ),
            342 => 
            array (
                'id' => 343,
                'province_id' => 25,
                'city_id' => 124,
                'type' => 'Kabupaten',
                'name' => 'Fakfak',
                'created_at' => '2020-08-28 04:10:40',
                'updated_at' => '2020-08-28 04:10:40',
            ),
            343 => 
            array (
                'id' => 344,
                'province_id' => 25,
                'city_id' => 165,
                'type' => 'Kabupaten',
                'name' => 'Kaimana',
                'created_at' => '2020-08-28 04:10:43',
                'updated_at' => '2020-08-28 04:10:43',
            ),
            344 => 
            array (
                'id' => 345,
                'province_id' => 25,
                'city_id' => 272,
                'type' => 'Kabupaten',
                'name' => 'Manokwari',
                'created_at' => '2020-08-28 04:10:47',
                'updated_at' => '2020-08-28 04:10:47',
            ),
            345 => 
            array (
                'id' => 346,
                'province_id' => 25,
                'city_id' => 273,
                'type' => 'Kabupaten',
                'name' => 'Manokwari Selatan',
                'created_at' => '2020-08-28 04:10:50',
                'updated_at' => '2020-08-28 04:10:50',
            ),
            346 => 
            array (
                'id' => 347,
                'province_id' => 25,
                'city_id' => 277,
                'type' => 'Kabupaten',
                'name' => 'Maybrat',
                'created_at' => '2020-08-28 04:10:53',
                'updated_at' => '2020-08-28 04:10:53',
            ),
            347 => 
            array (
                'id' => 348,
                'province_id' => 25,
                'city_id' => 346,
                'type' => 'Kabupaten',
                'name' => 'Pegunungan Arfak',
                'created_at' => '2020-08-28 04:10:59',
                'updated_at' => '2020-08-28 04:10:59',
            ),
            348 => 
            array (
                'id' => 349,
                'province_id' => 25,
                'city_id' => 378,
                'type' => 'Kabupaten',
                'name' => 'Raja Ampat',
                'created_at' => '2020-08-28 04:11:02',
                'updated_at' => '2020-08-28 04:11:02',
            ),
            349 => 
            array (
                'id' => 350,
                'province_id' => 25,
                'city_id' => 424,
                'type' => 'Kabupaten',
                'name' => 'Sorong',
                'created_at' => '2020-08-28 04:11:09',
                'updated_at' => '2020-08-28 04:11:09',
            ),
            350 => 
            array (
                'id' => 351,
                'province_id' => 25,
                'city_id' => 425,
                'type' => 'Kota',
                'name' => 'Sorong',
                'created_at' => '2020-08-28 04:11:13',
                'updated_at' => '2020-08-28 04:11:13',
            ),
            351 => 
            array (
                'id' => 352,
                'province_id' => 25,
                'city_id' => 426,
                'type' => 'Kabupaten',
                'name' => 'Sorong Selatan',
                'created_at' => '2020-08-28 04:11:16',
                'updated_at' => '2020-08-28 04:11:16',
            ),
            352 => 
            array (
                'id' => 353,
                'province_id' => 25,
                'city_id' => 449,
                'type' => 'Kabupaten',
                'name' => 'Tambrauw',
                'created_at' => '2020-08-28 04:11:20',
                'updated_at' => '2020-08-28 04:11:20',
            ),
            353 => 
            array (
                'id' => 354,
                'province_id' => 25,
                'city_id' => 474,
                'type' => 'Kabupaten',
                'name' => 'Teluk Bintuni',
                'created_at' => '2020-08-28 04:11:24',
                'updated_at' => '2020-08-28 04:11:24',
            ),
            354 => 
            array (
                'id' => 355,
                'province_id' => 25,
                'city_id' => 475,
                'type' => 'Kabupaten',
                'name' => 'Teluk Wondama',
                'created_at' => '2020-08-28 04:11:27',
                'updated_at' => '2020-08-28 04:11:27',
            ),
            355 => 
            array (
                'id' => 356,
                'province_id' => 26,
                'city_id' => 60,
                'type' => 'Kabupaten',
                'name' => 'Bengkalis',
                'created_at' => '2020-08-28 04:11:31',
                'updated_at' => '2020-08-28 04:11:31',
            ),
            356 => 
            array (
                'id' => 357,
                'province_id' => 26,
                'city_id' => 120,
                'type' => 'Kota',
                'name' => 'Dumai',
                'created_at' => '2020-08-28 04:11:34',
                'updated_at' => '2020-08-28 04:11:34',
            ),
            357 => 
            array (
                'id' => 358,
                'province_id' => 26,
                'city_id' => 147,
                'type' => 'Kabupaten',
                'name' => 'Indragiri Hilir',
                'created_at' => '2020-08-28 04:11:39',
                'updated_at' => '2020-08-28 04:11:39',
            ),
            358 => 
            array (
                'id' => 359,
                'province_id' => 26,
                'city_id' => 148,
                'type' => 'Kabupaten',
                'name' => 'Indragiri Hulu',
                'created_at' => '2020-08-28 04:11:43',
                'updated_at' => '2020-08-28 04:11:43',
            ),
            359 => 
            array (
                'id' => 360,
                'province_id' => 26,
                'city_id' => 166,
                'type' => 'Kabupaten',
                'name' => 'Kampar',
                'created_at' => '2020-08-28 04:11:50',
                'updated_at' => '2020-08-28 04:11:50',
            ),
            360 => 
            array (
                'id' => 361,
                'province_id' => 26,
                'city_id' => 187,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Meranti',
                'created_at' => '2020-08-28 04:11:54',
                'updated_at' => '2020-08-28 04:11:54',
            ),
            361 => 
            array (
                'id' => 362,
                'province_id' => 26,
                'city_id' => 207,
                'type' => 'Kabupaten',
                'name' => 'Kuantan Singingi',
                'created_at' => '2020-08-28 04:11:57',
                'updated_at' => '2020-08-28 04:11:57',
            ),
            362 => 
            array (
                'id' => 363,
                'province_id' => 26,
                'city_id' => 350,
                'type' => 'Kota',
                'name' => 'Pekanbaru',
                'created_at' => '2020-08-28 04:12:02',
                'updated_at' => '2020-08-28 04:12:02',
            ),
            363 => 
            array (
                'id' => 364,
                'province_id' => 26,
                'city_id' => 351,
                'type' => 'Kabupaten',
                'name' => 'Pelalawan',
                'created_at' => '2020-08-28 04:12:06',
                'updated_at' => '2020-08-28 04:12:06',
            ),
            364 => 
            array (
                'id' => 365,
                'province_id' => 26,
                'city_id' => 381,
                'type' => 'Kabupaten',
                'name' => 'Rokan Hilir',
                'created_at' => '2020-08-28 04:12:11',
                'updated_at' => '2020-08-28 04:12:11',
            ),
            365 => 
            array (
                'id' => 366,
                'province_id' => 26,
                'city_id' => 382,
                'type' => 'Kabupaten',
                'name' => 'Rokan Hulu',
                'created_at' => '2020-08-28 04:12:15',
                'updated_at' => '2020-08-28 04:12:15',
            ),
            366 => 
            array (
                'id' => 367,
                'province_id' => 26,
                'city_id' => 406,
                'type' => 'Kabupaten',
                'name' => 'Siak',
                'created_at' => '2020-08-28 04:12:24',
                'updated_at' => '2020-08-28 04:12:24',
            ),
            367 => 
            array (
                'id' => 368,
                'province_id' => 27,
                'city_id' => 253,
                'type' => 'Kabupaten',
                'name' => 'Majene',
                'created_at' => '2020-08-28 04:12:29',
                'updated_at' => '2020-08-28 04:12:29',
            ),
            368 => 
            array (
                'id' => 369,
                'province_id' => 27,
                'city_id' => 262,
                'type' => 'Kabupaten',
                'name' => 'Mamasa',
                'created_at' => '2020-08-28 04:12:32',
                'updated_at' => '2020-08-28 04:12:32',
            ),
            369 => 
            array (
                'id' => 370,
                'province_id' => 27,
                'city_id' => 265,
                'type' => 'Kabupaten',
                'name' => 'Mamuju',
                'created_at' => '2020-08-28 04:12:36',
                'updated_at' => '2020-08-28 04:12:36',
            ),
            370 => 
            array (
                'id' => 371,
                'province_id' => 27,
                'city_id' => 266,
                'type' => 'Kabupaten',
                'name' => 'Mamuju Utara',
                'created_at' => '2020-08-28 04:12:41',
                'updated_at' => '2020-08-28 04:12:41',
            ),
            371 => 
            array (
                'id' => 372,
                'province_id' => 27,
                'city_id' => 362,
                'type' => 'Kabupaten',
                'name' => 'Polewali Mandar',
                'created_at' => '2020-08-28 04:12:47',
                'updated_at' => '2020-08-28 04:12:47',
            ),
            372 => 
            array (
                'id' => 373,
                'province_id' => 28,
                'city_id' => 38,
                'type' => 'Kabupaten',
                'name' => 'Bantaeng',
                'created_at' => '2020-08-28 04:12:53',
                'updated_at' => '2020-08-28 04:12:53',
            ),
            373 => 
            array (
                'id' => 374,
                'province_id' => 28,
                'city_id' => 47,
                'type' => 'Kabupaten',
                'name' => 'Barru',
                'created_at' => '2020-08-28 04:12:55',
                'updated_at' => '2020-08-28 04:12:55',
            ),
            374 => 
            array (
                'id' => 375,
                'province_id' => 28,
                'city_id' => 87,
                'type' => 'Kabupaten',
                'name' => 'Bone',
                'created_at' => '2020-08-28 04:12:57',
                'updated_at' => '2020-08-28 04:12:57',
            ),
            375 => 
            array (
                'id' => 376,
                'province_id' => 28,
                'city_id' => 95,
                'type' => 'Kabupaten',
                'name' => 'Bulukumba',
                'created_at' => '2020-08-28 04:13:00',
                'updated_at' => '2020-08-28 04:13:00',
            ),
            376 => 
            array (
                'id' => 377,
                'province_id' => 28,
                'city_id' => 123,
                'type' => 'Kabupaten',
                'name' => 'Enrekang',
                'created_at' => '2020-08-28 04:13:04',
                'updated_at' => '2020-08-28 04:13:04',
            ),
            377 => 
            array (
                'id' => 378,
                'province_id' => 28,
                'city_id' => 132,
                'type' => 'Kabupaten',
                'name' => 'Gowa',
                'created_at' => '2020-08-28 04:13:08',
                'updated_at' => '2020-08-28 04:13:08',
            ),
            378 => 
            array (
                'id' => 379,
                'province_id' => 28,
                'city_id' => 162,
                'type' => 'Kabupaten',
                'name' => 'Jeneponto',
                'created_at' => '2020-08-28 04:13:14',
                'updated_at' => '2020-08-28 04:13:14',
            ),
            379 => 
            array (
                'id' => 380,
                'province_id' => 28,
                'city_id' => 244,
                'type' => 'Kabupaten',
                'name' => 'Luwu',
                'created_at' => '2020-08-28 04:13:19',
                'updated_at' => '2020-08-28 04:13:19',
            ),
            380 => 
            array (
                'id' => 381,
                'province_id' => 28,
                'city_id' => 245,
                'type' => 'Kabupaten',
                'name' => 'Luwu Timur',
                'created_at' => '2020-08-28 04:13:23',
                'updated_at' => '2020-08-28 04:13:23',
            ),
            381 => 
            array (
                'id' => 382,
                'province_id' => 28,
                'city_id' => 246,
                'type' => 'Kabupaten',
                'name' => 'Luwu Utara',
                'created_at' => '2020-08-28 04:13:26',
                'updated_at' => '2020-08-28 04:13:26',
            ),
            382 => 
            array (
                'id' => 383,
                'province_id' => 28,
                'city_id' => 254,
                'type' => 'Kota',
                'name' => 'Makassar',
                'created_at' => '2020-08-28 04:13:30',
                'updated_at' => '2020-08-28 04:13:30',
            ),
            383 => 
            array (
                'id' => 384,
                'province_id' => 28,
                'city_id' => 275,
                'type' => 'Kabupaten',
                'name' => 'Maros',
                'created_at' => '2020-08-28 04:13:35',
                'updated_at' => '2020-08-28 04:13:35',
            ),
            384 => 
            array (
                'id' => 385,
                'province_id' => 28,
                'city_id' => 328,
                'type' => 'Kota',
                'name' => 'Palopo',
                'created_at' => '2020-08-28 04:13:37',
                'updated_at' => '2020-08-28 04:13:37',
            ),
            385 => 
            array (
                'id' => 386,
                'province_id' => 28,
                'city_id' => 333,
                'type' => 'Kabupaten',
                'name' => 'Pangkajene Kepulauan',
                'created_at' => '2020-08-28 04:13:39',
                'updated_at' => '2020-08-28 04:13:39',
            ),
            386 => 
            array (
                'id' => 387,
                'province_id' => 28,
                'city_id' => 336,
                'type' => 'Kota',
                'name' => 'Parepare',
                'created_at' => '2020-08-28 04:13:43',
                'updated_at' => '2020-08-28 04:13:43',
            ),
            387 => 
            array (
                'id' => 388,
                'province_id' => 28,
                'city_id' => 360,
                'type' => 'Kabupaten',
                'name' => 'Pinrang',
                'created_at' => '2020-08-28 04:13:44',
                'updated_at' => '2020-08-28 04:13:44',
            ),
            388 => 
            array (
                'id' => 389,
                'province_id' => 28,
                'city_id' => 396,
                'type' => 'Kabupaten',
            'name' => 'Selayar (Kepulauan Selayar)',
                'created_at' => '2020-08-28 04:13:47',
                'updated_at' => '2020-08-28 04:13:47',
            ),
            389 => 
            array (
                'id' => 390,
                'province_id' => 28,
                'city_id' => 408,
                'type' => 'Kabupaten',
                'name' => 'Sidenreng Rappang/Rapang',
                'created_at' => '2020-08-28 04:13:51',
                'updated_at' => '2020-08-28 04:13:51',
            ),
            390 => 
            array (
                'id' => 391,
                'province_id' => 28,
                'city_id' => 416,
                'type' => 'Kabupaten',
                'name' => 'Sinjai',
                'created_at' => '2020-08-28 04:13:53',
                'updated_at' => '2020-08-28 04:13:53',
            ),
            391 => 
            array (
                'id' => 392,
                'province_id' => 28,
                'city_id' => 423,
                'type' => 'Kabupaten',
                'name' => 'Soppeng',
                'created_at' => '2020-08-28 04:13:57',
                'updated_at' => '2020-08-28 04:13:57',
            ),
            392 => 
            array (
                'id' => 393,
                'province_id' => 28,
                'city_id' => 448,
                'type' => 'Kabupaten',
                'name' => 'Takalar',
                'created_at' => '2020-08-28 04:14:02',
                'updated_at' => '2020-08-28 04:14:02',
            ),
            393 => 
            array (
                'id' => 394,
                'province_id' => 28,
                'city_id' => 451,
                'type' => 'Kabupaten',
                'name' => 'Tana Toraja',
                'created_at' => '2020-08-28 04:14:05',
                'updated_at' => '2020-08-28 04:14:05',
            ),
            394 => 
            array (
                'id' => 395,
                'province_id' => 28,
                'city_id' => 486,
                'type' => 'Kabupaten',
                'name' => 'Toraja Utara',
                'created_at' => '2020-08-28 04:14:10',
                'updated_at' => '2020-08-28 04:14:10',
            ),
            395 => 
            array (
                'id' => 396,
                'province_id' => 28,
                'city_id' => 493,
                'type' => 'Kabupaten',
                'name' => 'Wajo',
                'created_at' => '2020-08-28 04:14:16',
                'updated_at' => '2020-08-28 04:14:16',
            ),
            396 => 
            array (
                'id' => 397,
                'province_id' => 29,
                'city_id' => 25,
                'type' => 'Kabupaten',
                'name' => 'Banggai',
                'created_at' => '2020-08-28 04:14:22',
                'updated_at' => '2020-08-28 04:14:22',
            ),
            397 => 
            array (
                'id' => 398,
                'province_id' => 29,
                'city_id' => 26,
                'type' => 'Kabupaten',
                'name' => 'Banggai Kepulauan',
                'created_at' => '2020-08-28 04:14:28',
                'updated_at' => '2020-08-28 04:14:28',
            ),
            398 => 
            array (
                'id' => 399,
                'province_id' => 29,
                'city_id' => 98,
                'type' => 'Kabupaten',
                'name' => 'Buol',
                'created_at' => '2020-08-28 04:14:33',
                'updated_at' => '2020-08-28 04:14:33',
            ),
            399 => 
            array (
                'id' => 400,
                'province_id' => 29,
                'city_id' => 119,
                'type' => 'Kabupaten',
                'name' => 'Donggala',
                'created_at' => '2020-08-28 04:14:36',
                'updated_at' => '2020-08-28 04:14:36',
            ),
            400 => 
            array (
                'id' => 401,
                'province_id' => 29,
                'city_id' => 291,
                'type' => 'Kabupaten',
                'name' => 'Morowali',
                'created_at' => '2020-08-28 04:14:41',
                'updated_at' => '2020-08-28 04:14:41',
            ),
            401 => 
            array (
                'id' => 402,
                'province_id' => 29,
                'city_id' => 329,
                'type' => 'Kota',
                'name' => 'Palu',
                'created_at' => '2020-08-28 04:14:46',
                'updated_at' => '2020-08-28 04:14:46',
            ),
            402 => 
            array (
                'id' => 403,
                'province_id' => 29,
                'city_id' => 338,
                'type' => 'Kabupaten',
                'name' => 'Parigi Moutong',
                'created_at' => '2020-08-28 04:14:48',
                'updated_at' => '2020-08-28 04:14:48',
            ),
            403 => 
            array (
                'id' => 404,
                'province_id' => 29,
                'city_id' => 366,
                'type' => 'Kabupaten',
                'name' => 'Poso',
                'created_at' => '2020-08-28 04:14:53',
                'updated_at' => '2020-08-28 04:14:53',
            ),
            404 => 
            array (
                'id' => 405,
                'province_id' => 29,
                'city_id' => 410,
                'type' => 'Kabupaten',
                'name' => 'Sigi',
                'created_at' => '2020-08-28 04:14:59',
                'updated_at' => '2020-08-28 04:14:59',
            ),
            405 => 
            array (
                'id' => 406,
                'province_id' => 29,
                'city_id' => 482,
                'type' => 'Kabupaten',
                'name' => 'Tojo Una-Una',
                'created_at' => '2020-08-28 04:15:02',
                'updated_at' => '2020-08-28 04:15:02',
            ),
            406 => 
            array (
                'id' => 407,
                'province_id' => 29,
                'city_id' => 483,
                'type' => 'Kabupaten',
                'name' => 'Toli-Toli',
                'created_at' => '2020-08-28 04:15:07',
                'updated_at' => '2020-08-28 04:15:07',
            ),
            407 => 
            array (
                'id' => 408,
                'province_id' => 30,
                'city_id' => 53,
                'type' => 'Kota',
                'name' => 'Bau-Bau',
                'created_at' => '2020-08-28 04:15:13',
                'updated_at' => '2020-08-28 04:15:13',
            ),
            408 => 
            array (
                'id' => 409,
                'province_id' => 30,
                'city_id' => 85,
                'type' => 'Kabupaten',
                'name' => 'Bombana',
                'created_at' => '2020-08-28 04:15:19',
                'updated_at' => '2020-08-28 04:15:19',
            ),
            409 => 
            array (
                'id' => 410,
                'province_id' => 30,
                'city_id' => 101,
                'type' => 'Kabupaten',
                'name' => 'Buton',
                'created_at' => '2020-08-28 04:15:24',
                'updated_at' => '2020-08-28 04:15:24',
            ),
            410 => 
            array (
                'id' => 411,
                'province_id' => 30,
                'city_id' => 102,
                'type' => 'Kabupaten',
                'name' => 'Buton Utara',
                'created_at' => '2020-08-28 04:15:28',
                'updated_at' => '2020-08-28 04:15:28',
            ),
            411 => 
            array (
                'id' => 412,
                'province_id' => 30,
                'city_id' => 182,
                'type' => 'Kota',
                'name' => 'Kendari',
                'created_at' => '2020-08-28 04:15:30',
                'updated_at' => '2020-08-28 04:15:30',
            ),
            412 => 
            array (
                'id' => 413,
                'province_id' => 30,
                'city_id' => 198,
                'type' => 'Kabupaten',
                'name' => 'Kolaka',
                'created_at' => '2020-08-28 04:15:32',
                'updated_at' => '2020-08-28 04:15:32',
            ),
            413 => 
            array (
                'id' => 414,
                'province_id' => 30,
                'city_id' => 199,
                'type' => 'Kabupaten',
                'name' => 'Kolaka Utara',
                'created_at' => '2020-08-28 04:15:40',
                'updated_at' => '2020-08-28 04:15:40',
            ),
            414 => 
            array (
                'id' => 415,
                'province_id' => 30,
                'city_id' => 200,
                'type' => 'Kabupaten',
                'name' => 'Konawe',
                'created_at' => '2020-08-28 04:15:44',
                'updated_at' => '2020-08-28 04:15:44',
            ),
            415 => 
            array (
                'id' => 416,
                'province_id' => 30,
                'city_id' => 201,
                'type' => 'Kabupaten',
                'name' => 'Konawe Selatan',
                'created_at' => '2020-08-28 04:15:51',
                'updated_at' => '2020-08-28 04:15:51',
            ),
            416 => 
            array (
                'id' => 417,
                'province_id' => 30,
                'city_id' => 202,
                'type' => 'Kabupaten',
                'name' => 'Konawe Utara',
                'created_at' => '2020-08-28 04:15:55',
                'updated_at' => '2020-08-28 04:15:55',
            ),
            417 => 
            array (
                'id' => 418,
                'province_id' => 30,
                'city_id' => 295,
                'type' => 'Kabupaten',
                'name' => 'Muna',
                'created_at' => '2020-08-28 04:16:00',
                'updated_at' => '2020-08-28 04:16:00',
            ),
            418 => 
            array (
                'id' => 419,
                'province_id' => 30,
                'city_id' => 494,
                'type' => 'Kabupaten',
                'name' => 'Wakatobi',
                'created_at' => '2020-08-28 04:16:06',
                'updated_at' => '2020-08-28 04:16:06',
            ),
            419 => 
            array (
                'id' => 420,
                'province_id' => 31,
                'city_id' => 73,
                'type' => 'Kota',
                'name' => 'Bitung',
                'created_at' => '2020-08-28 04:16:12',
                'updated_at' => '2020-08-28 04:16:12',
            ),
            420 => 
            array (
                'id' => 421,
                'province_id' => 31,
                'city_id' => 81,
                'type' => 'Kabupaten',
            'name' => 'Bolaang Mongondow (Bolmong)',
                'created_at' => '2020-08-28 04:16:14',
                'updated_at' => '2020-08-28 04:16:14',
            ),
            421 => 
            array (
                'id' => 422,
                'province_id' => 31,
                'city_id' => 82,
                'type' => 'Kabupaten',
                'name' => 'Bolaang Mongondow Selatan',
                'created_at' => '2020-08-28 04:16:17',
                'updated_at' => '2020-08-28 04:16:17',
            ),
            422 => 
            array (
                'id' => 423,
                'province_id' => 31,
                'city_id' => 83,
                'type' => 'Kabupaten',
                'name' => 'Bolaang Mongondow Timur',
                'created_at' => '2020-08-28 04:16:19',
                'updated_at' => '2020-08-28 04:16:19',
            ),
            423 => 
            array (
                'id' => 424,
                'province_id' => 31,
                'city_id' => 84,
                'type' => 'Kabupaten',
                'name' => 'Bolaang Mongondow Utara',
                'created_at' => '2020-08-28 04:16:23',
                'updated_at' => '2020-08-28 04:16:23',
            ),
            424 => 
            array (
                'id' => 425,
                'province_id' => 31,
                'city_id' => 188,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Sangihe',
                'created_at' => '2020-08-28 04:16:26',
                'updated_at' => '2020-08-28 04:16:26',
            ),
            425 => 
            array (
                'id' => 426,
                'province_id' => 31,
                'city_id' => 190,
                'type' => 'Kabupaten',
            'name' => 'Kepulauan Siau Tagulandang Biaro (Sitaro)',
                'created_at' => '2020-08-28 04:16:30',
                'updated_at' => '2020-08-28 04:16:30',
            ),
            426 => 
            array (
                'id' => 427,
                'province_id' => 31,
                'city_id' => 192,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Talaud',
                'created_at' => '2020-08-28 04:16:33',
                'updated_at' => '2020-08-28 04:16:33',
            ),
            427 => 
            array (
                'id' => 428,
                'province_id' => 31,
                'city_id' => 204,
                'type' => 'Kota',
                'name' => 'Kotamobagu',
                'created_at' => '2020-08-28 04:16:37',
                'updated_at' => '2020-08-28 04:16:37',
            ),
            428 => 
            array (
                'id' => 429,
                'province_id' => 31,
                'city_id' => 267,
                'type' => 'Kota',
                'name' => 'Manado',
                'created_at' => '2020-08-28 04:16:39',
                'updated_at' => '2020-08-28 04:16:39',
            ),
            429 => 
            array (
                'id' => 430,
                'province_id' => 31,
                'city_id' => 285,
                'type' => 'Kabupaten',
                'name' => 'Minahasa',
                'created_at' => '2020-08-28 04:16:43',
                'updated_at' => '2020-08-28 04:16:43',
            ),
            430 => 
            array (
                'id' => 431,
                'province_id' => 31,
                'city_id' => 286,
                'type' => 'Kabupaten',
                'name' => 'Minahasa Selatan',
                'created_at' => '2020-08-28 04:16:51',
                'updated_at' => '2020-08-28 04:16:51',
            ),
            431 => 
            array (
                'id' => 432,
                'province_id' => 31,
                'city_id' => 287,
                'type' => 'Kabupaten',
                'name' => 'Minahasa Tenggara',
                'created_at' => '2020-08-28 04:16:57',
                'updated_at' => '2020-08-28 04:16:57',
            ),
            432 => 
            array (
                'id' => 433,
                'province_id' => 31,
                'city_id' => 288,
                'type' => 'Kabupaten',
                'name' => 'Minahasa Utara',
                'created_at' => '2020-08-28 04:17:00',
                'updated_at' => '2020-08-28 04:17:00',
            ),
            433 => 
            array (
                'id' => 434,
                'province_id' => 31,
                'city_id' => 485,
                'type' => 'Kota',
                'name' => 'Tomohon',
                'created_at' => '2020-08-28 04:17:03',
                'updated_at' => '2020-08-28 04:17:03',
            ),
            434 => 
            array (
                'id' => 435,
                'province_id' => 32,
                'city_id' => 12,
                'type' => 'Kabupaten',
                'name' => 'Agam',
                'created_at' => '2020-08-28 04:17:06',
                'updated_at' => '2020-08-28 04:17:06',
            ),
            435 => 
            array (
                'id' => 436,
                'province_id' => 32,
                'city_id' => 93,
                'type' => 'Kota',
                'name' => 'Bukittinggi',
                'created_at' => '2020-08-28 04:17:10',
                'updated_at' => '2020-08-28 04:17:10',
            ),
            436 => 
            array (
                'id' => 437,
                'province_id' => 32,
                'city_id' => 116,
                'type' => 'Kabupaten',
                'name' => 'Dharmasraya',
                'created_at' => '2020-08-28 04:17:13',
                'updated_at' => '2020-08-28 04:17:13',
            ),
            437 => 
            array (
                'id' => 438,
                'province_id' => 32,
                'city_id' => 186,
                'type' => 'Kabupaten',
                'name' => 'Kepulauan Mentawai',
                'created_at' => '2020-08-28 04:17:15',
                'updated_at' => '2020-08-28 04:17:15',
            ),
            438 => 
            array (
                'id' => 439,
                'province_id' => 32,
                'city_id' => 236,
                'type' => 'Kabupaten',
                'name' => 'Lima Puluh Koto/Kota',
                'created_at' => '2020-08-28 04:17:17',
                'updated_at' => '2020-08-28 04:17:17',
            ),
            439 => 
            array (
                'id' => 440,
                'province_id' => 32,
                'city_id' => 318,
                'type' => 'Kota',
                'name' => 'Padang',
                'created_at' => '2020-08-28 04:17:20',
                'updated_at' => '2020-08-28 04:17:20',
            ),
            440 => 
            array (
                'id' => 441,
                'province_id' => 32,
                'city_id' => 321,
                'type' => 'Kota',
                'name' => 'Padang Panjang',
                'created_at' => '2020-08-28 04:17:25',
                'updated_at' => '2020-08-28 04:17:25',
            ),
            441 => 
            array (
                'id' => 442,
                'province_id' => 32,
                'city_id' => 322,
                'type' => 'Kabupaten',
                'name' => 'Padang Pariaman',
                'created_at' => '2020-08-28 04:17:27',
                'updated_at' => '2020-08-28 04:17:27',
            ),
            442 => 
            array (
                'id' => 443,
                'province_id' => 32,
                'city_id' => 337,
                'type' => 'Kota',
                'name' => 'Pariaman',
                'created_at' => '2020-08-28 04:17:31',
                'updated_at' => '2020-08-28 04:17:31',
            ),
            443 => 
            array (
                'id' => 444,
                'province_id' => 32,
                'city_id' => 339,
                'type' => 'Kabupaten',
                'name' => 'Pasaman',
                'created_at' => '2020-08-28 04:17:33',
                'updated_at' => '2020-08-28 04:17:33',
            ),
            444 => 
            array (
                'id' => 445,
                'province_id' => 32,
                'city_id' => 340,
                'type' => 'Kabupaten',
                'name' => 'Pasaman Barat',
                'created_at' => '2020-08-28 04:17:40',
                'updated_at' => '2020-08-28 04:17:40',
            ),
            445 => 
            array (
                'id' => 446,
                'province_id' => 32,
                'city_id' => 345,
                'type' => 'Kota',
                'name' => 'Payakumbuh',
                'created_at' => '2020-08-28 04:17:43',
                'updated_at' => '2020-08-28 04:17:43',
            ),
            446 => 
            array (
                'id' => 447,
                'province_id' => 32,
                'city_id' => 357,
                'type' => 'Kabupaten',
                'name' => 'Pesisir Selatan',
                'created_at' => '2020-08-28 04:17:46',
                'updated_at' => '2020-08-28 04:17:46',
            ),
            447 => 
            array (
                'id' => 448,
                'province_id' => 32,
                'city_id' => 394,
                'type' => 'Kota',
                'name' => 'Sawah Lunto',
                'created_at' => '2020-08-28 04:17:51',
                'updated_at' => '2020-08-28 04:17:51',
            ),
            448 => 
            array (
                'id' => 449,
                'province_id' => 32,
                'city_id' => 411,
                'type' => 'Kabupaten',
            'name' => 'Sijunjung (Sawah Lunto Sijunjung)',
                'created_at' => '2020-08-28 04:17:53',
                'updated_at' => '2020-08-28 04:17:53',
            ),
            449 => 
            array (
                'id' => 450,
                'province_id' => 32,
                'city_id' => 420,
                'type' => 'Kabupaten',
                'name' => 'Solok',
                'created_at' => '2020-08-28 04:17:57',
                'updated_at' => '2020-08-28 04:17:57',
            ),
            450 => 
            array (
                'id' => 451,
                'province_id' => 32,
                'city_id' => 421,
                'type' => 'Kota',
                'name' => 'Solok',
                'created_at' => '2020-08-28 04:18:02',
                'updated_at' => '2020-08-28 04:18:02',
            ),
            451 => 
            array (
                'id' => 452,
                'province_id' => 32,
                'city_id' => 422,
                'type' => 'Kabupaten',
                'name' => 'Solok Selatan',
                'created_at' => '2020-08-28 04:18:04',
                'updated_at' => '2020-08-28 04:18:04',
            ),
            452 => 
            array (
                'id' => 453,
                'province_id' => 32,
                'city_id' => 453,
                'type' => 'Kabupaten',
                'name' => 'Tanah Datar',
                'created_at' => '2020-08-28 04:18:07',
                'updated_at' => '2020-08-28 04:18:07',
            ),
            453 => 
            array (
                'id' => 454,
                'province_id' => 33,
                'city_id' => 40,
                'type' => 'Kabupaten',
                'name' => 'Banyuasin',
                'created_at' => '2020-08-28 04:18:11',
                'updated_at' => '2020-08-28 04:18:11',
            ),
            454 => 
            array (
                'id' => 455,
                'province_id' => 33,
                'city_id' => 121,
                'type' => 'Kabupaten',
                'name' => 'Empat Lawang',
                'created_at' => '2020-08-28 04:18:15',
                'updated_at' => '2020-08-28 04:18:15',
            ),
            455 => 
            array (
                'id' => 456,
                'province_id' => 33,
                'city_id' => 220,
                'type' => 'Kabupaten',
                'name' => 'Lahat',
                'created_at' => '2020-08-28 04:18:18',
                'updated_at' => '2020-08-28 04:18:18',
            ),
            456 => 
            array (
                'id' => 457,
                'province_id' => 33,
                'city_id' => 242,
                'type' => 'Kota',
                'name' => 'Lubuk Linggau',
                'created_at' => '2020-08-28 04:18:25',
                'updated_at' => '2020-08-28 04:18:25',
            ),
            457 => 
            array (
                'id' => 458,
                'province_id' => 33,
                'city_id' => 292,
                'type' => 'Kabupaten',
                'name' => 'Muara Enim',
                'created_at' => '2020-08-28 04:18:29',
                'updated_at' => '2020-08-28 04:18:29',
            ),
            458 => 
            array (
                'id' => 459,
                'province_id' => 33,
                'city_id' => 297,
                'type' => 'Kabupaten',
                'name' => 'Musi Banyuasin',
                'created_at' => '2020-08-28 04:18:34',
                'updated_at' => '2020-08-28 04:18:34',
            ),
            459 => 
            array (
                'id' => 460,
                'province_id' => 33,
                'city_id' => 298,
                'type' => 'Kabupaten',
                'name' => 'Musi Rawas',
                'created_at' => '2020-08-28 04:18:39',
                'updated_at' => '2020-08-28 04:18:39',
            ),
            460 => 
            array (
                'id' => 461,
                'province_id' => 33,
                'city_id' => 312,
                'type' => 'Kabupaten',
                'name' => 'Ogan Ilir',
                'created_at' => '2020-08-28 04:18:42',
                'updated_at' => '2020-08-28 04:18:42',
            ),
            461 => 
            array (
                'id' => 462,
                'province_id' => 33,
                'city_id' => 313,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ilir',
                'created_at' => '2020-08-28 04:18:45',
                'updated_at' => '2020-08-28 04:18:45',
            ),
            462 => 
            array (
                'id' => 463,
                'province_id' => 33,
                'city_id' => 314,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ulu',
                'created_at' => '2020-08-28 04:18:48',
                'updated_at' => '2020-08-28 04:18:48',
            ),
            463 => 
            array (
                'id' => 464,
                'province_id' => 33,
                'city_id' => 315,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ulu Selatan',
                'created_at' => '2020-08-28 04:18:51',
                'updated_at' => '2020-08-28 04:18:51',
            ),
            464 => 
            array (
                'id' => 465,
                'province_id' => 33,
                'city_id' => 316,
                'type' => 'Kabupaten',
                'name' => 'Ogan Komering Ulu Timur',
                'created_at' => '2020-08-28 04:18:55',
                'updated_at' => '2020-08-28 04:18:55',
            ),
            465 => 
            array (
                'id' => 466,
                'province_id' => 33,
                'city_id' => 324,
                'type' => 'Kota',
                'name' => 'Pagar Alam',
                'created_at' => '2020-08-28 04:18:58',
                'updated_at' => '2020-08-28 04:18:58',
            ),
            466 => 
            array (
                'id' => 467,
                'province_id' => 33,
                'city_id' => 327,
                'type' => 'Kota',
                'name' => 'Palembang',
                'created_at' => '2020-08-28 04:19:00',
                'updated_at' => '2020-08-28 04:19:00',
            ),
            467 => 
            array (
                'id' => 468,
                'province_id' => 33,
                'city_id' => 367,
                'type' => 'Kota',
                'name' => 'Prabumulih',
                'created_at' => '2020-08-28 04:19:03',
                'updated_at' => '2020-08-28 04:19:03',
            ),
            468 => 
            array (
                'id' => 469,
                'province_id' => 34,
                'city_id' => 15,
                'type' => 'Kabupaten',
                'name' => 'Asahan',
                'created_at' => '2020-08-28 04:19:07',
                'updated_at' => '2020-08-28 04:19:07',
            ),
            469 => 
            array (
                'id' => 470,
                'province_id' => 34,
                'city_id' => 52,
                'type' => 'Kabupaten',
                'name' => 'Batu Bara',
                'created_at' => '2020-08-28 04:19:13',
                'updated_at' => '2020-08-28 04:19:13',
            ),
            470 => 
            array (
                'id' => 471,
                'province_id' => 34,
                'city_id' => 70,
                'type' => 'Kota',
                'name' => 'Binjai',
                'created_at' => '2020-08-28 04:19:16',
                'updated_at' => '2020-08-28 04:19:16',
            ),
            471 => 
            array (
                'id' => 472,
                'province_id' => 34,
                'city_id' => 110,
                'type' => 'Kabupaten',
                'name' => 'Dairi',
                'created_at' => '2020-08-28 04:19:19',
                'updated_at' => '2020-08-28 04:19:19',
            ),
            472 => 
            array (
                'id' => 473,
                'province_id' => 34,
                'city_id' => 112,
                'type' => 'Kabupaten',
                'name' => 'Deli Serdang',
                'created_at' => '2020-08-28 04:19:24',
                'updated_at' => '2020-08-28 04:19:24',
            ),
            473 => 
            array (
                'id' => 474,
                'province_id' => 34,
                'city_id' => 137,
                'type' => 'Kota',
                'name' => 'Gunungsitoli',
                'created_at' => '2020-08-28 04:19:30',
                'updated_at' => '2020-08-28 04:19:30',
            ),
            474 => 
            array (
                'id' => 475,
                'province_id' => 34,
                'city_id' => 146,
                'type' => 'Kabupaten',
                'name' => 'Humbang Hasundutan',
                'created_at' => '2020-08-28 04:19:33',
                'updated_at' => '2020-08-28 04:19:33',
            ),
            475 => 
            array (
                'id' => 476,
                'province_id' => 34,
                'city_id' => 173,
                'type' => 'Kabupaten',
                'name' => 'Karo',
                'created_at' => '2020-08-28 04:19:36',
                'updated_at' => '2020-08-28 04:19:36',
            ),
            476 => 
            array (
                'id' => 477,
                'province_id' => 34,
                'city_id' => 217,
                'type' => 'Kabupaten',
                'name' => 'Labuhan Batu',
                'created_at' => '2020-08-28 04:19:39',
                'updated_at' => '2020-08-28 04:19:39',
            ),
            477 => 
            array (
                'id' => 478,
                'province_id' => 34,
                'city_id' => 218,
                'type' => 'Kabupaten',
                'name' => 'Labuhan Batu Selatan',
                'created_at' => '2020-08-28 04:19:43',
                'updated_at' => '2020-08-28 04:19:43',
            ),
            478 => 
            array (
                'id' => 479,
                'province_id' => 34,
                'city_id' => 219,
                'type' => 'Kabupaten',
                'name' => 'Labuhan Batu Utara',
                'created_at' => '2020-08-28 04:19:45',
                'updated_at' => '2020-08-28 04:19:45',
            ),
            479 => 
            array (
                'id' => 480,
                'province_id' => 34,
                'city_id' => 229,
                'type' => 'Kabupaten',
                'name' => 'Langkat',
                'created_at' => '2020-08-28 04:19:48',
                'updated_at' => '2020-08-28 04:19:48',
            ),
            480 => 
            array (
                'id' => 481,
                'province_id' => 34,
                'city_id' => 268,
                'type' => 'Kabupaten',
                'name' => 'Mandailing Natal',
                'created_at' => '2020-08-28 04:19:52',
                'updated_at' => '2020-08-28 04:19:52',
            ),
            481 => 
            array (
                'id' => 482,
                'province_id' => 34,
                'city_id' => 278,
                'type' => 'Kota',
                'name' => 'Medan',
                'created_at' => '2020-08-28 04:19:58',
                'updated_at' => '2020-08-28 04:19:58',
            ),
            482 => 
            array (
                'id' => 483,
                'province_id' => 34,
                'city_id' => 307,
                'type' => 'Kabupaten',
                'name' => 'Nias',
                'created_at' => '2020-08-28 04:20:02',
                'updated_at' => '2020-08-28 04:20:02',
            ),
            483 => 
            array (
                'id' => 484,
                'province_id' => 34,
                'city_id' => 308,
                'type' => 'Kabupaten',
                'name' => 'Nias Barat',
                'created_at' => '2020-08-28 04:20:07',
                'updated_at' => '2020-08-28 04:20:07',
            ),
            484 => 
            array (
                'id' => 485,
                'province_id' => 34,
                'city_id' => 309,
                'type' => 'Kabupaten',
                'name' => 'Nias Selatan',
                'created_at' => '2020-08-28 04:20:10',
                'updated_at' => '2020-08-28 04:20:10',
            ),
            485 => 
            array (
                'id' => 486,
                'province_id' => 34,
                'city_id' => 310,
                'type' => 'Kabupaten',
                'name' => 'Nias Utara',
                'created_at' => '2020-08-28 04:20:15',
                'updated_at' => '2020-08-28 04:20:15',
            ),
            486 => 
            array (
                'id' => 487,
                'province_id' => 34,
                'city_id' => 319,
                'type' => 'Kabupaten',
                'name' => 'Padang Lawas',
                'created_at' => '2020-08-28 04:20:19',
                'updated_at' => '2020-08-28 04:20:19',
            ),
            487 => 
            array (
                'id' => 488,
                'province_id' => 34,
                'city_id' => 320,
                'type' => 'Kabupaten',
                'name' => 'Padang Lawas Utara',
                'created_at' => '2020-08-28 04:20:21',
                'updated_at' => '2020-08-28 04:20:21',
            ),
            488 => 
            array (
                'id' => 489,
                'province_id' => 34,
                'city_id' => 323,
                'type' => 'Kota',
                'name' => 'Padang Sidempuan',
                'created_at' => '2020-08-28 04:20:24',
                'updated_at' => '2020-08-28 04:20:24',
            ),
            489 => 
            array (
                'id' => 490,
                'province_id' => 34,
                'city_id' => 325,
                'type' => 'Kabupaten',
                'name' => 'Pakpak Bharat',
                'created_at' => '2020-08-28 04:20:27',
                'updated_at' => '2020-08-28 04:20:27',
            ),
            490 => 
            array (
                'id' => 491,
                'province_id' => 34,
                'city_id' => 353,
                'type' => 'Kota',
                'name' => 'Pematang Siantar',
                'created_at' => '2020-08-28 04:20:32',
                'updated_at' => '2020-08-28 04:20:32',
            ),
            491 => 
            array (
                'id' => 492,
                'province_id' => 34,
                'city_id' => 389,
                'type' => 'Kabupaten',
                'name' => 'Samosir',
                'created_at' => '2020-08-28 04:20:34',
                'updated_at' => '2020-08-28 04:20:34',
            ),
            492 => 
            array (
                'id' => 493,
                'province_id' => 34,
                'city_id' => 404,
                'type' => 'Kabupaten',
                'name' => 'Serdang Bedagai',
                'created_at' => '2020-08-28 04:20:38',
                'updated_at' => '2020-08-28 04:20:38',
            ),
            493 => 
            array (
                'id' => 494,
                'province_id' => 34,
                'city_id' => 407,
                'type' => 'Kota',
                'name' => 'Sibolga',
                'created_at' => '2020-08-28 04:20:43',
                'updated_at' => '2020-08-28 04:20:43',
            ),
            494 => 
            array (
                'id' => 495,
                'province_id' => 34,
                'city_id' => 413,
                'type' => 'Kabupaten',
                'name' => 'Simalungun',
                'created_at' => '2020-08-28 04:20:45',
                'updated_at' => '2020-08-28 04:20:45',
            ),
            495 => 
            array (
                'id' => 496,
                'province_id' => 34,
                'city_id' => 459,
                'type' => 'Kota',
                'name' => 'Tanjung Balai',
                'created_at' => '2020-08-28 04:20:52',
                'updated_at' => '2020-08-28 04:20:52',
            ),
            496 => 
            array (
                'id' => 497,
                'province_id' => 34,
                'city_id' => 463,
                'type' => 'Kabupaten',
                'name' => 'Tapanuli Selatan',
                'created_at' => '2020-08-28 04:20:54',
                'updated_at' => '2020-08-28 04:20:54',
            ),
            497 => 
            array (
                'id' => 498,
                'province_id' => 34,
                'city_id' => 464,
                'type' => 'Kabupaten',
                'name' => 'Tapanuli Tengah',
                'created_at' => '2020-08-28 04:20:59',
                'updated_at' => '2020-08-28 04:20:59',
            ),
            498 => 
            array (
                'id' => 499,
                'province_id' => 34,
                'city_id' => 465,
                'type' => 'Kabupaten',
                'name' => 'Tapanuli Utara',
                'created_at' => '2020-08-28 04:21:03',
                'updated_at' => '2020-08-28 04:21:03',
            ),
            499 => 
            array (
                'id' => 500,
                'province_id' => 34,
                'city_id' => 470,
                'type' => 'Kota',
                'name' => 'Tebing Tinggi',
                'created_at' => '2020-08-28 04:21:06',
                'updated_at' => '2020-08-28 04:21:06',
            ),
        ));
        \DB::table('ok_cities')->insert(array (
            0 => 
            array (
                'id' => 501,
                'province_id' => 34,
                'city_id' => 481,
                'type' => 'Kabupaten',
                'name' => 'Toba Samosir',
                'created_at' => '2020-08-28 04:21:09',
                'updated_at' => '2020-08-28 04:21:09',
            ),
        ));
        
        
    }
}