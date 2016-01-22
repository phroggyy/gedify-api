<?php

namespace App\API\Strings\Requests;

class ReverseRequest extends Request
{
    /**
     * Is the client allowed to make this request?
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Returns the validation rules for the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'input' => 'required|min:1'
        ];
    }
}