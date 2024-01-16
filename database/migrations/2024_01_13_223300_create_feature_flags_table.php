<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\FeatureFlag;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_flags', function (Blueprint $table) {
            $table->string('id',15)->primary();
            $table->string('name',50);
            $table->string('description',200)->nullable();
            $table->json('config')->nullable();
            $table->boolean('enabled')->default(true);
            $table->tinyInteger("order")->default(999);
        });

        FeatureFlag::create([
            'id' => 'auth-google',
            'name' => "Authenticate with google",
            'config' => [
                'client_id' => '598017192049-il5tuctl3hlsq3596pq2i8nfsegcgrjd.apps.googleusercontent.com',
                'client_secret' => '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',
                'redirect' => 'http://localhost:8000/sign-in/google/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);

        FeatureFlag::create([
            'id' => 'auth-facebook',
            'name' => "Authenticate with facebook",
            'config' => [
                'client_id' => '',
                'client_secret' => '',
                'redirect' => 'http://localhost:8000/sign-in/facebook/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);

        FeatureFlag::create([
            'id' => 'auth-twitter',
            'name' => "Authenticate with twitter",
            'config' => [
                'client_id' => '',
                'client_secret' => '',
                'redirect' => 'http://localhost:8000/sign-in/twitter/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);

        FeatureFlag::create([
            'id' => 'auth-linkedin',
            'name' => "Authenticate with linkedin",
            'config' => [
                'client_id' => '78x0lseukbesf7',
                'client_secret' => '1owoQ8oTUR0DdW06',
                'redirect' => 'http://localhost:8000/sign-in/linkedin/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);

        FeatureFlag::create([
            'id' => 'auth-github',
            'name' => "Authenticate with github",
            'config' => [
                'client_id' => 'Iv1.b74ace8eeea60669',
                'client_secret' => 'b682bd29bc518fb3ea0909caa0dd1d7db8953097',
                'redirect' => 'http://localhost:8000/sign-in/github/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);

        FeatureFlag::create([
            'id' => 'auth-bitbucket',
            'name' => "Authenticate with bitbucket",
            'config' => [
                'client_id' => '',
                'client_secret' => '',
                'redirect' => 'http://localhost:8000/sign-in/bitbucket/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);

        FeatureFlag::create([
            'id' => 'auth-gitlab',
            'name' => "Authenticate with gitlab",
            'config' => [
                'client_id' => '',
                'client_secret' => '',
                'redirect' => 'http://localhost:8000/sign-in/gitlab/callback'
            ],
            'order' => 1,
            'enabled' => false
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_flags');
    }
};
