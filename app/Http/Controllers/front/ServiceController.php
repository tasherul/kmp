<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Service;
use App\Model\Setting;
use DB;


class ServiceController extends Controller
{
    //

    public function comunityPolicing(){
        $data['comunitypolicing'] = Service::wherenotnull('conceptual_frame_work')->get()->first();
        
        return view('front.comunity_policing',$data);
    }


    public function policeActivities(){
        $data['policeactivities'] = Service::wherenotnull('police_activities_abstarct')->get()->first();

        return view('front.police_activities',$data);
    }


    public function moneyEscort(){
        $data['money_escort'] = Service::where('more_service', 'Money Escort')->get()->first();

        return view('front.money_escort',$data);
    }
    public function beat_polising(){
        $data['beat_policing'] = Setting::wherenotnull('beat_policing')->get()->first();

        return view('front.beat_policing',$data);
    }
    public function kmp_units(){
        $City=DB::table('visitor_count')
        ->where('office_name','=','City Special Branch (CSB), KMP')
        ->select('*')->get();

        $Commissioner=DB::table('visitor_count')
        ->where('office_name','=',"Commissioner's Office, KMP")
        ->select('*')->get();

        $North=DB::table('visitor_count')
        ->where('office_name','=',"North Division, KMP")
        ->select('*')->get();

        $Headquarter=DB::table('visitor_count')
        ->where('office_name','=',"Headquarter Division, KMP")
        ->select('*')->get();

        $South=DB::table('visitor_count')
        ->where('office_name','=',"South Division, KMP")
        ->select('*')->get();

        $Detective=DB::table('visitor_count')
        ->where('office_name','=',"Detective Branch (DB), KMP")
        ->select('*')->get();

        $Riot=DB::table('visitor_count')
        ->where('office_name','=',"Riot COntrol Division (RCD), KMP")
        ->select('*')->get();

        $Traffic=DB::table('visitor_count')
        ->where('office_name','=',"Traffic Division, KMP")
        ->select('*')->get();

        $Prosecution=DB::table('visitor_count')
        ->where('office_name','=',"Prosecution Division, KMP")
        ->select('*')->get();
        

        return view('front.kmp_units',compact('City','Commissioner','Prosecution','Traffic','Riot','Detective','South','Headquarter','North'));
    }


    public function policeVerification(){
        $data['police_verification'] = Service::where('more_service', 'Police Verification')->get()->first();

        return view('front.police_verification',$data);
    }


    public function protection(){
        $data['protection'] = Service::where('more_service', 'Protection & Protocol')->get()->first();

        return view('front.protection',$data);
    }



    public function victimSupport(){
        $data['victim_support'] = Service::where('more_service', 'Victim Support')->get()->first();

        return view('front.victim_support',$data);
    }

    public function traffic(){
        $data['traffic'] = Service::where('more_service', 'Traffic Management')->get()->first();

        return view('front.traffic',$data);
    }

    public function infoDesk(){
        $data['act'] = Service::wherenotnull('information_act')->get()->first();
        $data['info_desk_1'] = Service::where('select_point', 'দায়িত্বপ্রাপ্ত কর্মকর্তা')->get()->first();
        $data['info_desk_2'] = Service::where('select_point', 'বিকল্প দায়িত্বপ্রাপ্ত কর্মকর্তা')->get()->first();

        return view('front.info_desk',$data);
    }

}
