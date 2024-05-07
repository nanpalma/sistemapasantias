<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(30)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    $this->call([
      PermissionSeeder::class,
      RoleSeeder::class,
      SuperAdminSeeder::class,
      BrigadaSeeder::class,
      TiposArmaSeeder::class,
      HospitalesSeeder::class,
    ]);
  }
}
