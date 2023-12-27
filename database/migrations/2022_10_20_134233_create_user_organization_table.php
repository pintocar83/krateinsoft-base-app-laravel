<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\UserOrganization;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_organization', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations');

            $table->tinyInteger('status')->default('1');

            $table->timestamps();

            $table->index(['user_id', 'organization_id']);
            $table->index(['user_id', 'organization_id','status']);
            $table->index(['user_id']);
            $table->index(['user_id','status']);
            $table->index(['organization_id']);
            $table->index(['organization_id','status']);
        });


        UserOrganization::create([
            'user_id'=>1,
            'organization_id'=>1
        ]);

/*        UserOrganization::create([
            'user_id'=>1,
            'organization_id'=>2
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
        Schema::dropIfExists('user_organizations');
    }
};
