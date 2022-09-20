<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//models
use App\Models\User;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    //login
    public function login(){
        return view('login');
    }

    //logout
    public function logout(){

        //destroy all sessions
        session()->forget('name');
        session()->forget('id');
        session()->forget('image');

        //return to login page
        return view('login');
    } 

    //register
    public function register(){
        return view('register');
    }

     //dashboard
     public function dashboard(){

        //check the user session if false redirect to login page
        if (session()->get('id')) {
           
            //if true get all user register data
            $user_id = session()->get('id');
            $userRegisters = Register::where('user_id',$user_id)->orderByDesc('id')->get();

            //check the conditions(disable checkout until checkedin , checkin before 12pm , checkout after 12pm , working days) true = disabled the button / false enable the button

            //*disable checkout until checkedin
            //get the latest record
            $lastRecoed =  Register::latest()->first();
            $checkoutDisabled = ($lastRecoed->checkout == null)? false : true;
            $checkinDisabled3 = ($lastRecoed->checkout == null)? true : false;

            //*checkin before 12pm
            $currentTime = date("H:i:s" , strtotime(' + 3 hours'));
            $checkinDisabled = ($currentTime <= "11:59:59") ? false : true;
           

            //*checkout after 12pm
            $currentTime = date("H:i:s" , strtotime(' + 3 hours'));
            $checkoutDisabled2 = ($currentTime >= "12:00:00") ? false : true;

        //   dd($checkoutDisabled2);
           //* working days
           //get the today date day
           $todayDay = date('D');
           if ($todayDay == "Fri" || $todayDay == "Sat" ) {
            $checkoutDisabled3 = true;
            $checkinDisabled2 = true;
           } else {
            $checkoutDisabled3 = false;
            $checkinDisabled2 = false;
           }
           
           
           //check the checkout disabeled conditions
           $checkoutDisabled = ($checkoutDisabled || $checkoutDisabled2 || $checkoutDisabled3) ?  true : false;

             //check the checkin disabeled conditions
             $checkinDisabled = ($checkinDisabled || $checkinDisabled2 || $checkinDisabled3) ? true : false;

            
            return view('dashboard',compact('userRegisters','checkoutDisabled','checkinDisabled'));
        } else {
            //you must login first
            session()->put('error','You must login first!');
            return redirect()->route('login');       
         }
        
    }

     //profile
     public function profile(){

         //check the user session if false redirect to login page
         if (session()->get('id')) {
           
            //if true get all user register data
            $user_id = session()->get('id');
            $userInfo = User::find($user_id);

            return view('profile',compact('userInfo'));
        } else {
            //you must login first
            session()->put('error','You must login first!');
            return redirect()->route('login');       
         }

        return view('profile');
    }

    //update profile info
    public function updateProfile(Request $request){

        //get the user record
        $userID = session()->get('id');
        $user = User::find($userID);

        if (!empty($request->file('image'))) {
           //upload and save image
           $image = time() . '-' . $request->file('image')->getClientOriginalName();

           $request->file('image')->move(public_path('assets/usersImages/'), $image);
           $user->image = $image;

           //update image session
           session()->put('image', $image);
        }

       
        //update user's info
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        //update name session
        session()->put('name', $request->name);
        
        session()->put('success', 'Profile data updated successfully!');
        return redirect()->back();

    }

    //update password
    public function updatePassword(Request $request){

        //get the user record
        $userID = session()->get('id');
        $user = User::find($userID);

        //update user password (hashed)
        $user->password = Hash::make($request->password);
        
        $user->save();

        session()->put('success', 'Password updated successfully!');
        return redirect()->back();

    }
    //create user
    public function create(Request $request){

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $confirmpassword = $request->confirmpassword;
       
        //check confirm password
        if ($password == $confirmpassword) {

            //upload and save image
            $image = time() . '-' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(public_path('assets/usersImages/'), $image);
    
            //create user
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->phone = $phone;
            $user->password = Hash::make($password);
            $user->image = $image;

            //save data
            $user->save();

            //set session
            session()->put('name', $name);
            session()->put('id', $user->id);
            session()->put('image', $image);

            //redirect to dashboard
            return redirect()->route('dashboard')->with('success','Acount created successfully!');
           
        } else {
            //passwords not matched
            session()->put('error', 'Passwords doesn\'t match!');
            return redirect()->route('register');
            
        }
        
    }//end of register function

    //check login function
    public function checkLogin(Request $request){
          // email + password
          $email = $request->email;
          $password = $request->password;
  
  
          // get user using email
          $user = User::where('email', $email)->first();
  
  
          // if found then check password (he pass)
          if ($user && Hash::check($password, $user->password)) {
  
              // put permission (session) id + profile pic
              session()->put('name', $user->name);
  
              session()->put('id', $user->id);
              session()->put('image', $user->image);
  
              // redirect to dashboard
              return redirect()->route('dashboard');
  
          } // end of password correct
  
  
          // he don't pass
          else {
  
              //passwords not matched
              session()->put('error', 'Email or password not correct!');
              // redirect to login again
              return redirect('/');
  
          } //end of wrong password or user not found
    }

    //checkin function
    public function checkin(){

        $register = new Register();
        $register->user_id = session()->get('id');
        $register->date = date("Y-m-d", strtotime(' + 3 hours'));
        $register->checkin = date("Y-m-d H:i:s" , strtotime(' + 3 hours'));  

        //save data
        $register->save();

          //checked in successfully!
          session()->put('success', 'Checked IN successfully!');
          // redirect to login again
          return redirect('dashboard');

       
    }

     //checkin function
     public function checkout(){

        //get the last record to fill the checkout time
        $register =  Register::latest()->first();
        $register->checkout = date("Y-m-d H:i:s" , strtotime(' + 3 hours'));  

        //save data
        $register->save();

          //checked in successfully!
          session()->put('success', 'Checked OUT successfully!');
          // redirect to login again
          return redirect('dashboard');

       
    }
}
