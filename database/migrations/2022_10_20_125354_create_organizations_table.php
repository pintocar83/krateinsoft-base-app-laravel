<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Organization;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $locale   = config('app.locale');
            $timezone = config('app.timezone');

            $table->id();
            $table->string('code',10);
            $table->string('identification_number',50);
            $table->string('name',200);
            $table->string('address_country',100)->nullable();
            $table->string('address_state',100)->nullable();
            $table->string('address_city',100)->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->string('phone',20)->nullable();
            $table->string("timezone",20)->default("$timezone");
            $table->string("language",2)->default("$locale");
            $table->string("image",100)->default("")->nullable();
            $table->string("image_secondary",100)->default("")->nullable();
            $table->string("image_inline",100)->default("")->nullable();
            $table->string("image_report_vertical",100)->default("")->nullable();
            $table->string("image_report_horizontal",100)->default("")->nullable();
            $table->string('db_driver',50)->nullable();
            $table->string('db_url',500)->nullable();
            $table->string('db_host',50)->nullable();
            $table->string('db_port',20)->nullable();
            $table->string('db_socket',20)->nullable();
            $table->string('db_name',50)->nullable();
            $table->string('db_user',50)->nullable();
            $table->string('db_password',50)->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });
/*
        Organization::create([
            'code' => "01",
            'identification_number'=> "000000001",
            'name' => "Kratein Soft",
            'image' => "image/logo-icon.png",
            'db_name' => getenv("DB_DATABASE"),
            'db_driver' => getenv("DB_CONNECTION"),
            'db_url' => getenv("DATABASE_URL"),
            'db_host' => getenv("DB_HOST"),
            'db_port' => getenv("DB_PORT"),
            'db_socket' => getenv("DB_SOCKET"),
            'db_user' => getenv("DB_USERNAME"),
            'db_password' => getenv("DB_PASSWORD"),
        ]);
*/
        Organization::create([
            'code' => "01",
            'identification_number'=> "000000001",
            'name' => "Kratein Soft",
            'image' => "image/interface-logo.png",
            'image_secondary' => "image/interface-logo-secondary.png",
            'image_inline' => "image/interface-logo-inline.png",
            'db_name' => getenv("DB_DATABASE").".org",
            'db_driver' => getenv("DB_CONNECTION"),
            'db_url' => getenv("DATABASE_URL"),
            'db_host' => getenv("DB_HOST"),
            'db_port' => getenv("DB_PORT"),
            'db_socket' => getenv("DB_SOCKET"),
            'db_user' => getenv("DB_USERNAME"),
            'db_password' => getenv("DB_PASSWORD"),
        ]);

/*
        Organization::create([
            'code' => "02",
            'identification_number'=> "000000002",
            'name' => "Demo",
            'image' => "image/logo-icon.png",
            'db_name' => getenv("DB_DATABASE"),
            'db_driver' => getenv("DB_CONNECTION"),
            'db_url' => getenv("DATABASE_URL"),
            'db_host' => getenv("DB_HOST"),
            'db_port' => getenv("DB_PORT"),
            'db_socket' => getenv("DB_SOCKET"),
            'db_user' => getenv("DB_USERNAME"),
            'db_password' => getenv("DB_PASSWORD"),
        ]);
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
