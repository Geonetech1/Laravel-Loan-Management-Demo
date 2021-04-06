<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLicensesTable extends Migration
{
    public function up()
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_3546330')->references('id')->on('users');
            $table->unsignedBigInteger('analyst_id')->nullable();
            $table->foreign('analyst_id', 'analyst_fk_3546331')->references('id')->on('users');
            $table->unsignedBigInteger('legal_id')->nullable();
            $table->foreign('legal_id', 'legal_fk_3546332')->references('id')->on('users');
        });
    }
}
