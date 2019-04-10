<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PagesRequest extends FormRequest
{


    public function rules()
    {

        return [
            'url' => 'required|string|max:255',
        ];
    }






}