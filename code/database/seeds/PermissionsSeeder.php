<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /** @var \Encore\Admin\Auth\Permission $permissionModel */
        $permissionModel = config('admin.database.permissions_model');

        $permission = $permissionModel::create(
            [
                'name' => 'Edit updates',
                'slug' => 'admin.updates.edit',
            ]
        );
        /** @var \Encore\Admin\Auth\Database\Role $roleModel */
        $roleModel = config('admin.database.roles_model');
        $loginPermission = \Encore\Admin\Auth\Database\Permission::where('slug', 'auth.login')
                                                                 ->get()
                                                                 ->first();
        $role = $roleModel::create(
            [
                'name' => 'Moderator',
                'slug' => 'moderator',
            ]
        );
        $role->permissions()
                  ->attach([$permission->id, $loginPermission->id]);
        $role->save();
    }
}
