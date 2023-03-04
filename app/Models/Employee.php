<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Employee extends User
{
    use HasFactory;
    protected $fillable =
        [
        "social_number",
        "user_id",
        "post_id",
        "salary",
        "adress",
        "phone",
        "born_date",
        "hiring_date"
    ];
    protected $table = 'employees';
    protected  $primaryKey = "social_number";
    public function getSocialNumber()
    {
        return $this->attributes["social_number"];
    }
    public static function validation(Request $request)
    {
        $request->validate([
            "social_number"=>["required","unique:employees,social_number"],
            "post_id"=>["required"],
            "salary"=>["required","regex:/^\d{1,5}(\.\d{1,4})?$/"],
            "adress"=>["required"],
            "phone"=>["required"],
            "born_date"=>["required","before:tomorrow"],
            "hiring_date"=>["required"]
        ]);

    }
    public function user()
    {
        return $this->belongsTo(User::class,"social_number");
    }
    public function  getName()
    {
        return parent::getName();
    }
    public function getEmail()
    {
        return parent::getEmail();
    }
    public function setName($name)
    {
        parent::setName($name);
    }
    public function getSalary()
    {
        return $this->attributes["salary"];
    }
    public function setSalary($salary)
    {
        $this->attributes["salary"] = $salary;
    }
    public function getBornDate()
    {
        return $this->attributes["born_date"];
    }
    public function setBornDate($date)
    {
        $this->attributes["born_date"] = $date;
    }
    public function getHiringDate()
    {
        return $this->attributes["hiring_date"];
    }
    public function setHuringDate($date)
    {
        $this->attributes["hiring_date"] = $date;
    }
    public function getPhoneNumber()
    {
        return $this->attributes["phone"];
    }
    public function setPhoneNumber($phone)
    {
        $this->attributes["phone"] = $phone;
    }
    public  function getAdress()
    {
        return $this->attributes["phone"];
    }
    public function setPhone($phone)
    {
        $this->attributes["phone"] = $phone;
    }
    public function getPost()
    {
        return $this->attributes["post"];
    }
    public function setPost($post)
    {
        $this->attributes["post"] = $post;
    }
    public function post()
    {
        return $this->hasOne(Post::class);
    }

}
