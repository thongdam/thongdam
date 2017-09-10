<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\address;
class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('address', function (Blueprint $table) {
          $table->increments('id');
          $table->string('fullname');
          $table->string('phone');
          $table->string('address');
          $table->string('district');
          $table->string('amphur');
          $table->string('province');
          $table->string('zipcode');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('address');
    }
}
