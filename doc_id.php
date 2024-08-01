<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc_id extends Model
{
    use SoftDeletes;

    protected $table    = 'Doc_id';
    protected $fillable = [
        'user_id'
    ];

    public function PensionService(){
        return $this->hasMany('App\habitation','user_id','id');
    }
}
