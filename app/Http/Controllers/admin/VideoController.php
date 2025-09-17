<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Video;
use DB;


class VideoController extends Controller
{
    //
    public function video(Request $request, $id = null)  {

        $data['videos'] = Video::orderBy('id', 'desc')->paginate(env('PAGINATE_SMALL'));
  
        $data['video'] = new Video();
  
        // update query
        if(!empty($id)) {
            $data['video'] = Video::find($id);

        if (isset($data['video'])){

            return view('admin.video',$data);

            }else {

            return  redirect()->route('video');
            }
            
        }
  
        
        return view('admin.video', $data);
      }

      public function videoInsertUpdate(Request $request)
      {
          $data = [
              'video_title'=>$request->video_title,
              //'video_type'=>$request->video_type,
              'video_link'=>$request->video_link,
          ];


            
        $required['video_title'] = 'required';
        //$required['video_type'] = 'required |in:Youtube Video,Vimo Video,Private Video';
        $required['video_link'] = 'required';

        if(empty($request->edit_id)) {
            $required['video_thumbnail'] = 'required |  image | max:500';
        }
        
        $request->validate($required);





          if(!empty($request->video_thumbnail)) {
            $file = $request->video_thumbnail;
            $video_thumbnail = DB::table('videos')->where('id',$request->edit_id)->first();

            $data['video_thumbnail'] = fileUpload($file,'video_gallery',((!empty($video_thumbnail)) ? $video_thumbnail->video_thumbnail : ''));
        }
  
  
          if(!empty($request->edit_id)) {
              DB::table('videos')->where('id',$request->edit_id)->update($data);
          } else {
              DB::table('videos')->insert($data);
          }
        
          return redirect()->Route('video')->with(['message'=> 'Successfully insert!!']);
      }
  
  
      public function videoDelete($id)
      {
  
            $item = Video::find($id);

            if(!empty($item->video_thumbnail) && file_exists(public_path().'/upload/'.$item->video_thumbnail)) {
                unlink(public_path().'/upload/'.$item->video_thumbnail);
             }
  
            $item->delete();
  
          return redirect()->Route('video')->with(['delete_message'=> 'Successfully deleted!!']);
      }
}
