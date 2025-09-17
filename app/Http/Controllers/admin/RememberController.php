<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Remember;
Use DB;

class RememberController extends Controller
{
    //
    public function remember(Request $request, $id = null)  {

        $data['remembers'] = Remember::orderBy('id', 'desc')->paginate(env('PAGINATE_MEDIUM'));

        $data['remember'] = new Remember();

        // update query
        if(!empty($id)) {
            $data['remember'] = Remember::find($id);

            if (isset($data['remember'])){

                return view('admin.remember',$data);
    
             }else {
    
                return  redirect()->route('remember');
             }
        }

        
        return view('admin.remember', $data);
    }



    public function rememberInsertUpdate(Request $request)
    {
        $data = [
            'remember_person_name'=>$request->remember_person_name,
            'reason'=>$request->reason
        ];

        $required['remember_person_name'] = 'required';
        $required['reason'] = 'required';

        if(empty($request->edit_id)) {
            $required['remember_person_image'] = 'required |  image | max:1500';
        }
        
        $request->validate($required);



        if(!empty($request->remember_person_image)) {
            $file = $request->remember_person_image;
            $remember_person_image = DB::table('remembers')->where('id',$request->edit_id)->first();

            $data['remember_person_image'] = fileUpload($file,'remember_person_image',((!empty($remember_person_image)) ? $remember_person_image->remember_person_image : ''));
        }

        if(!empty($request->edit_id)) {
            DB::table('remembers')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('remembers')->insert($data);
        }
      
        return redirect()->Route('remember')->with(['message'=> 'Successfully insert!!']);
    }


    public function rememberDelete($id)
    {

        $item = Remember::find($id);

        if(!empty($item->remember_person_image) && file_exists(public_path().'/upload/'.$item->remember_person_image)) {
            unlink(public_path().'/upload/'.$item->remember_person_image);
         }

         $item->delete();

        return redirect()->Route('remember')->with(['delete_message'=> 'Successfully deleted!!']);
    }
}
