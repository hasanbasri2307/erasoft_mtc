<?php
namespace Erasoft\Libraries;

class CustomLib {

    public static function generate_error($params)
    {
        $view = view('error_notification')->with('error',$params)->render();
        return $view;
    } 
  
}