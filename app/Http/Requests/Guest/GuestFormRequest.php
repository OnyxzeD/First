<?php

namespace App\Http\Requests\Guest;

use App\Http\Requests\Request;

/**
 * Class GuestFormRequest
 *
 * @package App\Http\Requests\Guest
 */
class GuestFormRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|max:20|min:5',
            'phone'   => 'required|max:12|min:12',
            'email'   => 'required|email',
            'message' => 'required|min:10',

        ];
    }
}
