<?php
/**
 * Created by PhpStorm.
 * User: Muhammad ali
 * Date: 6/21/2018
 * Time: 1:27 PM
 */

namespace App\Library\Services;


class MySanitizer
{
    public function removeTag($value)
    {
        return strip_tags($value);
        /*
        $tag=false;
        $sanitized="";
        for ($x = 0; $x <= (strlen($value)-1); $x++) {
            if($tag==false)
            {
                if($value[$x]=="<")
                {
                    $tag=true;
                }
                else
                {
                    $sanitized=$sanitized.$value[$x];
                }
            }
            else if ($tag==true)
            {
                if($value[$x]==">")
                {
                    $tag=false;
                }
            }
        }
        //dd($sanitized);
        return $sanitized;*/
    }

}