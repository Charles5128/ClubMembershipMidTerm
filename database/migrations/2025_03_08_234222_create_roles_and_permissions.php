<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration {
    public function up(): void
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Data Entry']);

        Permission::create(['name' => 'create memberships']);
        Permission::create(['name' => 'edit memberships']);
        Permission::create(['name' => 'delete memberships']);

        $admin = Role::where('name', 'Administrator')->first();
        $admin->givePermissionTo(['create memberships', 'edit memberships', 'delete memberships']);

        $dataEntry = Role::where('name', 'Data Entry')->first();
        $dataEntry->givePermissionTo(['create memberships']);
    }

    public function down(): void
    {
        Role::where('name', 'Administrator')->delete();
        Role::where('name', 'Data Entry')->delete();
    }
};

