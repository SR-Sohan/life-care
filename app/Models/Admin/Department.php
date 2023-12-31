<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
