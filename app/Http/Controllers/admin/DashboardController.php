<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use DB;
use Hash;

class DashboardController extends Controller
{
    //

    
    Public function dashboard(){

        $data['news']=  DB::table('news')->count();
        $data['notice']=  DB::table('notices')->count();
        $data['photo']=  DB::table('photos')->count();
        $data['video']=  DB::table('videos')->count();
        //$data['job']=  DB::table('jobs')->count();

        return view('admin.dashboard',$data);

    }


    public function author(Request $request, $id = null)  {

  
        $data['author_data'] = User::first();
        
        return view('admin.author', $data);
      }

      public function authorUpdate(Request $request){

        $data['user'] = new User();

        $user = auth()->user();

        $data = [
            
            'name'=>$request->name
        ];

        $required['name'] = 'required';

        if(empty($request->edit_id)){

            $required['user_image'] = 'required | image | max:1500';
        }
        
        
        
        $request->validate($required);



        if(!empty($request->user_image)) {
            $file = $request->user_image;
            $user_image = DB::table('users')->where('id', $user->id)->first();

            $data['user_image'] = fileUpload($file,'user_image',((!empty($user_image)) ? $user_image->user_image : ''));
        }


        if(!empty($user->id)) {
            DB::table('users')->where('id',$user->id)->update($data);
        } else {
            return redirect()->back()->with(['error'=> 'failed to update profile  !!']);
        }

            return redirect()->Route('author')->with(['success'=> 'Success to update profile ']);

      }

      




      public function changePassword(Request $request, $id = null)  {

        $data['user'] = new User();

        $user = auth()->user();

        $old_pass_find = $user->password;

        //dd($old_pass_find);

        $data = [
            
            'password'=>bcrypt($request->new_pass)
        ];


        $old_pass = $request->old_pass;

         // update query
        if (Hash::check($old_pass, $old_pass_find)) {

            DB::table('users')->where('id', $user->id)->update($data);
       
            return redirect()->Route('author')->with(['message'=> 'Successfully password update!!']);

        }else{

            return redirect()->Route('author')->with(['error'=> 'old password increate!!']);
        }
       
       
      }

      

  
}
