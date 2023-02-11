<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $question= \App\Models\Test::factory()->create([
            'answer1' => 'Сакура',
            'answer2' => 'Фиалка',
            'answer3' => 'Пион',
            'right_answer1' => 'Сакура',
            'question' =>'Какой национальный цветок Японии?',
          
        ]);
        $question= \App\Models\Test::factory()->create([
            'answer1' => 'инков',
            'answer2' => 'ацтеков',
            'answer3' => 'египтян',
            'right_answer1' => 'инков',
            'question' =>'В какой из следующих империй не было письменности?',
           
        ]);
       
        $question= \App\Models\Test::factory()->create([
            'answer1' => 'Муж',
            'answer2' => 'Возраст',
            'answer3' => 'Гагарин',
            'right_answer1' => 'Муж',
            'right_answer2' => 'Возраст',
            'question' =>'Что превращает девушку в женщину?',
           
        ]);




    }
}
