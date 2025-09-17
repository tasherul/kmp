<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use DB;

class SliderController extends Controller
{
    //

    Public function slider(Request $request, $id = null){

        
        $data['sliders'] = Slider::orderBy('id', 'desc')->paginate(env('PAGINATE_SMALL'));

        $data['slider'] = new Slider();

        // update query
        if(!empty($id)) {
            $data['slider'] = Slider::find($id);
        }

        
        return view('admin.slider',$data);

    }


    public function sliderInsertUpdate(Request $request, $id = null)
    {


        if(empty($request->edit_id)) {
            $required['slider_image'] = 'required | mimes:jpeg,png,jpg | max:1500';
            $required['titel_image'] = 'required';
        
        
        $request->validate($required);
    }

        


        if(!empty($request->slider_image)) {
            $file = $request->slider_image;
            $slider_image = DB::table('sliders')->where('id',$request->edit_id)->first();

            $data['slider_image'] = fileUpload($file,'slider_image',((!empty($slider_image)) ? $slider_image->slider_image : ''));
            // print_r($data['slider_image']);
        }
        if(!empty($request->titel_image)) {
            
          $data['titel_image']=$request->titel_image;
          //print_r($data['slider_titel']);
            
        }
        
        if(!empty($request->edit_id)) {
            DB::table('sliders')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('sliders')->insert($data);
        }

    
        return redirect()->Route('slider')->with(['message'=> 'Successfully insert!!']);
    }
    


  public function sliderDelete($id)
    {

        $item = Slider::find($id);

        if(!empty($item->slider_image) && file_exists(public_path().'/upload/'.$item->slider_image)) {
            unlink(public_path().'/upload/'.$item->slider_image);
         }

         $item->delete();

        return redirect()->Route('slider')->with(['delete_message'=> 'Successfully deleted!!']);
    }



}
