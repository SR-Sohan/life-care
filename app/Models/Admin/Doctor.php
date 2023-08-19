<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public static function createWithUser($attributes){
        return User::create([
             'name' => $attributes['name'],
             'email' => $attributes["email"],
             'password' => bcrypt($attributes["password"]),
             'role' => "doctor"
         ]);
 
     }

    protected $fillable = [
        'user_id',
        'branch_id',
        'department_id',
        'name',
        'position',
        'address',
        'phone',
        'images',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }

    
}
