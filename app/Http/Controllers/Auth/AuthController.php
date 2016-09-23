<?php

namespace App\Http\Controllers\Auth;

use App\lands;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd("uuu");
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'Required|AlphaNum|min:6|Confirmed',
            'password_confirmation' => 'Required|AlphaNum|min:6'
        ]);
    }


    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        \DB::beginTransaction();
        $code = str_random(60);
        $user = new \App\User();
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->password = bcrypt($request->get("password"));
        $user->code = $code;
        $user->user_type_id=2;
        $user->save();

        $link = route('verify-user')."/".$code;
        \Mail::send('auth.emails.register', ['user' => $user,"link"=>$link], function ($m) use ($user) {
            $m->from('khatiwada4govinda@gmail.com', 'GY-Housing');

            $m->to($user->email, "$user->name")->subject('Please verify the link !');
        });
        \DB::commit();
        return view('auth.register-success');
    }

    public function verify($code){
        $user = \App\User::where('code','=',$code)->first();
        if(!empty($user)){
            $user->code ='';
            $user->save();

        }
        return view('auth.login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //die('asd');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


}
