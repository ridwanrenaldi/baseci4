<?php
    if(!function_exists('ListHtml')){

        function ListHtml($array, $start='', $end=''){
            if (!is_array($array)) {
                $array = [$array];
            }
            
            $ulist = $start;
            foreach ($array as $key => $value) {
                $ulist .= '<li>'.$value.'</li>';
            }
            $ulist .= $end;
            
            return $ulist;
        }
    }

    if (!function_exists("delete_file")) {
        function delete_file($path){
          if (!is_dir($path) && file_exists($path)) {
            unlink($path);
            $response = array(
              'status' => 'success',
              'message' => 'File deleted successfully',
            );
          } else {
            $response = array(
              'status' => 'error',
              'message' => 'File doesn\'t exist'
            );
          }
          return $response;
        }
    }
?>