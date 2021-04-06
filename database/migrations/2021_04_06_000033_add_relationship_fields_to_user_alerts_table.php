<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserAlertsTable extends Migration
{
    public function up()
    {
        Schema::table('user_alerts', function (Blueprint $table) {
            $table->unsignedBigInteger('expiring_contract_id')->nullable();
            $table->foreign('expiring_contract_id', 'expiring_contract_fk_3595426')->references('id')->on('contracts');
        });
    }
}
