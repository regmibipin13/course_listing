<?php

namespace App\Models;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    use Multitenancy;

    protected $fillable = [
        'name',
        'email',
        'created_by_user_id'
    ];


    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
