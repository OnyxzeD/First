<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class UserFormRequest
 *
 * @package App\Http\Requests\User
 */
class UserFormRequest extends Request
{

    /**
     * @var array
     */
    protected $attrs = [
        'name'     => 'Name',
        'email'    => 'Email',
        'password' => 'Password',
        'address'  => 'Address',
        'phone'    => 'Phone',
        'level'    => 'Level',
        'role'     => 'Role',

    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:100|min:5',
            'email'    => 'required|email|max:100|min:4',
            'password' => 'required|max:100',
            'address'  => 'required|max:100',
            'phone'    => 'required|numeric|max:100000000000',
            'level'    => 'required|max:20',
            'role'     => 'required|max:100',
        ];
    }

    /**
     * @param $validator
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

    /**
     * @param Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();
        return [
            'success'    => false,
            'validation' => [
                'name'     => $message->first('name'),
                'email'    => $message->first('email'),
                'password' => $message->first('password'),
                'address'  => $message->first('address'),
                'phone'    => $message->first('phone'),
                'level'    => $message->first('level'),
                'role'     => $message->first('role'),

            ]
        ];
    }
}
