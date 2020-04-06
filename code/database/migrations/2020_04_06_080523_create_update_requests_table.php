<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'update_requests',
            function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('state')
                      ->default('new');
                $table->integer('update_status_id')
                      ->nullable();
                $table->integer('status_id');
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
        Schema::dropIfExists('update_requests');
    }
}
