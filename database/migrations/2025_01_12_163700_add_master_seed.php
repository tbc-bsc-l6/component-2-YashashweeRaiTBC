<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table("users")
            ->insert([
                "email"=>"admin@mail.com",
                "name"=>"Yashashwee Rai",
                "password"=>bcrypt("password")
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table("users")->where("email","=","admin@mail.com")->delete(); 
    }
};
