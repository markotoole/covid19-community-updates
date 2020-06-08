<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorPostImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statuses = \App\Models\Post::query()
                                             ->get();
        /** @var \App\Models\ServiceStatus $status */
        foreach ($statuses as $status) {
            $image_path = $status->title_image;
            $image_path = preg_replace('#public/upload/image1/#', 'public/upload/image1', $image_path);
            $status->title_image = $image_path;
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
