<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table    = 'tb_settings';
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'soft_delete'
    ];

    public function getAll()
    {
        return Setting::all();
    }

    public function addSetting($request)
    {
        $setting = array(
            'name' => $request['name'],
            'slug' => $request['slug'],
            'category' => $request['category'],
            'description' => $request['description'],
            'soft_delete' => 0,
        );

        $setting = Setting::create($setting);

        return $setting;
    }

    public function editSetting($request, $id)
    {

        $data = Setting::where('id', $id)->update($request);

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteSetting($id)
    {
        $data = Setting::find($id);

        if (!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }
}
