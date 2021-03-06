<?php

namespace papusclub\Http\Controllers\Auth;

use papusclub\User;
use Validator;
use papusclub\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    /*protected $redirectTo = '/socio';*/

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        /*$this->middleware('guest', ['except' => 'getLogout']);*/
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectPath()
    {
        switch (\Auth::user()->perfil_id) {
            case '1':
            return '/socio';
            break;
            case '2':
            return '/admin-general';
            break;
            case '3':
            return '/admin-pagos';
            break;
            case '4':
            return '/admin-registros';
            break;
            case '5':
            return '/gerente';
            break;
            case '6':
            return '/admin-persona';
            break;
            case '7':
            return '/admin-reserva';
            break;
            case '8':
            return '/public';
            break;
        }
    }
}

    