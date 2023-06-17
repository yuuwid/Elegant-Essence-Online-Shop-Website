<?php

namespace App\Http\Controllers;

use App\Models\TempImage;
use DateTime;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{

    public function upload_one_to_temp(Request $request)
    {
        if (isset($request->image)) {
            $ext = $request->image->extension();
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {

                $imageName = time() . '-' . random_int(10000, 99999) . '.' . $request->image->extension();
                $request->image->move(public_path('images/upload/temp'), $imageName);

                $id_temp_img = TempImage::create([
                    'filename' => $imageName,
                    'temp_life' => TempImage::nextDay(),
                ])->id_temp_img;

                TempImage::destroy_temp();

                return response()->json(
                    [
                        'status' => true,
                        'id_temp' => $id_temp_img,
                    ],
                    200
                );
            }
        }

        return response()->json(['status' => false], 400);
    }

    public function upload_batch_to_temp(Request $request)
    {


        if ($request->hasFile('images')) {
            $images = $request->file('images');

            $batch_id = [];
            foreach ($images as $image) {
                $ext = $image->extension();

                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    $imageName = time() . '-' . random_int(10000, 99999) . '.' . $image->extension();
                    $image->move(public_path('images/upload/temp'), $imageName);

                    $id_temp_img = TempImage::create([
                        'filename' => $imageName,
                        'temp_life' => TempImage::nextDay(),
                    ])->id_temp_img;


                    array_push($batch_id, $id_temp_img);
                } else {
                    array_push($batch_id, -1);
                }
            }
            TempImage::destroy_temp();
            return response()->json([
                'status' => true,
                'batch_id' => $batch_id,
            ], 200);
        }
        return response()->json(['status' => false], 400);

        // if (isset($request->images)) {
        //     $batch_id = [];
        //     dd($request->images);

        //     foreach ($request->images as $img) {
        //         $ext = $img->extension();
        //         if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {

        //             $imageName = time() . '-' . random_int(10000, 99999) . '.' . $img->extension();
        //             $img->move(public_path('images/upload/temp'), $imageName);

        //             $id_temp_img = TempImage::create([
        //                 'filename' => $imageName,
        //                 'temp_life' => TempImage::nextDay(),
        //             ])->id_temp_img;


        //             array_push($batch_id, $id_temp_img);
        //         } else {
        //             array_push($batch_id, -1);
        //         }
        //     }

        //     TempImage::destroy_temp();

        //     return response()->json(
        //         [
        //             'status' => true,
        //             'batch_id' => $batch_id,
        //         ],
        //         200
        //     );
        // }
        // return response()->json(['status' => false], 400);
    }

    public function temp_image_by_id($id)
    {
        $filename = TempImage::where('id_temp_img', $id)->get()->first()->filename;

        return response()->json(['src' => '/images/upload/temp/' . $filename]);
    }

    public function temp_batch_image_by_ids($ids)
    {
        $id_batchs = explode('-', $ids);

        $results = ['src' => []];

        foreach ($id_batchs as $id) {
            $filename = TempImage::where('id_temp_img', $id)->get()->first()->filename;

            array_push($results['src'], '/images/upload/temp/' . $filename);
        }

        return response()->json($results);
    }

    public function test()
    {
    }
}
