<?php

function fileUpload($file,$main_file_path,$existingFile=null) {

   $file_path = public_path().STORAGE_PATH;

   // delete folder
   if(!empty($existingFile) && file_exists($file_path.'/'.$existingFile)) {
      unlink($file_path.'/'.$existingFile);
   }

   $file_path = $file_path.$main_file_path;

   // make folder
   if (!file_exists($file_path)) {
      mkdir($file_path, 0777, true);
   }

   $name = md5(uniqid()).'.'.$file->getClientOriginalExtension();
   $file->move($file_path, $name);

   return '/'.$main_file_path.'/'.$name;

}

function imageShow($image) {
   return STORAGE_PATH.$image;
}

$count = 0;


function current_page($url){

	return request()->path() == $url;
}
