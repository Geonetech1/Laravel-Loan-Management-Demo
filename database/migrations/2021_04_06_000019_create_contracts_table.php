<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->decimal('value', 15, 2)->nullable();
            $table->date('expires_on')->nullable();
            $table->date('start_date')->nullable();
            $table->string('department')->nullable();
            $table->string('entity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
