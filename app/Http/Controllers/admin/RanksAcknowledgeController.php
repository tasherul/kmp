<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RanksAcknowledge;
use DB;
use Redirect;


class RanksAcknowledgeController extends Controller
{
    //

    public function ranksAcknowledge(Request $request, $id = null){

        $data['ranks'] = RanksAcknowledge::wherenotnull('rank_content')->get();

        $data['rank'] = new RanksAcknowledge();

        // update query
        if(!empty($id)) {
            $data['rank'] = RanksAcknowledge::find($id);
        }
       // acknowledgement_content

        $data['acknowledgement_contents'] = RanksAcknowledge::wherenotnull('acknowledgement_content')->get();

        ;
        $data['acknowledgement_content'] = new RanksAcknowledge();

        // update query
        if(!empty($id)) {
            $data['acknowledgement_content'] = RanksAcknowledge::find($id);
        }




        //acknowledges

        $data['acknowledges'] = RanksAcknowledge::wherenotnull('acknowledgement_name')->orderBy('id', 'asc')->paginate(env('PAGINATE_LARGE'));

        ;
        $data['acknowledge'] = new RanksAcknowledge();

        // update query
        if(!empty($id)) {
            $data['acknowledge'] = RanksAcknowledge::find($id);

            if (isset($data['acknowledge'])){

                return view('admin.ranks_acknowledge',$data);
    
             }else {
    
                return  redirect()->route('ranksAcknowledge');
             }
        }

        return view('admin.ranks_acknowledge',$data);

    }



    //insert update
    public function ranksAcknowledgeInsertUpdate(Request $request)
    {
        if($request->has('ranks')){

            $data = [
                'rank_content'=>$request->rank_content,
            ];


            $required['rank_content'] = 'required';

            if(empty($request->edit_id)) {
                $required['ranks_system_image'] = 'required |  mimes:jpeg,png,jpg | max:1500';
            }
            
            $request->validate($required);
      
      


            
        if(!empty($request->ranks_system_image)) {
            $file = $request->ranks_system_image;
            $ranks_system_image = DB::table('ranks_acknowledges')->where('id',$request->edit_id)->first();

            $data['ranks_system_image'] = fileUpload($file,'ranks_system_image',((!empty($ranks_system_image)) ? $ranks_system_image->ranks_system_image : ''));
        }
          
    
            if(!empty($request->edit_id)) {
                DB::table('ranks_acknowledges')->where('id',$request->edit_id)->update($data);
            } else {

             return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);

             // DB::table('ranks_acknowledges')->insert($data);
            }
        }




        if($request->has('acknowledgement_content_submit')){

            $data = [
                'acknowledgement_content'=>$request->acknowledgement_content,
                 ];

    
            $required['acknowledgement_content'] = 'required';
    
            $request->validate($required);
     
          
    
            if(!empty($request->edit_id)) {
                DB::table('ranks_acknowledges')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);
               
                // DB::table('ranks_acknowledges')->insert($data);
            }
        }




        if($request->has('acknowledgement')){

            $data = [
                'acknowledgement_name'=>$request->acknowledgement_name,
                'acknowledgement_designation'=>$request->acknowledgement_designation
            ];
    
            $required['acknowledgement_name'] = 'required';
            $required['acknowledgement_designation'] = 'required';
    
            $request->validate($required);
     
          
    
            if(!empty($request->edit_id)) {
                DB::table('ranks_acknowledges')->where('id',$request->edit_id)->update($data);
            } else {
                DB::table('ranks_acknowledges')->insert($data);
            }
        }

      
        return redirect()->Route('ranksAcknowledge')->with(['message'=> 'Successfully insert!!']);
    }


    public function ranksAcknowledgeDelete($id)
    {

       $item = RanksAcknowledge::find($id);

        if(!empty($item->ranks_system_image) && file_exists(public_path().'/upload/'.$item->ranks_system_image)) {
            unlink(public_path().'/upload/'.$item->ranks_system_image);
         }

         $item->delete();

        return redirect()->route('ranksAcknowledge')->with(['delete_message'=> 'Successfully deleted!!']);
    }


    public function admin_noc()
    {
        $data['dd'] = DB::table('noc')->orderBy('id', 'desc')->get();

        

        return view('admin.noc',$data);
    }
    public function noc_delete($id)
    {
       DB::table('noc')->where('id', $id)->delete();
       return redirect()->back()->with(['message'=> 'Successfully Deleted!!']);;
    }

    public function nocinsert(Request $request)
    {
        


            $data = [
                'name_rank'=>$request->name_rank,
                'issuing_authority'=>$request->issuing_authority,
                'noc_file'=>$request->noc_file,
                'date'=>date('y-m-d'),
            ];
    
            $required['name_rank'] = 'required';
            $required['name_rank'] = 'required';
            $required['noc_file'] = 'required |  mimes:pdf,jpeg,png,jpg,doc,docx | max:5000';
            //$required['date'] = 'required';
    
            $request->validate($required);

            if(!empty($request->noc_file)) {
                    $file = $request->noc_file;
                    //$ranks_system_image = DB::table('ranks_acknowledges')->where('id',$request->edit_id)->first();
        
                    $data['noc_file'] = fileUpload($file,'noc_file',((!empty($noc_file)) ? $noc_file->noc_file : ''));
                 }
          
    
            if(!empty($request->edit_id)) {
                DB::table('noc')->where('id',$request->edit_id)->update($data);
            } else {
                DB::table('noc')->insert($data);
            }
        

      
        return redirect()->Route('admin_noc')->with(['message'=> 'Successfully insert!!']);
    }


    public function Admin_Kmp_Units()
    {
    $kmp_unit=DB::table('visitor_count')
    ->select('*')->orderBy('office_name', 'ASC')->get();
        return view('admin.admin_kmp_unit',compact('kmp_unit'));
    }

     public function kmp_units_insert(Request $request)
    {

        $office=$request->office;
        $designation=$request->designation;
        $mobile=$request->mobile;
        $telephone=$request->telephone;
        $email=$request->email;

        
        $data=array(
            'office_name'=> $office,
            'designation'=> $designation,
            'mobile'=> $mobile,
            'telephone'=> $telephone,
            'email'=> $email,
     );
        DB::table('visitor_count')->insert($data);

        return redirect()->Route('Admin_Kmp_Units')->with(['message'=> 'Successfully insert!!']);
    }

    public function kmp_unit_delete($id)
    {
        $delete=DB::table('visitor_count')
        ->where('id','=',$id)
        ->delete();
        return redirect()->Route('Admin_Kmp_Units')->with(['delete_message'=> 'Delete Successfully!!']);
    }
    public function link_delete($id)
    {
        DB::table('important_link')
        ->where('id','=',$id)
        ->delete();
        return redirect()->Route('important_link')->with(['delete_message'=> 'Successfully insert!!']);;
    }
    public function important_link()
    {
        $show_link=DB::table('important_link')
        ->select('*')
        ->orderBy('position', 'ASC')
        ->get();
        return view('admin.important_link',compact('show_link'));
        
    }
    public function link_insret(Request $request)
    {
        $name=$request->name;
        $important_link=$request->important_link;
        $position=$request->position;

        $data = array(
            'name' => $name,
            'link' => $important_link,
            'position' => $position,
        );
        
        DB::table('important_link')->insert($data);
        return redirect()->Route('important_link')->with(['message'=> 'Successfully insert!!']);;
    }
    public function link_edit($id)
    {
        $edit=DB::table('important_link')
        ->where('id','=',$id)
        ->select('*')->first();
        return view('admin.important_edit',compact('edit'));
        
    }

    public function link_Update(Request $request)
    {
        $id=$request->hidden_id;
        $name=$request->name;
        $important_link=$request->important_link;
        $position=$request->position;

        $data = array(
            'name' => $name,
            'link' => $important_link,
            'position' => $position,
        );
        DB::table('important_link')->where('id',$id)->update($data);
        return redirect()->Route('important_link')->with(['message'=> 'Successfully Update!!']);
    }
    public function right_side_menu()
    {
        $view_menu=DB::table('right_menu')
        ->select('*')
        ->orderBy('position', 'ASC')
        ->get();
        
        return view('admin.right_side_menu',compact('view_menu'));
        
    }
    public function menu_right_insert(Request $request)
    {
        $name=$request->name;
        
        $important_link=$request->link;
        $position=$request->position;

        $data = array(
            'name' => $name,
            
            'link' => $important_link,
            'position' => $position,
        );

        
        $required['icon'] = 'required |  image | max:1500';
            

        if(!empty($request->icon)) {
            $file = $request->icon;
    

            $data['icon'] = fileUpload($file,'icon',((!empty($icon)) ? $icon->icon : ''));
         }

         
        if(!empty($request->edit_id)) {
            DB::table('right_menu')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('right_menu')->insert($data);
        }
        return redirect()->Route('right_side_menu')->with(['message'=> 'Successfully insert!!']);
        
    }
    public function right_menu_edit($id)
    {
        $view_menu_edit=DB::table('right_menu')
        ->where('id','=',$id)
        ->select('*')->first();
        
        return view('admin.right_side_menu_edit',compact('view_menu_edit'));
    }

    public function menu_right_update(Request $request)
    {
        $id=$request->hidden_id;
        $hidden_icon=$request->hidden_icon;
        //$icon=$request->icon;
        $name=$request->name;
        $link=$request->link;
        $position=$request->position;
        

        $data = array(
            'icon' => $hidden_icon,
            'name' => $name,
            'link' => $link,
            'position' => $position,
        );

        $required['icon'] = 'required |  image,png | max:1500';
            

        if(!empty($request->icon)) {
            $file = $request->icon;
    

            $data['icon'] = fileUpload($file,'icon',((!empty($icon)) ? $icon->icon : ''));

        
         }
         DB::table('right_menu')->where('id',$id)->update($data);
        return redirect()->Route('right_side_menu')->with(['message'=> 'Successfully Update!!']);
    }
    public function right_menu_delete($id)
    {

        DB::table('right_menu')
        ->where('id','=',$id)
        ->delete();
        return redirect()->Route('right_side_menu')->with(['delete_message'=> 'Successfully insert!!']);

    }


    // 25/1/2021

    public function admin_right_to_information()
    {
        $view_information=DB::table('right_to_information')
        ->select('*')
        ->orderBy('position', 'ASC')
        ->get();

        return view('admin.admin_right_to_information',compact('view_information'));
    }

    public function right_to_information_insert(Request $request)
    {
        $titel=$request->titel;
        $link=$request->link;
        $tipositiontel=$request->position;
        $data=array(
            'titel'=>$titel,
            'link'=>$link,
            'position'=>$tipositiontel,
        );
       
        if(!empty($request->in_file)) {
            $file = $request->in_file;
           
            $data['in_file'] = fileUpload($file,'in_file',((!empty($in_file)) ? $in_file->in_file : ''));
        }

        DB::table('right_to_information')->insert($data);
        return redirect()->Route('admin_right_to_information')->with(['message'=> 'Successfully insert!!']);
         
    }
    public function right_information_edit($id)
    {
        $view_info=DB::table('right_to_information')
        ->where('id','=',$id)
        ->select('*')->first();
        return view('admin.admin_right_to_information_edit',compact('view_info'));
    }
    public function right_to_information_update(Request $request)
    {
        $id=$request->hidden_id;
        $titel=$request->titel;
        $link=$request->link;
        $position=$request->position;

        $data = array(
            'titel' => $titel,
            'link' => $link,
            'position' => $position,
        );

        if(!empty($request->in_file)) {
            $file = $request->in_file;
           
            $data['in_file'] = fileUpload($file,'in_file',((!empty($in_file)) ? $in_file->in_file : ''));
        }
        
        DB::table('right_to_information')->where('id',$id)->update($data);
        return redirect()->Route('admin_right_to_information')->with(['message'=> 'Successfully Update!!']);
    }

    public function right_information_delete($id)
    {
        DB::table('right_to_information')
        ->where('id','=',$id)
        ->delete();
        return redirect()->Route('admin_right_to_information')->with(['delete_message'=> 'Successfully Delete!!']);
    }


    public function right_information_add_staff($id)
    {
        $hidde4n_id=$id;
        
        return view('admin.right_information_add_staff',compact('id'));
    }

    public function staff_information_insert(Request $request)
    {
        $right_to_informatin_id=$request->hidden_id;
        $name=$request->name;
       
        $email=$request->email;
        $mobile=$request->mobile;
        $surename=$request->surename;
        $address=$request->address;
        $fax=$request->fax;
        $phone=$request->phone;

        $data=array(
            'name'=>$name,
            
            'email'=>$email,
            'mobile'=>$mobile,
            'surname'=>$surename,
            'address'=>$address,
            'fax'=>$fax,
            'phone'=>$phone,
            'right_to_information_id'=>$right_to_informatin_id,
           
        );

        if(!empty($request->image)) {
            $file = $request->image;
    

            $data['image'] = fileUpload($file,'image',((!empty($image)) ? $image->image : ''));

        
         }
        DB::table('right_information_staff')->insert($data);
        return Redirect::back()->with(['message'=> 'Successfully insert!!']);  

    }

    public function right_information_View_staff($id)
    {
        $info_sel=DB::table('right_to_information')
        ->select('titel')
        ->where('id','=',$id)
        ->first();

        $view_staff=DB::table('right_information_staff')
        ->select('*')
        ->where('right_to_information_id','=',$id)
        
        ->get();
        return view('admin.right_information_view_staff',compact('view_staff','info_sel'));
    }

    public function right_staff_edit($id)
    {
        $edit_staff=DB::table('right_information_staff')
        ->select('*')
        ->where('id','=',$id)
        ->first();
        return view('admin.right_information_staff_edit',compact('edit_staff'));
    }
    public function staff_information_edit_process(Request $request)
    {
        $hidden_id=$request->hidden_id;
        $name=$request->name;
        
        $email=$request->email;
        $mobile=$request->mobile;
        $surename=$request->surename;
        $address=$request->address;
        $fax=$request->fax;
        $phone=$request->phone;
        $hidden_img=$request->hidden_img;
        $right_to_information_id=$request->right_to_information_id;

        $data=array(
            'name'=>$name,
            
            'email'=>$email,
            'mobile'=>$mobile,
            'surname'=>$surename,
            'address'=>$address,
            'fax'=>$fax,
            'phone'=>$phone,
            'image'=>$hidden_img,
            'right_to_information_id'=>$right_to_information_id,
            
        );
        if(!empty($request->image)) {
            $file = $request->image;
            $data['image'] = fileUpload($file,'image',((!empty($image)) ? $image->image : ''));
         }
         DB::table('right_information_staff')->where('id',$hidden_id)->update($data);
         return Redirect::back()->with(['message'=> 'Successfully Update!!']);  
    }
    public function right_staff_delete($id)
    {
        DB::table('right_information_staff')
        ->where('id','=',$id)
        ->delete();

        return Redirect::back()->with(['delete_message'=> 'Successfully Delete!!']);
    }

    // 27/01/2020

    
}
