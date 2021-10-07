<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            // $table->increments('client_id', true)->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 256);
            $table->string('phone', 20);
            $table->string('profile_uri', 255);
            $table->timestamp('last_password_reset')->nullable();
            $table->enum('status', ['Active', 'Inactive']);
            // $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
        $position = 1;
        DB::connection('mysql')->table('users')->insert([
        ]);
        /*
        |--------------------------------------------------------------------------
        | USERS - CLIENT
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('client', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('client_name', 99);
            $table->text('address1');
            $table->text('address2');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100);
            $table->double('longitude', 10,7);
            $table->double('latitude', 10,7);
            $table->string('phone_no1', 20);
            $table->string('phone_no2', 20);
            $table->string('zip', 20);
            $table->date('start_validity');
            $table->date('end_validity');
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::connection('mysql')->table('client', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('users');
        });
        $position = 1;
        DB::connection('mysql')->table('client')->insert([
            
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
        Schema::dropIfExists('clients');

    }
}
