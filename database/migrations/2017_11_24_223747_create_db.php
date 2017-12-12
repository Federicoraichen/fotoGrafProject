<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories' , function(Blueprint $table){
        $table->increments('id');
        $table->string('name',150);
        $table->timestamps();
        $table->softDeletes();
      });

      Schema::create('posts', function(Blueprint $table){
        $table->increments('id');
        $table->string('title');
        // $table->float('price');
        $table->text('description');
        $table->integer('category_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->foreign('user_id')->references('id')->on('user');
      });

      Schema::create('images',function(Blueprint $table){
        $table->increments('id');
        $table->string('src');
        $table->timestamps();
        $table->integer('post_id')->unsigned();
        $table->foreign('post_id')->references('id')->on('posts');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
