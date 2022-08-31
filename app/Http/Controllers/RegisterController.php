<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
// use Illuminate\Contracts\Auth\Registrar;

use App\Models\User;
 
class RegisterController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    // protected $registrar;
    protected $auth;

    public function postRegistration()
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>  ['required', 'string', 'min:3', 'confirmed']
        ]);

        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');
    }

    
   
}