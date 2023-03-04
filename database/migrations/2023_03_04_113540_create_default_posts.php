<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\Post::insert([
            [
                "name"=>"Product Owner"
            ],
            [
                "name"=>"Scrum Master"
            ],
            [
                "name"=>"Developper"
            ],
            [
                "name"=>"Product Manager"
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Post::whereIn("name",["Product Owner","Scrum Master","Developper","Product Manager"])->delete();
    }
};
