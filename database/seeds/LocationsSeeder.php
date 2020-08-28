<?php

use App\City;
use App\Province;
use App\Subdistrict;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        
        foreach ($daftarProvinsi as $provinceRow) {
            Province::create([
                'province_id' => $provinceRow['province_id'],
                'name'        => $provinceRow['province'],
            ]);
            
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            
            foreach ($daftarKota as $cityRow) {
                City::create([
                    'province_id'   => $provinceRow['province_id'],
                    'city_id'       => $cityRow['city_id'],
                    'type'          => $cityRow['type'],
                    'name'          => $cityRow['city_name'],
                ]);

                $daftarKecamatan = RajaOngkir::kecamatan()->dariKota($cityRow['city_id'])->get();
                
                foreach ($daftarKecamatan as $subdistrictRow) {
                    Subdistrict::create([
                        'province_id'   => $provinceRow['province_id'],
                        'city_id'       => $cityRow['city_id'],
                        'subdistrict_id'       => $subdistrictRow['subdistrict_id'],
                        'name'          => $subdistrictRow['subdistrict_name'],
                    ]);
                }
            }
        }
    }
}
