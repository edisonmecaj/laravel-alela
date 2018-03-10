<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCategoryRole extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("category_id")->unsigned();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->integer("roles_id")->unsigned();
            $table->foreign("roles_id")->references("id")->on("roles");
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
        Schema::dropIfExists('category_role');
    }
}
