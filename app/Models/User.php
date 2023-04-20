<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        "last_name",
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function getFirstName()
    {
        return $this->attributes['first_name'];
    }
    public function setFirstName($name)
    {
        $this->attributes['first_name'] = $name;
    }
    public function getLastName()
    {
        return $this->attributes['last_name'];
    }
    public function setLastName($name)
    {
        $this->attributes['last_name'] = $name;
    }
    public function getEmail()
    {
        return $this->attributes["email"];
    }
    public function setEmail($email)
    {
        $this->attributes["email"] = $email;
    }
    public function setPassword($password)
    {
        $this->attributes["password"] = Hash::make($password);
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    public static function validate(Request $request)
    {
        $request->validate([
            "email" => ["required", "unique:users,email"],
            "first_name" => ["required"],
            "last_name" => ["required"]
        ]);
    }
}
