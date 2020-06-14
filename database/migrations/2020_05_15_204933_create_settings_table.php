<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('meta_tags')->nullable();
            $table->string('meta_description')->nullable();
            $table->unsignedBigInteger('favicon')->nullable();
            $table->unsignedBigInteger('logo')->nullable();
            $table->unsignedBigInteger('logo_2')->nullable();
            $table->unsignedBigInteger('banner')->nullable();
            $table->smallInteger('flag_slider')->default(0);
            $table->smallInteger('flag_service')->default(0);
            $table->smallInteger('flag_client')->default(0);
            $table->smallInteger('flag_client_review')->default(0);
            $table->smallInteger('flag_partner')->default(0);
            $table->smallInteger('flag_post_comment')->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
