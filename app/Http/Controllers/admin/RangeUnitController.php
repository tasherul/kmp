<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Rangeunit;
use DB;


class RangeUnitController extends Controller
{
    //

    public function rangeUnit(Request $request, $id = null){


        //Range Unit History

        $data['rangeunits_historys'] = Rangeunit::wherenotnull('range')->paginate(env('PAGINATE_LARGE'));

        $data['rangeunits_history'] = new Rangeunit();

        // update query
        if(!empty($id)) {
            $data['rangeunits_history'] = Rangeunit::find($id);
            
        }



        //Range Unit Staff

        $data['rangeunits'] = Rangeunit::wherenotnull('staff_range')->paginate(env('PAGINATE_LARGE'));

        $data['rangeunit'] = new Rangeunit();

        // update query
        if(!empty($id)) {
            $data['rangeunit'] = Rangeunit::find($id);

            if (isset($data['rangeunit'])){

                return view('admin.range_unit',$data);
    
             }else {
    
                return  redirect()->route('rangeUnit');
             }

        }

        
        return view('admin.range_unit',$data);

    }



    //insert update
    public function rangeUnitInsertUpdate(Request $request)
    {
        if($request->has('range_unit_history')){

            $data = [
                'range'=>$request->range,
                'history'=>$request->history,
            ];



            $required['range'] = 'required';
            $required['history'] = 'required';

            if(empty($request->edit_id)) {
                $required['range_image'] = 'required |  image | max:1500';
            }
            
            $request->validate($required);


                
            if(!empty($request->range_image)) {
                $file = $request->range_image;
                $range_image = DB::table('rangeunits')->where('id',$request->edit_id)->first();

                $data['range_image'] = fileUpload($file,'range_image',((!empty($range_image)) ? $range_image->range_image : ''));
            }

            
    
            if(!empty($request->edit_id)) {
                DB::table('rangeunits')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);


              //DB::table('rangeunits')->insert($data);
            }
        }




        if($request->has('range_unit_staff')){

            $data = [
                'staff_range'=>$request->staff_range,
                'staff_name'=>$request->staff_name,
                'staff_designation'=>$request->staff_designation,
                'staff_contact'=>$request->staff_contact
            ];

    
            $required['staff_range'] = 'required|in:Khulna Sadar,Sonadangha,Khalishpur,Daulatpur,Khanjahan Ali,Labanchora,Horintana,Aranghata';
            $required['staff_name'] = 'required';
            $required['staff_designation'] = 'required';
            $required['staff_contact'] = 'required';

            if(empty($request->edit_id)) {
                $required['range_unit_staff_image'] = 'required |  image | max:1500';
            }
            
            $request->validate($required);



            if(!empty($request->range_unit_staff_image)) {
                $file = $request->range_unit_staff_image;
                $range_unit_staff_image = DB::table('rangeunits')->where('id',$request->edit_id)->first();
    
                $data['range_unit_staff_image'] = fileUpload($file,'range_unit_staff_image',((!empty($range_unit_staff_image)) ? $range_unit_staff_image->range_unit_staff_image : ''));
            }
          
    
            if(!empty($request->edit_id)) {
                DB::table('rangeunits')->where('id',$request->edit_id)->update($data);
            } else {
              DB::table('rangeunits')->insert($data);
            }
        }

      
        return redirect()->Route('rangeUnit')->with(['message'=> 'Successfully insert!!']);
    }


    public function rangeUnitDelete($id)
    {

       $item = Rangeunit::find($id);

        if(!empty($item->range_image) && file_exists(public_path().'/upload/'.$item->range_image)) {
            unlink(public_path().'/upload/'.$item->range_image);
         }

         if(!empty($item->range_unit_staff_image) && file_exists(public_path().'/upload/'.$item->range_unit_staff_image)) {
            unlink(public_path().'/upload/'.$item->range_unit_staff_image);
         }


         $item->delete();

        return redirect()->route('rangeUnit')->with(['delete_message'=> 'Successfully deleted!!']);
    }
}
