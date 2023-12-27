<?php
namespace App\Helpers;

class Timezones {
    public static $data = NULL;

    public static function build(){
        self::$data=[];
        $tz=timezone_identifiers_list();
        for($i=0; $i<count($tz); $i++) {
            self::$data[$tz[$i]]="(".self::offsetUTC($tz[$i]).") ".self::display_name($tz[$i]);
        }
    }

    public static function offsetUTC($timezone){
        $current   = timezone_open($timezone);
        $utcTime  = new \DateTime('now', new \DateTimeZone('UTC'));
        $offsetInSecs =  $current->getOffset($utcTime);
        $hoursAndSec = gmdate('H:i', abs($offsetInSecs));
        return stripos($offsetInSecs, '-') === false ? "+{$hoursAndSec}" : "-{$hoursAndSec}";
    }

    public static function display_name($str){
        $str=str_replace("_"," ",$str);
        $str=str_replace("St","St.",$str);
        $str=str_replace("/",", ",$str);
        return $str;
    }

    public static function all(){
        if(self::$data===NULL)
            self::build();
        return self::$data;
    }
}
?>