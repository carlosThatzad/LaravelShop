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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('lastname', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone', 15);
            $table->bigInteger('role_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('users_roles');
        });

        $this->insertUser();
    }

    //Funciones para datos predefinidos

        private function insertUser()
            {
        $users = [
            [
                'name' => 'Admin',
                'lastname' => 'owner',
                'email' => 'informacion@shophome.com',
                'password' => bcrypt('1234'),
                'telephone' => '622071618',
                'role_id' => 1,
                'created_at' => date("Y-m-d H:s:i")

            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
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
}
