<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Course extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    protected static function booted()
    {
        static::creating(fn(Course $course) => $course->id = (string) Uuid::uuid4());
    }
    protected $fillable = [ 'name', 'description'];
}
