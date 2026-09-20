<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:super-admin
                            {--name=Super Admin : The name of the super admin}
                            {--email=superadmin@soulmateindia.com : The email address}
                            {--password=SuperAdmin@123 : The password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a super admin user with full access (all permissions)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $name     = $this->option('name');
        $email    = $this->option('email');
        $password = $this->option('password');

        $this->info('Creating super admin role & assigning all permissions...');

        // Reset cached permissions so we work with the latest set
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create or retrieve the super_admin role
        $role = Role::firstOrCreate([
            'name'       => 'super_admin',
            'guard_name' => 'web',
        ]);

        // 2. Give the role every existing permission
        $permissions = Permission::all();
        $role->syncPermissions($permissions);

        $this->line("  → Role <comment>super_admin</comment> synced with <comment>{$permissions->count()}</comment> permission(s).");

        // 3. Create or update the user
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name'      => $name,
                'password'  => Hash::make($password),
                'is_admin'  => 1,
                'is_active' => 1,
            ]
        );

        // 4. Assign the super_admin role
        if (! $user->hasRole('super_admin')) {
            $user->assignRole($role);
        }

        $this->newLine();
        $this->info('✅  Super Admin created / updated successfully!');
        $this->table(
            ['Field', 'Value'],
            [
                ['Name',     $user->name],
                ['Email',    $user->email],
                ['Password', $password],
                ['Role',     'super_admin'],
                ['is_admin', $user->is_admin ? 'Yes' : 'No'],
            ]
        );

        return self::SUCCESS;
    }
}
