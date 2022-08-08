<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->stirng("header_name");
            $table->stirng("header_link");
            $table->stirng("header_type");
            $table->stirng("footer_name");
            $table->stirng("footer_link");
            $table->stirng("footer_type");
            $table->stirng("user_menu_name");
            $table->stirng("user_menu_link");
            $table->stirng("user_menu_type");
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
        Schema::dropIfExists('menus');
    }
}
