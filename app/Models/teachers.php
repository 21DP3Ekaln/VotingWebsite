<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'description', 'votes', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

