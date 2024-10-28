<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Salute e Bellezza',
        'Giardinaggio e Casa',
        'Giocattoli',
        'Sport',
        'Animali domestici',
        'Libri e Riviste',
        'Accessori',
        'Motori'
    ];
    public function run(): void
    {
        foreach($this->categories as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
