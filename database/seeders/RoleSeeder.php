<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Default credentials
    foreach (Role::getRoles() as $role) {
      Role::findOrCreate($role);
    }
  }
}
