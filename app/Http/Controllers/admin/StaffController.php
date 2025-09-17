<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Staffkmp;
use DB;

class StaffController extends Controller
{
    //

    public function staff(Request $request, $id = null)  {

       $data['staffs'] = Staffkmp::paginate(env('PAGINATE_MEDIUM'));;

        $data['staff'] = new Staffkmp();

        // update query
        if(!empty($id)) {
            $data['staff'] = Staffkmp::find($id);

        if (isset($data['staff'])){

            return view('admin.staff',$data);

            }else {

            return  redirect()->route('staff');
            }
        }

        
        return view('admin.staff',$data);
    }



    public function staffInsertUpdate(Request $request, $id = null)
    {

        $data = [
            'staff_name'=>$request->staff_name,
            'designation'=>$request->designation,
            'bp_no'=>$request->bp_no,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
        ];


        $required['staff_name'] = 'required';
        $required['designation'] = 'required';
        $required['bp_no'] = 'required';
        $required['mobile'] = 'required';
        $required['email'] = 'required | email';

        if(empty($request->edit_id)) {
            $required['staff_image'] = 'required |  image | max:1500';
        }
        
        $request->validate($required);


        if(!empty($request->staff_image)) {
            $file = $request->staff_image;
            $staff_image = DB::table('staffkmps')->where('id',$request->edit_id)->first();

            $data['staff_image'] = fileUpload($file,'staff_image',((!empty($staff_image)) ? $staff_image->staff_image : ''));
        }

        if(!empty($request->edit_id)) {
            DB::table('staffkmps')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('staffkmps')->insert($data);
        }
    
        return redirect()->Route('staff')->with(['message'=> 'Successfully insert!!']);
    }
    

    public function staffDelete($id)
    {

        $item = Staffkmp::find($id);

        if(!empty($item->staff_image) && file_exists(public_path().'/upload/'.$item->staff_image)) {
            unlink(public_path().'/upload/'.$item->staff_image);
         }

         $item->delete();

        return redirect()->Route('staff')->with(['delete_message'=> 'Successfully deleted!!']);
    }
}
