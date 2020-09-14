<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShareContact;
use App\Contact;
use Auth;
use Image;
class ContactController extends Controller
{
    public function newContact(){

        return view('add_new_contact');
    }
    
       public function showContact(){
  
        $contact = auth()->user()->contacts()->orderBy('id', 'DESC')->get();

       return view('mycontact')->with(
        [
              'contact'=>$contact,
            
        ]
    );
   }


    public function storeContact(Request $request){
  
    $this->validate($request,
    [
      
        'email'=>'required|email',
        'name'=>'required|max:30|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
        'gender'=>'required',
        'address' =>'nullable',
        'phone' =>'required||unique:contacts|regex:/^[0]?1[3456789][0-9]{8}\b/',
        
    ]);
    $contact= new Contact;
    $contact -> email = $request->input('email');
    $contact -> name = $request->input('name');
    $contact -> gender = $request->input('gender');
    $contact -> address = $request->input('address');
    $contact -> phone = $request->input('phone');
  
  
    $contact = auth()->user()->contacts()->save( $contact);
   
    return redirect()->route('user.mycontact')->with('success','New Contact has been  added successfully.');


   }

    public function destroy($id)
    {

        Contact::destroy($id);
       
        
        return redirect()->route('user.mycontact')-> with('success', 'Contact has been removed successfully.');
    }

    public function edit($id)
    {
     $contact = Contact::findOrFail($id);
     
     return view('contactedit')->with('contact',$contact);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
        'email'  =>  "required|unique:users,email,$id",
        'name'=>"required|max:30|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/",
        'address' =>'nullable|max:36',
        'gender'=>'required',
        'phone' =>"required|regex:/^[0]?1[3456789][0-9]{8}\b/|unique:contacts,phone,$id",
        
        ]);
    
        $p = Contact::findOrFail($id);
        $p->email = $request->get('email'); 
        $p->name = $request->get('name');
        $p->address = $request->get('address');   
        $p->gender = $request->get('gender'); 
        $p->phone = $request->get('phone');
       
        $p->save(); 
       return redirect()->route('user.mycontact')->with('success','Contact has been updated succesfully.');   
      }


      public function getuploadimage($id)
    {
        $contact =Contact::findOrFail($id);
         return view('up_contact_image')->with('contact',$contact);
    }
    

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateImage(Request $request, $id)
    {
        request()->validate([

            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
            $contact = Contact::findOrFail($id);
    		$avatar = $request->file('profile_image');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/images/contact_images/' . $filename ) );
            $contact->profile_image = $filename; 
            $contact->save();
           
            return view('up_contact_image')->with('contact',$contact);
        
    }

      public function search(Request $request){
   
     $this->validate($request,
    [
        'query'=> 'required',
        
        
    ]);

    $query = $request->input('query');


    
    $contacts =Auth::user()->contacts()->where('name','like','%'.$query.'%')->get();
    return view('search-results')->with(
        
        'contacts',$contacts
    
    );
    

   }


   public function ShareContact($id){
    
        $contact = Contact::findOrFail($id);
         return view('share_contact')->with('contact',$contact);
   }

    
   public function ShareContactSend(Request $request) {

      $this->validate($request,
    [
        'share_email'=> 'required|email',
        
        
    ]);
    $data = request()->all();
    $share_email = $request->input('share_email');
     
    Mail::to($share_email)->send(new ShareContact($data));
    
    return redirect()->route('user.mycontact')->with('success','Contact has been shared successfully.');
   }

  

}
