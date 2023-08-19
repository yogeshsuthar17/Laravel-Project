<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = "access_role";
    
    protected $fillable = [
        'access_role',
        'active'
    ];
}
