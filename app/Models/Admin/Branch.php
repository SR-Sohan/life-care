<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public static function createWithUser($attributes){
        User::create([
            'name' => "Sohan",
            'email' => "admin@gmail.com",
            'password' => bcrypt('password'),
        ]);

    }
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
