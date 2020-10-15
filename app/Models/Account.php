<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'active'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
