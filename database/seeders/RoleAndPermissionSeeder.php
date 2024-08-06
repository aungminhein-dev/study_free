<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            'create permissions',
            'view permissions',
            'update permissions',
            'delete permissions',
            'create users',
            'view users',
            'update users',
            'delete users',
            'create roles',
            'view roles',
            'update roles',
            'delete roles',
            'create education-types',
            'edit education-types',
            'view education-types',
            'update education-types',
            'delete education-types',
            'create academic-levels',
            'edit academic-levels',
            'view academic-levels',
            'update academic-levels',
            'delete academic-levels',
            'create question-groups',
            'edit question-groups',
            'view question-groups',
            'update question-groups',
            'delete question-groups',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions

        // Admin role with full access
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Editor role with CRUD access to content (e.g., users)
        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo([
            'create users',
            'view users',
            'update users',
            'delete users',
            'create education-types',
            'edit education-types',
            'view education-types',
            'update education-types',
            'delete education-types',
            'create academic-levels',
            'edit academic-levels',
            'view academic-levels',
            'update academic-levels',
            'delete academic-levels',
            'create question-groups',
            'edit question-groups',
            'view question-groups',
            'update question-groups',
            'delete question-groups',
        ]);

        // Viewer role with read-only access
        $viewerRole = Role::create(['name' => 'viewer']);
        $viewerRole->givePermissionTo([
            'view users',
        ]);

        // Author role with create and edit access
        $authorRole = Role::create(['name' => 'author']);
        $authorRole->givePermissionTo([
            'create question-groups',
            'edit question-groups',
            'view question-groups',
            'update question-groups',
            'delete question-groups',
        ]);

        // Moderator role with permissions to manage roles and permissions
        $moderatorRole = Role::create(['name' => 'moderator']);
        $moderatorRole->givePermissionTo([
            'view roles',
            'update roles',
            'view permissions',
            'update permissions',
            'create question-groups',
            'edit question-groups',
            'view question-groups',
            'update question-groups',
            'delete question-groups',
        ]);
    }
}
