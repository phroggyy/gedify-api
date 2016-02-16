<?php

namespace App\API\Sort\Requests;

/**
 * Class SortRequest
 * @package App\API\Sort\Requests
 */
class SortRequest extends Request
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
            'input' => 'array|required',
            'input.*' => 'numeric'
        ];
    }
}
