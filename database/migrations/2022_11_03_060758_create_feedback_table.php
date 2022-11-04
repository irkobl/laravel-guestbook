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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->integer('raiting');
            $table->string('name', 255)->nullable();
            $table->text('feedback')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'feedback_users_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
