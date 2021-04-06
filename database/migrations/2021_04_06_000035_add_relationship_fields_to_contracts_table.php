<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_3595332')->references('id')->on('statuses');
            $table->unsignedBigInteger('analyst_id')->nullable();
            $table->foreign('analyst_id', 'analyst_fk_3595339')->references('id')->on('users');
            $table->unsignedBigInteger('legal_id')->nullable();
            $table->foreign('legal_id', 'legal_fk_3595353')->references('id')->on('users');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_3595354')->references('id')->on('users');
            $table->unsignedBigInteger('nda_id')->nullable();
            $table->foreign('nda_id', 'nda_fk_3603707')->references('id')->on('ndas');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->foreign('comment_id', 'comment_fk_3605382')->references('id')->on('comments');
        });
    }
}
