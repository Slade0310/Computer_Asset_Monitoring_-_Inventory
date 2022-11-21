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
        Schema::create('computer_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag_id')->unique();
            $table->string('asset_category_id');
            $table->string('status')->default(0);
            $table->softDeletes();
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
        Schema::create('computer_assets', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
