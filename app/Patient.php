<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    protected $table = 'patients';

    protected $fillable = [ 
        'name', 'cpf', 'status',
        'register_by_user_id'
    ];

    public function registerByUser()
    {
        return $this->belongsTo('App\User', 'register_by_user_id', 'id');
    }

}
