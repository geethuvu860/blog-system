<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class User_role extends Model
{
    protected $primaryKey = 'role_id';
    protected $fillable = [
       
        'role_name',
        
    ];
    function users()
    {
        return $this->hasMany(ModelsUser::class, 'role_id', 'role_id');
    }   
}
