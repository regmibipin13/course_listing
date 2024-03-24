<?php

namespace App\Models;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory;
    use Multitenancy;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'price',
        'instructor_id',
        'created_by_user_id'
    ];

    protected $appends = [
        'display_image'
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function scopeFilter($query, $title)
    {
        if ($title) {
            return $query->where('title', 'like', '%' . $title . '%');
        }
        return $query;
    }

    public function getDisplayImageAttribute()
    {
        if ($this->hasMedia()) {
            return $this->getFirstMediaUrl() ? $this->getFirstMediaUrl() : asset('img/noimg.jpeg');
        }
        return asset('img/noimg.jpeg');
    }
}
