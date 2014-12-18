<?php 

class UserController extends BaseController
{   
    public function authenticate()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $new_user = Input::get('new_user', 'off');
        
        $data = array('email' => $email, 'password' => $password);
        
        if( $new_user == 'on' ) 
        {
            $rules = array('email' => 'required|email|unique:users',
                           'password' => 'required'
                     );
            
            $valid = Validator::make($data, $rules);
            
            if ($valid->fails())
            {
                return Redirect::to('/')->withErrors($valid);
            }
            
            try
            {
                $user = new User();
                $user->email = $email;
                $user->password = Hash::make($password);
                $user->save();
                
                $profile = new User_Profile;
                $profile->name = 'Blank';
                $profile->profile_bio = 'Blank';
                $profile->user_id = Auth::user()->id;
                $profile->save();
        
                Auth::login($user);
             
                return Redirect::to('photopage');
            }
            
            catch (Exception $e)
            {
                return Redirect::to('home')->withErrors($e);
            }
        }
             
        else 
        {
            $rules = array('email' => 'required|email|exists:users',
                           'password' => 'required'
                     );
            
            $valid = Validator::make($data, $rules);
            
            if ($valid->fails())
            {
                return Redirect::to('/')->withErrors($valid);
            }
            
            $credentials = array(
                'email' => $email,
                'password' => $password
            );
            
            if(Auth::attempt($credentials)) 
            {
                return Redirect::to('photopage');
            } 
            
            else 
            {
                return Redirect::to('/')->withErrors('Authentication failed');
            }
        }
    }
    
    public function logoff()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function editProfile()
    {
        $name = Input::get('name');
        $bio = Input::get('bio');
        
        $profile = User_Profile::find(Auth::user()->id);
        
        $profile->name = $name;
        $profile->profile_bio = $bio;
        $profile->save();
        
        return Redirect::to('photopage');
    }
}
