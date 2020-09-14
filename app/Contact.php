<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{    

    protected $fillable = [
        // 'email', 'password','name''profile_image','phone',
    ];
    public function user(){

    return $this->belongsTo(User::class);
   }
}
