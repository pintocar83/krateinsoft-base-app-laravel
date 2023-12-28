<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $locale   = config('app.locale');
            $timezone = config('app.timezone');

            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string("timezone",50)->default("$timezone")->nullable();
            $table->string("language",2)->default("$locale")->nullable();
            $table->string("image",100)->default("")->nullable();
            $table->json("tags")->nullable();
            $table->string("access_policy",10)->default("allow")->nullable();
            $table->text("access_permissions")->default("")->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });

        User::create([
            'first_name' => "Administrador",
            'email' => "krateinsoft@gmail.com",
            'password' => Hash::make("admin"),
            'tags' => ['admin', 'developer']
        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
