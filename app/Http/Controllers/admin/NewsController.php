<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\News;
use DB;

class NewsController extends Controller
{
    //

    public function news(Request $request, $id = null)  {

        $data['newss'] = News::orderBy('id', 'desc')->paginate(env('PAGINATE_SMALL'));

        $data['news'] = new News();

        // update query
        if(!empty($id)) {

            $data['news'] = News::find($id);

            if (isset($data['news'])){

                return view('admin.news',$data);
    
             }else {
    
                return  redirect()->route('newsadmin');
             }


        }

        
        return view('admin.news', $data);
    }



    public function newsInsertUpdate(Request $request)
    {
        $data = [
            'news_tittle'=>$request->news_tittle,
            'news_description'=>$request->news_description
        ];


        $required['news_tittle'] = 'required';
        $required['news_description'] = 'required';

        if(empty($request->edit_id)) {
            $required['news_image'] = 'required | image | max:1500';
        }
        
        $request->validate($required);



        if(!empty($request->news_image)) {
            $file = $request->news_image;
            $news_image = DB::table('news')->where('id',$request->edit_id)->first();

            $data['news_image'] = fileUpload($file,'news_image',((!empty($news_image)) ? $news_image->news_image : ''));
        }

        if(!empty($request->edit_id)) {
            DB::table('news')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('news')->insert($data);
        }
      
        return redirect()->Route('newsadmin')->with(['message'=> 'Successfully insert!!']);
    }


    public function newsdelete($id)
    {

        $item = News::find($id);

        if(!empty($item->news_image) && file_exists(public_path().'/upload/'.$item->news_image)) {
            unlink(public_path().'/upload/'.$item->news_image);
         }

         $item->delete();

        return redirect()->Route('newsadmin')->with(['delete_message'=> 'Successfully deleted!!']);
    }
}
