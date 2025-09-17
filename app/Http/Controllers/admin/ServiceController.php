<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use DB;

class ServiceController extends Controller
{
    //
    public function service1(Request $request, $id = null)  {

        $data['community_policings'] = Service::whereNotNull('conceptual_frame_work')->get();

        $data['community_policing'] = new Service();

        // update query
        if(!empty($id)) {
            $data['community_policing'] = Service::find($id);
        }

        
        $data['more_services'] = Service::whereNotNull('more_service')->paginate(env('PAGINATE_MEDIUM'));

        $data['more_service'] = new Service();

        // update query
        if(!empty($id)) {
            $data['more_service'] = Service::find($id);

            if (isset($data['more_service'])){

                return view('admin.service1',$data);
    
             }else {
    
                return  redirect()->route('service1');
             }
        }
        
        return view('admin.service1',$data);
    }


    public function service2(Request $request, $id = null)  {

        $data['police_activities'] = Service::whereNotNull('police_activities_abstarct')->get();

        $data['police_activitie'] = new Service();

        // update query
        if(!empty($id)) {
            $data['police_activitie'] = Service::find($id);
        }


        //act
        $data['acts'] = Service::whereNotNull('information_act')->get();

        $data['act'] = new Service();

        // update query
        if(!empty($id)) {
            $data['act'] = Service::find($id);
        }



        //Info desks
        $data['info_desks'] = Service::whereNotNull('select_point')->paginate(env('PAGINATE_MEDIUM'));

        $data['info_desk'] = new Service();

        // update query
        if(!empty($id)) {
            $data['info_desk'] = Service::find($id);

            if (isset($data['info_desk'])){

                return view('admin.service2',$data);
    
             }else {
    
                return  redirect()->route('service2');
             }
        }


        
        return view('admin.service2', $data);
    }


    //insert update
    public function serviceInsertUpdate1(Request $request)
    {
        if($request->has('community_polic')){

            $data = [
                'conceptual_frame_work'=>$request->conceptual_frame_work,
                'community_policing_consists'=>$request->community_policing_consists,
                'bangladesh_perspective'=>$request->community_policing,
                'community_policing'=>$request->community_policing,
                'image_service'=>$request->image_service,
            ];

            $required['conceptual_frame_work'] = 'required';
            $required['community_policing_consists'] = 'required';
            $required['bangladesh_perspective'] = 'required';
            $required['community_policing'] = 'required';
            $required['image_service'] = 'required';

            
            $request->validate($required);

            if(!empty($request->image_service)) {
            $file = $request->image_service;
            $image_service = DB::table('services')->where('id',$request->edit_id)->first();

            $data['image_service'] = fileUpload($file,'image_service',((!empty($image_service)) ? $image_service->image_service : ''));
            // print_r($data['slider_image']);
        }

            if(!empty($request->edit_id)) {
                DB::table('services')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);

                //DB::table('services')->insert($data);
            }
        }


        if($request->has('more_service_content')){

            $data = [
                'more_service'=>$request->more_service,
                'image_service'=>$request->image_service,
                'service_content'=>$request->service_content,
            ];

$required['more_service'] = 'required | in:Money Escort,Police Verification,Protection & Protocol,Victim Support,Traffic Management';
            $required['image_service'] = 'required';
            $required['service_content'] = 'required';

            
            $request->validate($required);
            
            if(!empty($request->image_service)) {
            $file = $request->image_service;
            $image_service = DB::table('services')->where('id',$request->edit_id)->first();

            $data['image_service'] = fileUpload($file,'image_service',((!empty($image_service)) ? $image_service->image_service : ''));
            // print_r($data['slider_image']);
        }



            if(!empty($request->edit_id)) {
                DB::table('services')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);
                
                //DB::table('services')->insert($data);
            }
        }

        return redirect()->Route('service1')->with(['message'=> 'Successfully insert!!']);
    }


    public function serviceInsertUpdate2(Request $request)
    {
        if($request->has('police_activities')){

            $data = [
                'police_activities_abstarct'=>$request->police_activities_abstarct,
                'crime_management'=>$request->crime_management,
                'internal_security'=>$request->internal_security,
                'social_integration'=>$request->social_integration,
                'performing_internationally'=>$request->performing_internationally,
            ];
            
            $required['police_activities_abstarct'] = 'required';
            $required['crime_management'] = 'required';
            $required['internal_security'] = 'required';
            $required['social_integration'] = 'required';
            $required['performing_internationally'] = 'required';

            
            $request->validate($required);



            if(!empty($request->edit_id)) {
                DB::table('services')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);
              
                //DB::table('services')->insert($data);
            }
        }


        if($request->has('act')){

            $data = [
                'information_act'=>$request->information_act,
            ];

            $required['information_act'] = 'required';
            
            $request->validate($required);
        

            if(!empty($request->edit_id)) {
                DB::table('services')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);
              
                //DB::table('services')->insert($data);

            }
        }




        if($request->has('info_desk')){

            $data = [
                //'information_act'=>$request->information_act,
                'select_point'=>$request->select_point,
                'name'=>$request->name,
                'bp_no'=>$request->bp_no,
                'designation'=>$request->designation,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'range_address'=>$request->range_address,
            ];

            $required['select_point'] = 'required';
            $required['name'] = 'required';
            $required['bp_no'] = 'required';
            $required['designation'] = 'required';
            $required['mobile'] = 'required';
            $required['email'] = 'required | email';
            $required['range_address'] = 'required';

            
            $request->validate($required);
        
        

            if(!empty($request->edit_id)) {
                DB::table('services')->where('id',$request->edit_id)->update($data);
            } else {

                return redirect()->back()->with(['delete_message'=> 'Only Data updated. not inserted!!']);
               // DB::table('services')->insert($data);
            }
        }

        return redirect()->Route('service2')->with(['message'=> 'Successfully insert!!']);
    }


    public function serviceDelete($id)
    {

        $item = Service::find($id);

        $item->delete();

        return redirect()->back()->with(['delete_message'=> 'Successfully deleted!!']);
    }


}
