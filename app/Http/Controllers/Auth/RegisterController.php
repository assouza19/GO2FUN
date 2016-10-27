<?php

namespace App\Http\Controllers\Auth;

use App\Models\Profile;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegister()
    {
        return view('auth.user.index');
    }

    public function getRegisterAd()
    {
        return view('auth.user.ad');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt( $data['password'] );
        $user->role = (isset($data['type']) ? $data['type'] : 'user');

        if( $user->save() ) {
            $fields = $this->fields();
            if( $user->role == 'ad' ) {
                unset( $fields['cpf'] );
                unset( $fields['news'] );

                array_push( $fields, $this->fieldsAd() );
            }
            $profile = new Profile();
            $profile->fields = json_encode($fields);

            return ($user->profile()->save( $profile ) ? true : false);
        } else {
            return false;
        }
    }

    public function fields()
    {
        return [
            'birth' => '',
            'genre' => '',
            'cpf' => '',
            'phone' => '',
            'address' => '',
            'cep' => '',
            'bairro' => '',
            'city' => '',
            'state' => '',
            'news' => '',
            'categories' => ''
        ];
    }

    public function fieldsAd()
    {
        return [
            'razao' => '',
            'cnpj' => ''
        ];
    }
}
