<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_accesses', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('roleId');
            $table->unsignedBigInteger('categoryId');
            $table->unique(['roleId', 'categoryId']);
            $table->foreign('roleId')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('role_accesses');
    }
}
