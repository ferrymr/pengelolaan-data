<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'kode_barang' => $faker->kode_barang,
        'nama' => $faker->nama,
        'jenis' => $faker->jenis,
        'stok' => $faker->stok,
        'poin' => $faker->poin,
        'h_hpb' => $faker->h_hpb,
        'h_ppnj' => $faker->h_ppnj,
        'h_nomem' => $faker->h_nomem,
        'h_member' => $faker->h_member,
        'h_beli' => $faker->h_beli,
        'h_ppnb' => $faker->h_ppnb,
        'h_hpp' => $faker->h_hpp,
        'berat' => $faker->berat,
        'satuan' => $faker->satuan,
        'bpom' => $faker->bpom,
        'tgl_eks' => $faker->tgl_eks,
        'stats' => $faker->stats,
        'stok_his' => $faker->stok_his,
        'log_his' => $faker->log_his,
        'pic' => $faker->pic,
        'cat' => $faker->cat,
        'diskon' => $faker->diskon,
        'deskripsi' => $faker->deskripsi,
        'cara_pakai' => $faker->cara_pakai,
    ];
});
