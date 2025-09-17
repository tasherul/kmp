<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Photo;
use App\Model\Video;


class GalleryController extends Controller
{
    //
    public function photoGallery()  {
        $data['photos'] = Photo::orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        return view('front.photo_gallery',$data);
    }


    public function videoGallery()  {

        $data['videos'] = Video::orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        return view('front.video_gallery',$data);
    }

}
