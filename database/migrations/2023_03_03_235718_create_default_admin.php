<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = new \App\Models\Admin();
        \App\Models\User::create([
            'first_name' => "admin",
            'last_name' => "admin",
            'email' => "admin@mail.com",
            'password' => Hash::make("adminadmin"),
        ])->admin()->save($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\User::where("email", "admin@mail.com")->delete();
    }
};
