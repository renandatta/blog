<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevelCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_level_credentials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_level_id');
            $table->unsignedBigInteger('module_id');
            $table->smallInteger('is_allowed')->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            $table->foreign('user_level_id')->references('id')->on('user_levels');
            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_level_credentials');
    }
}
