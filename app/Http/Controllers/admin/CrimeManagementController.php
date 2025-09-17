<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CrimeManagement;
Use DB;

class CrimeManagementController extends Controller
{
    //

    Public function crimeManagement(Request $request, $id = null){

        $data['crime_managements'] = CrimeManagement::orderBy('id', 'desc')->paginate(env('PAGINATE_SMALL'));

        $data['crime_management'] = new CrimeManagement();

      // update query
      if(!empty($id)) {
        $data['crime_management'] = CrimeManagement::find($id);

        if (isset($data['crime_management'])){

            return view('admin.crime_management',$data);

         }else {

            return  redirect()->route('crimeManagementadmin');
         }
     }

        return view('admin.crime_management',$data);

    }




    public function crimeManagementInsertUpdate(Request $request)
    {
        if($request->has('monthly_crime_management')){

            $data = [
                'range'=>$request->range,
                'speedy_trail'=>$request->speedy_trail,
                'dacoity'=>$request->dacoity,
                'robbery'=>$request->robbery,
                'murder'=>$request->murder,
                'police_assault'=>$request->police_assault,
                'burglary'=>$request->burglary,
                'theft'=>$request->theft,
                'others_cases'=>$request->others_cases,
                //'total_cases'=>$request->total_cases,
                'month'=>$request->month,
                'year'=>$request->year,
                'riot'=>$request->riot,
                'women_repression'=>$request->women_repression,
                'child_repression'=>$request->child_repression,
                'kidnapping'=>$request->kidnapping,
                'arms_act'=>$request->arms_act,
                'explosive'=>$request->explosive,
                'narcotics'=>$request->narcotics,
                'smuggling'=>$request->smuggling,
                //'total'=>$request->total,
            ];
    
            $request->validate([
                'range' => 'required',
                'speedy_trail' => 'required',
                'dacoity' => 'required',
                'robbery' => 'required',
                'murder' => 'required',
                'police_assault' => 'required',
                'burglary' => 'required',
                'theft' => 'required',
                'others_cases' => 'required',
                //'total_cases' => 'required',
                'month' => 'required',
                'year' => 'required',
                'riot' => 'required',
                'women_repression' => 'required',
                'child_repression' => 'required',
                'kidnapping' => 'required',
                'arms_act' => 'required',
                'explosive' => 'required',
                'narcotics' => 'required',
                'smuggling' => 'required',
                //'total' => 'required'
            ]);

            if(!empty($request->edit_id)) {
                DB::table('crime_managements')->where('id',$request->edit_id)->update($data);
            } else {
    
              DB::table('crime_managements')->insert($data);
            }
        }

      
        return redirect()->back()->with(['message'=> 'Successfully insert!!']);
    }

    public function crimeManagementDelete($id)
    {
            CrimeManagement::find($id)->delete();

            return redirect()->back()->with(['delete_message'=> 'Successfully deleted!!']);
    }

}
