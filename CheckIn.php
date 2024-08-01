<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckIn extends Model
{
    use SoftDeletes;


    protected $table    = 'CheckIn';
    protected $fillable = [
        'ID',
        'status',
        'getfullname',
        'dogovor_number',
        'gender',
        'bithday',
        'dogovor_date',
        'plan_end_date',
        'user_id'
        
    ];
    public function service()
    {
        return $this->hasOne('App\CheckIn', 'id', 'status');
    }
}

