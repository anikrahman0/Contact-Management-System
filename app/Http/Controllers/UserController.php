<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;
class UserController extends Controller
{

    public function getProfile(){

     return view ('myprofile');

    }
    public function edit($id)
    {

     $users = User::findOrFail($id);
     
     return view('useredit')->with('users',$users);
    }

   public function update(Request $request, $id)
    {
        $this->validate($request,
    [
      
        'email'  =>  "required|unique:users,email,$id",
        'name'=>"required|max:30|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/|unique:users,name,$id",
        'address' =>'nullable|max:36',
        'gender'=>'required',
        'phone' =>"required|regex:/^[0]?1[3456789][0-9]{8}\b/|unique:users,phone,$id",
       
         'date_of_birth' => 'required|date',
        ]);
    
        $p = User::findOrFail($id);
        $p->email = $request->get('email'); 
        $p->name = $request->get('name');
        $p->address = $request->get('address');   
        $p->gender = $request->get('gender'); 
        $p->phone = $request->get('phone');
        $p->date_of_birth = $request->get('date_of_birth'); 

        $p->save(); 
       return redirect()->route('user.myprofile')->with('success','Profile has been updated succesfully.');   
      }

      public function getuploadimage()
    {
        return view('up_profile_image');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateImage(Request $request)
    {
        request()->validate([

            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
       
    		$avatar = $request->file('profile_image');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/images/profile_images/' . $filename ) );

    		$user = Auth::user();
    		$user->profile_image = $filename;
    		$user->save();
    	

        return view('up_profile_image')->with( 'success','Image uploaded successfully',);

        
    }

      public function DeleteConfirm(){
    
 return redirect()->route('user.myprofile')->with('success2','Do You Really Want to Delete Your Account?');
    }

  public function Delete($id){
    User::destroy($id);
       
    return redirect()->route('user.signup')-> with('success', 'Your profile has been deleted.');
    }
   public function getChangePassword(){

     return view ('change_password');

}

public function postChangePassword(Request $request){

    $this->validate($request,
    [
      
        
        'current_password' =>'required|password',
        'new_password'=>'required|min:8',
        'confirm_new_password'=>'same:new_password'
    ]);

           User::find(auth()->user()->id)->update(['password'=> bcrypt($request->new_password)]);
return redirect()->route('user.myprofile')->with('success','Password succesfully changed.');  

   
    //  if(Auth::attempt(['email'=>$email,'password'=>$password_c]))
    //    {

    //    $p->password = bcrypt($password_n);  
    //    $p->confirm_password= bcrypt($password_cn); 
    //    $p->save(); 

      

    // }
    // else{

    //     return redirect()->back()->with('error','Current Password is Incorrect.');

    // }
    
        // $p = User::findOrFail($id);
         

        // $p->password = bcrypt($request->get('new_password'));   
        
        // $p->save(); 

    //  return redirect()->route('user.myprofile')->with('success','Password succesfully changed.');   


}


    public function getSignup(){
       return view('signup');
    }
    


    public function postSignup(Request $request){
    
    $this->validate($request,
    [
      
        'email'=>'required|email|unique:users',
        'name'=>'required|unique:users|max:30|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
        'gender'=>'nullable',
        'address' =>'nullable',
        'phone' => 'nullable',
        'profile_image'=>'nullable',
        // 'contact' =>'required||unique:users|regex:/^[0]?1[3456789][0-9]{8}\b/',
        'password' =>'required|min:8',
        'confirm_password' =>'same:password',
    ]);
    $user= new User;
    $user -> email = $request->input('email');
    $user -> name = $request->input('name');
    $user -> address = $request->input('address');
    $user -> password = bcrypt($request->input('password'));
    $user -> confirm_password = bcrypt($request->input('confirm_password'));

    $user->save();
   
    return redirect()->route('user.signin')->with('success','Account has been created successfully.');

    
    }

 

   public function getSignin(){
    return view('signin');
    }


   public function postSignin(Request $request){
    
    $this->validate($request,
    [
        'email'=>'required|email',
        'password' =>'required',  
    ]);

    if(Auth::attempt([ 'email' => $request->input('email'),'password' => $request->input('password')]))
    
    {
       
        return redirect()->route('user.mycontact');

    }
    else{

        return redirect()->back()->with('error','User credentials do not match');

    }

    }

    public function getContact(){

        return view('mycontact');
    }

    public function getLogout(){
  
    Auth::logout();

    return redirect()->route('user.signin');

  }
}
