<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
{
    protected function getValidatorInstance()
    {
        $data = $this->all();
        //@todo refactor name
        $inputKeys = array_flip(array_keys($data));
        foreach($inputKeys as $key=>$value){
            $inputKeys[$key] = 'trim|strtolower|remove_tags';
        }
        app()->make('sanitizer')->sanitize($inputKeys, $data);
        $this->getInputSource()->replace($data);
        /*modify data before send to validator*/
        return parent::getValidatorInstance();
    }

}
