<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdasTable extends Migration
{
    public function up()
    {
        Schema::create('ndas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_signed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
