<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'image',
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
