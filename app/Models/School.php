<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';

    protected $primaryKey = 'id';

    protected $fillable = [
        'school_id', 
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'school_id', 'school_id');
    }
}
