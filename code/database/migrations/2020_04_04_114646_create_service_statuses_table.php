<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'service_statuses',
            function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('name');
                $table->string('status');
                $table->boolean('delivery')
                      ->nullable();
                $table->boolean('service_offered')
                      ->nullable();
                $table->string('phone');
                $table->string('link');
                $table->text('notes')
                      ->nullable();
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
        Schema::dropIfExists('service_statuses');
    }
}
