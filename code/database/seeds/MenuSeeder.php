<?php declare(strict_types=1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus =
            [
                [
                    'parent_id' => 0,
                    'order' => 0,
                    'title' => 'Service Statuses',
                    'icon' => 'fa-bank',
                    'uri' => 'service-statuses',

                ],
                [
                    'parent_id' => 0,
                    'order' => 0,
                    'title' => 'Categories',
                    'icon' => 'fa-adn',
                    'uri' => 'categories',

                ],
                [
                    'parent_id' => 0,
                    'order' => 0,
                    'title' => 'Update Requests',
                    'icon' => 'Update Requests',
                    'uri' => 'update-requests/',

                ],
            ];
        foreach ($menus as $menu) {
            DB::table('admin_menu')
              ->where('uri', '=', $menu['uri'])
              ->delete();
        }
        DB::table('admin_menu')
          ->insertOrIgnore(
              $menus
          );
    }
}
