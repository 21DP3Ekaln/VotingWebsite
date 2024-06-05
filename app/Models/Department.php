<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
    use HasFactory;
    
    public function teachers()
    {
        return $this->hasMany(Teachers::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }


    protected $fillable = ['name'];  // Specify the fields allowed for mass assignment
}
