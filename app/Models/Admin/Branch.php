<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public static function createWithUser($attributes){
       return User::create([
            'name' => $attributes['name'],
            'email' => $attributes["email"],
            'password' => bcrypt($attributes["password"]),
            'role' => "branch_admin"
        ]);

    }

    public static function deleteUser($attributs){
        $user = User::find($attributs["id"]);
        if($user){
            return $user->delete();
        }
    }
    protected $fillable = [
        'name',
        "user_id",
        'address',
        'phone',
        'image',
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
    public function wards(){
        return $this->hasMany(Ward::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
