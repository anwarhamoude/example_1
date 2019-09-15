<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('viewable',['false','shared','team','network','true'])->default('network');
            $table->string('slug')->unique();
            $table->unsignedInteger('user_id');
            $table->string('titlename')->nullable();
            $table->text('intro')->nullable();
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('phonehidden')->default(false);
            $table->string('workphone')->nullable();
            $table->boolean('workphonehidden')->default(false);
            $table->string('email2')->nullable();
            $table->boolean('email2hidden')->default(false);
            $table->string('introlink1')->nullable();
            $table->string('introlink2')->nullable();
            $table->string('introlink3')->nullable();
            $table->string('descriptionlink1')->nullable();
            $table->string('descriptionlink2')->nullable();
            $table->string('descriptionlink3')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->string('link3')->nullable();
            $table->text('field1')->nullable();
            $table->text('field2')->nullable();
            $table->text('field3')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
