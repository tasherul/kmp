<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use DB;

class ContactController extends Controller
{
    //
    public function contact(Request $request, $id = null)
    {

        $data['head_assistants'] = Contact::wherenotnull('head_assistant_name')->get();

        $data['head_assistant'] = new Contact();

        // update query
        if(!empty($id)) {
            $data['head_assistant'] = Contact::find($id);

            
            

        }

        //control_room
        $data['mobile_no']=DB::table('contract_us')
        ->select('*')->orderBy('position', 'ASC')->get();
        
        $data['control_rooms'] = Contact::wherenotnull('control_room_office')->get();
       
        $data['control_room'] = new Contact();

        // update query
        if(!empty($id)) {
            $data['control_room'] = Contact::find($id);

            if (isset($data['control_room'])){

                return view('admin.contact',$data);
    
             }else {
    
                return  redirect()->route('contact');
             }
        }
       

        return view('admin.contact',$data);

    }

    public function contact_us()
    {
        
         return view('admin.contract_us');
    }

    //insert update
    public function contactInsertUpdate(Request $request)
    {
        if($request->has('head_assistant')){

            $data = [
                'head_assistant_name'=>$request->head_assistant_name,
                'head_assistant_range_address'=>$request->head_assistant_range_address,
                'head_assistant_mobile_no'=>$request->head_assistant_mobile_no,
                'head_assistant_phone_no'=>$request->head_assistant_phone_no,
                'head_assistant_email'=>$request->head_assistant_email,
            ];
    
            $request->validate([
                'head_assistant_name' => 'required|max:250',
                'head_assistant_range_address' => 'required',
                'head_assistant_mobile_no' => 'required',
                'head_assistant_phone_no' => 'required',
                'head_assistant_email' => 'required',
            ]);

    
            if(!empty($request->edit_id)) {
                DB::table('contacts')->where('id',$request->edit_id)->update($data);
            }else{
                DB::table('contacts')->insert($data);
            }
        }


        if($request->has('control_room')){

            $data = [
                'control_room_office'=>$request->control_room_office,
                'control_room_mobile_no'=>$request->control_room_mobile_no,
                'control_room_phone_no'=>$request->control_room_phone_no,
                'control_room_fax'=>$request->control_room_fax,
                'control_room_email'=>$request->control_room_email,
                'control_room_kmp_address'=>$request->control_room_kmp_address
                
            ];
    
            $request->validate([
                'control_room_office' => 'required|max:250',
                'control_room_mobile_no' => 'required',
                'control_room_phone_no' => 'required',
                'control_room_fax' => 'required',
                'control_room_email' => 'required',
                'control_room_kmp_address' => 'required',
                //'contract_banner' => 'required',
            ]);


            if(empty($request->edit_id)) {

            $required['contract_banner'] = 'required | mimes:jpeg,png,jpg | max:1500';
            $required['cont_num_1'] = ' mimes:jpeg,png,jpg | max:1500';
            $required['cont_num_2'] = ' mimes:jpeg,png,jpg | max:1500';
            
        
        
            $request->validate($required);
            }

            if(!empty($request->contract_banner)) {
               
            $file = $request->contract_banner;
            $contract_banner = DB::table('contacts')->where('id',$request->edit_id)->first();

            $data['contract_banner'] = fileUpload($file,'contract_banner',((!empty($contract_banner)) ? $contract_banner->contract_banner : ''));
            // print_r($data['slider_image']);
        }
        if(!empty($request->cont_num_1)) {
               
            $file = $request->cont_num_1;
            $cont_num_1 = DB::table('contacts')->where('id',$request->edit_id)->first();

            $data['cont_num_1'] = fileUpload($file,'cont_num_1',((!empty($cont_num_1)) ? $contract_banner->contract_banner : ''));
            // print_r($data['slider_image']);
        }if(!empty($request->cont_num_2)) {
               
            $file = $request->cont_num_2;
            $cont_num_2 = DB::table('contacts')->where('id',$request->edit_id)->first();

            $data['cont_num_2'] = fileUpload($file,'cont_num_2',((!empty($cont_num_2)) ? $cont_num_2->cont_num_2 : ''));
            // print_r($data['slider_image']);
        }
       

       
        
          
    
            if(!empty($request->edit_id)) {
                DB::table('contacts')->where('id',$request->edit_id)->update($data);
            }else{
                DB::table('contacts')->insert($data);
            }
        }

      
        return redirect()->Route('contact')->with(['message'=> 'Successfully update!!']);
    }


/*

    public function contactDelete($id)
    {

       $item = Contact::find($id);

        if(!empty($item->ranks_system_image) && file_exists(public_path().'/upload/'.$item->ranks_system_image)) {
            unlink(public_path().'/upload/'.$item->ranks_system_image);
         }

         $item->delete();

        return redirect()->route('contact')->with(['delete_message'=> 'Successfully deleted!!']);
    }
*/
public function contract_us_mobile(Request $request)
{
    $designation=$request->designation;
    $old_mobile_number=$request->old_mobile_number;
    $new_mobile_number=$request->new_mobile_number;
    $position=$request->position;
    
    $data = array(
        'designation' => $designation,
        'old_mobile' => $old_mobile_number,
        'new_mobile' => $new_mobile_number,
        'position' => $position,
    );
    
    DB::table('contract_us')->insert($data);
   
    return redirect()->Route('contact')->with(['message'=> 'Successfully insert!!']);
}


public function Number_delete($id)
{
    $delete=DB::table('contract_us')
        ->where('id','=',$id)
        ->delete();
        return redirect()->Route('contact')->with(['message'=> 'Delete Successfully!!']);
}

public function Number_Edit($id)
{
    $edit_number=DB::table('contract_us')
        ->select('*')
        ->where('id','=',$id)
        ->first();
        return view('admin.contact_edit',compact('edit_number'));
}

public function contract_us_Update(Request $request)
{
    $id=$request->hidden_id;
    $designation=$request->designation;
    $old_mobile_number=$request->old_mobile_number;
    $new_mobile_number=$request->new_mobile_number;
    $position=$request->position;
    
    $data = array(
        'designation' => $designation,
        'old_mobile' => $old_mobile_number,
        'new_mobile' => $new_mobile_number,
        'position' => $position,
    );
    
    DB::table('contract_us')->where('id',$id)->update($data);
    return redirect()->Route('contact')->with(['message'=> 'Successfully insert!!']);
}


 

}
