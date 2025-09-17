<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Homepage;
use DB;

class HomePageController extends Controller
{
    //

    Public function homepage(){

        $data['homepage'] = new Homepage();

        // update query
        $id=1;
        $data['homepage'] = Homepage::find($id);
        

        return view('admin.homepage',$data);

    }




    public function homepageUpdate(Request $request){

        
        if ($request->has('emergency')) {

            $data = [
                'emergency_tittle'=>$request->emergency_tittle,
            ];
      
            DB::table('homepages')->update($data);
          }


        if ($request->has('logo_submit')) {

            if(!empty($request->logo_upload)) {

                $file = $request->logo_upload;
                $logo_upload = DB::table('homepages')->first();
                $data['logo_upload'] = fileUpload($file,'homepage',((!empty($logo_upload)) ? $logo_upload->logo_upload : ''));
                DB::table('homepages')->update($data);
            }

            if(!empty($request->logo_background_image)) {

                $file = $request->logo_background_image;
                $logo_background_image = DB::table('homepages')->first();
                $data['logo_background_image'] = fileUpload($file,'homepage',((!empty($logo_background_image)) ? $logo_background_image->logo_background_image : ''));
                DB::table('homepages')->update($data);
            }

        DB::table('homepages')->update($data);

        }




          if ($request->has('kmp_history_misson')) {

            $data = [
                'kmp_history'=>$request->kmp_history,
                'kmp_mission'=>$request->kmp_mission,
                'kmp_vision'=>$request->kmp_vision,
                
            ];

          /*  $request->validate([
                'acknowledgement_content' => 'required|max:250',
                'acknowledgement_name' => 'required',
                'acknowledgement_designation' => 'required',
            ]);*/

            DB::table('homepages')->update($data);
          }

          if ($request->has('kmp_history_misson')) {

            $data = [
                'kmp_history'=>$request->kmp_history,

                
            ];

            DB::table('homepages')->update($data);
          }



          
          if ($request->has('kmp_history_misson')) {

            $data = [
                'kmp_history'=>$request->kmp_history,
                'kmp_mission'=>$request->kmp_mission,
                'kmp_vision'=>$request->kmp_vision,
                
            ];

            DB::table('homepages')->update($data);
          }



          if ($request->has('social_media')) {

            $data = [
                'facebook_link'=>$request->facebook_link,
                'twitter_link'=>$request->twitter_link,
                'youtube_link'=>$request->youtube_link,
                
            ];

            DB::table('homepages')->update($data);
          }



          if ($request->has('comissoner')) {

            $data = [
                'comissoner_name'=>$request->comissoner_name,
                'biography_of_comissoner'=>$request->biography_of_comissoner,
                'message_from_comissoner'=>$request->message_from_comissoner,
            ];

            if(!empty($request->comissoner_image)) {

                 $file = $request->comissoner_image;
                 $comissoner_image = DB::table('homepages')->first();
                 $data['comissoner_image'] = fileUpload($file,'homepage',((!empty($comissoner_image)) ? $comissoner_image->comissoner_image : ''));
                 DB::table('homepages')->update($data);
            }

            DB::table('homepages')->update($data);

          }
          //dd($data);



          return redirect()->Route('homepage')->with(['message'=> 'Successfully update!!']);
        }












    public function insertUpdate(Request $request)
    {
        $data = [
            'news_tittle'=>$request->news_tittle,
            'news_image'=>$request->news_image,
            'news_description'=>$request->news_description
        ];


        if(!empty($request->edit_id)) {
            DB::table('news')->where('id',$request->edit_id)->update($data);
        } else {
            DB::table('news')->insert($data);
        }


      
        return redirect()->Route('news')->with(['message'=> 'Successfully insert!!']);
    }



}
