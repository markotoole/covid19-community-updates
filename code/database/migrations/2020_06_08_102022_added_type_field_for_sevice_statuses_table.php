<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedTypeFieldForSeviceStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'service_statuses',
            function (Blueprint $table) {
                $table->string('type')
                      ->default('Business');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'service_statuses',
            function (Blueprint $table) {
                $table->dropColumn('type');
            }
        );
    }
}
