<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technologia;
class TechnologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologia=[
            'javascript',
            'html',
            'css',
            'laravel',
            'reactJS',
            'angular',
            'php',
        ];

        foreach($technologia as $element){
            $new_technologia=new Technologia();
            $new_technologia->name=$element;
            $new_technologia->save();
        }
    }
}
