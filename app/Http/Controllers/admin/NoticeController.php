<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Notice;
Use DB;

class NoticeController extends Controller
{
    //
    public function notice(Request $request, $id = null)  {

      $data['notices'] = Notice::orderBy('id', 'desc')->paginate(env('PAGINATE_MEDIUM'));

      $data['notice'] = new Notice();

      // update query
      if(!empty($id)) {
          $data['notice'] = Notice::find($id);

          if (isset($data['notice'])){

            return view('admin.notice',$data);

         }else {

            return  redirect()->route('noticeadmin');
         }
      }

      
      return view('admin.notice', $data);
    }



    public function noticeInsertUpdate(Request $request){

      $data = [
          'notice_tittle'=>$request->notice_tittle,
      ];



      $required['notice_tittle'] = 'required';

      if(empty($request->edit_id)) {
          $required['notice_file'] = 'required |  mimes:pdf,jpeg,png,jpg,doc,docx | max:5000';
      }
      
      $request->validate($required);


      if(!empty($request->notice_file)) {
          $file = $request->notice_file;
          $notice_file = DB::table('notices')->where('id',$request->edit_id)->first();

          $data['notice_file'] = fileUpload($file,'notice_file',((!empty($notice_file)) ? $notice_file->notice_file : ''));
      }

      if(!empty($request->edit_id)) {
          DB::table('notices')->where('id',$request->edit_id)->update($data);
      } else {
          DB::table('notices')->insert($data);
      }
    
      return redirect()->Route('noticeadmin')->with(['message'=> 'Successfully insert!!']);
  }


  public function noticedelete($id){

    $item = Notice::find($id);

    if(!empty($item->notice_file) && file_exists(public_path().'/upload/'.$item->notice_file)) {
        unlink(public_path().'/upload/'.$item->notice_file);
    }

    $item->delete();

    return redirect()->Route('noticeadmin')->with(['delete_message'=> 'Successfully deleted!!']);
  }

}
