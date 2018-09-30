<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
    protected $table = 'doctors';

    protected $fillable = [ 
        'name', 'crm', 'status',
        'register_by_user_id'
    ];

    public function registerByUser()
    {
        return $this->belongsTo('App\User', 'register_by_user_id', 'id');
    }

}
