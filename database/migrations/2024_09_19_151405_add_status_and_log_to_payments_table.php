<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->string('status')->nullable();
        $table->text('log')->nullable();
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropColumn(['status', 'log']);
    });
}

};
