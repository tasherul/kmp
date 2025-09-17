<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Wantedmissing;
use DB;

class WantedMissingController extends Controller
{
    //

       
       public function wantedmissing(Request $request, $id = null)  {

       $data['Wantedmissings'] = Wantedmissing::orderBy('id', 'desc')->paginate(env('PAGINATE_MEDIUM'));;
  
        $data['Wantedmissing'] = new Wantedmissing();
  
        // update query
        if(!empty($id)) {
            $data['Wantedmissing'] = Wantedmissing::find($id);


        if (isset($data['Wantedmissing'])){

            return view('admin.wanted_missing',$data);

            }else {

            return  redirect()->route('wantedmissing');
            }
        }
  
        
        return view('admin.wanted_missing', $data);
      }
  
  
  
      public function wantedMissingInsertUpdate(Request $request){
  
        $data = [
            'name'=>$request->name,
            'type'=>$request->type,
            'wanted_or_missing_details'=>$request->wanted_or_missing_details,
        ];


        $required['name'] = 'required';
        $required['type'] = 'required |in:Wanted,Missing';
        $required['wanted_or_missing_details'] = 'required';

        if(empty($request->edit_id)) {
            $required['image'] = 'required |  image | max:1500';
        }
        
        $request->validate($required);



  
        if(!empty($request->image)) {
            $file = $request->image;
            $image = DB::table('wantedmissings')->where('id',$request->edit_id)->first();
  
            $data['image'] = fileUpload($file,'wanted_missings',((!empty($image)) ? $image->image : ''));
        }
  
        if(!empty($request->edit_id)) {
            DB::table('wantedmissings')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('wantedmissings')->insert($data);
        }
      
        return redirect()->Route('wantedmissing')->with(['message'=> 'Successfully insert!!']);
    }
  
  
    public function wantedMissingDelete($id){
  
      $item = Wantedmissing::find($id);
  
      if(!empty($item->image) && file_exists(public_path().'/upload/'.$item->image)) {
          unlink(public_path().'/upload/'.$item->image);
      }
  
      $item->delete();
  
      return redirect()->Route('wantedmissing')->with(['delete_message'=> 'Successfully deleted!!']);
    }
  
}
