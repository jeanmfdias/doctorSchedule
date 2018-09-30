<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    
    protected $table = 'schedules';

    protected $fillable = [ 
        'date_time', 'description', 'exams',
        'patient_id', 'doctor_id', 'register_by_user_id',
        'status'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function registerByUser()
    {
        return $this->belongsTo('App\User', 'register_by_user_id', 'id');
    }

    public static function getStatus()
    {
        return [
            'CONSULTED', 'CANCELED', 'MISSED', 
            'SCHEDULED'
        ];
    }

}
