<?php

namespace Database\Seeders;

use App\Models\Complain;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {

    User::factory()->create([
      'username' => 'estudianteGenerico',
      'password' => 'est1',
    ]);
    User::factory()->create([
      'username' => 'instructorGenerico',
      'password' => 'inst1',
      'rol' => 'Instructor'
    ]);
    Student::factory(20)->create();
    Complain::factory(10)->create();
  }
}
