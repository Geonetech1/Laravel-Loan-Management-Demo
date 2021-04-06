<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNdasTable extends Migration
{
    public function up()
    {
        Schema::table('ndas', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_3546310')->references('id')->on('users');
            $table->unsignedBigInteger('analyst_id')->nullable();
            $table->foreign('analyst_id', 'analyst_fk_3546314')->references('id')->on('users');
            $table->unsignedBigInteger('legal_id')->nullable();
            $table->foreign('legal_id', 'legal_fk_3546315')->references('id')->on('users');
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id', 'contract_fk_3603725')->references('id')->on('contracts');
        });
    }
}
