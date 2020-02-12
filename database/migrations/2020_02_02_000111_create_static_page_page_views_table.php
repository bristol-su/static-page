<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPagePageViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_page_page_views', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('viewed_by');
            $table->unsignedInteger('module_instance_id');
            $table->unsignedInteger('activity_instance_id');
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
        Schema::dropIfExists('static_page_page_views');
    }
}