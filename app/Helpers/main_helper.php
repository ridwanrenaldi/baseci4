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
?>