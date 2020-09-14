<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
 
Route::get('/signup',[

    'uses'=>'UserController@getSignup',
    'as'=>'user.signup'  
]);

Route::post('/signup',[
    
'uses'=>'UserController@postSignup',
'as'=>'user.signup'

]);
Route::get('/signin',[

'uses'=>'UserController@getSignin',
'as'=>'user.signin'

]);
Route::post('/signin',[

'uses'=>'UserController@postSignin',
'as'=>'user.signin'

]);

    Route::group(['middleware'=>'auth'],function(){
        
          
         Route::get('/myprofile',[
    
            'uses'=>'UserController@getProfile',
            'as'=>'user.myprofile'
            
         
             ]);

         Route::get('/profile/edit/{id}', [

        'uses'=>'userController@edit',
        'as'=>'user.edit'
        
        ]);

         Route::post('/profile/update/{id}', [

        'uses'=>'userController@update',
        'as'=>'user.update'
        
        ]);


        Route::get('/upload/profile-image/{id}',[
    
            'uses'=>'UserController@getuploadImage',
            'as'=>'user.upload-profile-image-get'
            
         
             ]);
       
        Route::post('/upload/profile-image-up/{id}',[
    
            'uses'=>'UserController@updateImage',
            'as'=>'user.upload-profile-image'
            
         
             ]);

        Route::get('/delete_confirm', [
        'uses'=>'userController@DeleteConfirm',
        'as'=>'delete_confirm',
       
         ]);

        Route::get('/delete/{id}', [
        'uses'=>'userController@Delete',
        'as'=>'user.delete'
         ]);
         
         Route::get('/change_password/', [
         'uses'=>'userController@getChangePassword',
         'as'=>'change_password',
        ]);

        Route::post('/reset_password/', [
        'uses'=>'userController@postChangePassword',
        'as'=>'reset_password',
        ]);
             
         Route::get('/upload/contact-image/{id}',[
    
            'uses'=>'ContactController@getuploadImage',
            'as'=>'upload-contact-image-get'
            
         
             ]);
        Route::get('/share_contact/{id}',[
    
            'uses'=>'ContactController@ShareContact',
            'as'=>'share-contact'
         
             ]);
        
          Route::post('/share_contact',[
    
            'uses'=>'ContactController@ShareContactSend',
            'as'=>'share-contact-send'
         
             ]);
      
      
        Route::post('/upload/contact-image/store/{id}',[
    
            'uses'=>'ContactController@updateImage',
            'as'=>'upload-contact-image'
            ]); 
         Route::get('/search','ContactController@search')->name('search');

        Route::get('/mycontact',[
    
        'uses'=>'UserController@getContact',
        'as'=>'user.mycontact'
        
        ]);

        Route::get('/mycontact',[
    
        'uses'=>'ContactController@showContact',
        'as'=>'user.mycontact'
        
        ]);

        Route::get('/addnewcontact',[

        'uses'=>'ContactController@newContact',
        'as'=>'user.newcontact'
        
            ]);
         Route::post('/addnewcontact',[

        'uses'=>'ContactController@storeContact',
        'as'=>'user.newcontact'
        
            ]);
         Route::get('/mycontact/{id}', 'ContactController@destroy')->name('contact.destroy');
         Route::get('/mycontact/edit/{id}', 'ContactController@edit')->name('contact.edit');
         Route::post('/mycontact/update/{id}', 'ContactController@update')->name('contact.update');

         Route::get('/logout',[
         'uses'=>'UserController@getLogout',
         'as'=>'user.logout'
         ]);
    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
