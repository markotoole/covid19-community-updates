<?php

use Illuminate\Database\Migrations\Migration;

class ChangeStatusUpdateStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statuses = \App\Models\ServiceStatus::query()
                                             ->where('status', '=', 'Closed')
                                             ->get();
        /** @var \App\Models\ServiceStatus $status */
        foreach ($statuses as $status) {
            $status->status = 'Temp. Closed';
            $status->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
