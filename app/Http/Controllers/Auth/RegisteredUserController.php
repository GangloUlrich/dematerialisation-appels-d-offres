<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

      
        if($request->res==1){

            $validator = $request->validate( [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'tel' => 'required|string',
                'conditions' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ]);


            $user = User::create([         
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tel'=>$request->tel,
                'type'=> 'c_individuel',
            ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(RouteServiceProvider::HOME);


        }
        
        if($request->res==2){     
            $validator = $request->validate( [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'tel' => 'required|string',
                'type' => 'required',
                'conditions' => 'required',
                'logo' => 'required',
                // 'g-recaptcha-response' => 'required|captcha',
            ]);

            if($request->type=='s_privee'){
                $validator2 = $request->validate([
                    'ifu'=>'required|digits:13',
                    'rccm'=>'required',
                ]);                
            }
            
          
            
            if($request->hasFile('logo')){
                $destinationPath = public_path()."/img/";
                $fileimage = $request->logo;
                $nom_file = time()."_".$fileimage->getClientOriginalExtension();            
                $fileimage->move($destinationPath , $nom_file);
                
            }
            

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' =>$request->type,
                'logo_path'=>$nom_file,
                'tel'=>$request->tel,
                'num_ifu' => $request->ifu,
                'num_rccm' => $request->rccm,
             ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(RouteServiceProvider::HOME);

        } 
    }
}
