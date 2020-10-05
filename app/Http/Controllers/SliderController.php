<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    public function __construct (
        Slider $slider
    ) {
        $this->sliderRepo = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = $this->sliderRepo->getAll();
        return view('backend.store.slider.index')->with([
            'slider' => $slider,
        ]);
    }

    public function datatable() {

        $slider = $this->sliderRepo->getAll();
        return Datatables::of($slider)
            ->addColumn('action', function ($carousel){
                return [
                    // 'edit' => route('admin.carousel.edit', $carousel->id),
                    'delete' => route('admin.carousel.delete', $carousel->id),
                ];
            })
            ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('filename'));
        if(!empty($request->file('filename'))) {
            $sort = 1;
            foreach ($request->file('filename') as $file) {
                $filename = 'carousel-' . $sort . '-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/carousel', $filename);

                $carousel = $this->sliderRepo->addSliderImage('home', $filename, $sort);
                $sort++;
            }
        }  else {
            $filename = "";
        }         

        if(!empty($filename)) {
            flash('<strong>Foto Slider Berhasil Ditambah</strong>')->success()->important();
            return redirect()->route('admin.carousel.index');
        } else {
            flash('<strong>Foto Slider Gagal Ditambah</strong>')->error()->important();
            return redirect()->route('admin.carousel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->sliderRepo->deleteSlider($id);
        if(!empty($data)) {
            flash()->success('Slider Terhapus');
            return redirect()->route('admin.carousel.index');
        } else {
            flash()->success('Slider Tidak Ditemukan');
            return redirect()->route('admin.carousel.index');
        }
    }

    public function getSliderImage($id) {
        $carouselImage = $this->sliderRepo->find($id);
        
        if(!$carouselImage) {
            abort(404); 
        }

        // Access local storage
        $path = storage_path('app/public/carousel/' . $carouselImage->name);

        if (!File::exists($path)) {
            abort(404);
        }

        // Return file
        return (new Response(File::get($path), 200))
              ->header('Content-Type', File::mimeType($path));
    }

    public function updateOrder(Request $request)
    {
        $slider = Slider::all();
        
        foreach ($slider as $carousel) {
            // $carousel->timestamps = false; // To disable update_at field updation
            $id = $carousel->id;
            // dd($id);
            foreach ($request->input('order') as $order) {
                if ($order['id'] == $id) {
                    $this->sliderRepo->editSlider(array('order' => $order['position']), $id);
                    // return response(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }
}
