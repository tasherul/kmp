<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Photo;
use DB;

class PhotoController extends Controller
{
    //
    public function photo(Request $request, $id = null)  {

        $data['photos'] = Photo::orderBy('id', 'desc')->paginate(env('PAGINATE_SMALL'));
  
        $data['photo'] = new Photo();
  
        // update query
        if(!empty($id)) {
            $data['photo'] = Photo::find($id);

        if (isset($data['photo'])){

            return view('admin.photo_gallery',$data);

            }else {

            return  redirect()->route('photo');
            }

        }
  
        
        return view('admin.photo_gallery', $data);
      }



      
    public function photoInsertUpdate(Request $request)
    {
        $data = [
            'image_tittle'=>$request->image_tittle,
        ];



        
        $required['image_tittle'] = 'required';

        if(empty($request->edit_id)) {
            $required['gallery_image'] = 'required |  image | max:1500';
        }
        
        $request->validate($required);



        if(!empty($request->gallery_image)) {
            $file = $request->gallery_image;
            $gallery_image = DB::table('photos')->where('id',$request->edit_id)->first();

            $data['gallery_image'] = fileUpload($file,'gallery_image',((!empty($gallery_image)) ? $gallery_image->gallery_image : ''));

        }

        if(!empty($request->edit_id)) {
            DB::table('photos')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('photos')->insert($data);
            
                
        }
      
        return redirect()->Route('photo')->with(['message'=> 'Successfully insert!!']);
    }


    public function photoDelete($id)
    {

        $item = Photo::find($id);

        if(!empty($item->gallery_image) && file_exists(public_path().'/upload/'.$item->gallery_image)) {
            unlink(public_path().'/upload/'.$item->gallery_image);
         }

         $item->delete();

        return redirect()->Route('photo')->with(['delete_message'=> 'Successfully deleted!!']);
    }
  
}
