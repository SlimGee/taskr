<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (User::count() < 1) {
            $this->command->info('Please create an account first by visiting /register in your browser');
            exit();
        }

        Task::factory(2000)->create(['user_id' => User::first()->id]);
    }
}
