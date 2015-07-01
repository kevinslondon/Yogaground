<?php
/**
 * @author Kevin Saunders
 * Date: 25/06/2015
 */

namespace app\Http\Requests;


class ContactFormRequest extends Request {

    public function rules()
    {
        return [
            'name' =>'required',
            'email' => 'required|email'
        ];
    }

}