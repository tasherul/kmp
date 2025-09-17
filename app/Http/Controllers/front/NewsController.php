<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class NewsController extends Controller
{
    //
    public function news()  {
        $data['newss'] = News::orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        return view('front.news',$data);
    }

    public function newsSingle($id)  {

        $data['newss'] = News::orderBy('id', 'desc')->paginate(env('PAGINATE_LARGE'));

        $data['single_news']  = News::where('id',$id )->first();


        if (isset($data['single_news'])){

            return view('front.news_single',$data);

         }else {

            return  redirect()->route('news');
         }  

         return view('front.news_single',$data);
    }

}
