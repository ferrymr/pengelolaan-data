<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $table = 'slider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'category', 
        'link',
        'order', 
    ];

    public function getAll() {
        return Slider::all();
    }

    public function addSliderImage($category, $filename, $order) {
        return Slider::insert([
            'name' => $filename,
            'category' => $category,
            'link' => '#',
            'order' => $order,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    // public function addSlider($request) {
    //     $data = Slider::create($request);
    //     return $data;
    // }

    public function deleteSlider($id) {
        $data = Slider::find($id);
        if(!empty($data)) {
            $data->delete();
            return $data;
        } else {
            return false;
        }
    }

    public function findId($id) {
        $data = Slider::find($id);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function editSlider($request, $id) {
        $data = Slider::where('id', $id)
                    ->update($request);
        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
