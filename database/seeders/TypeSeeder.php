<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            'Blog',
            'Social Network',
            'Negozio Online',
            'Forum',
            'Notizie',
            'Portale Educativo',
            'Viaggi',
            'Ristoranti',
            'Musica',
            'Ricette Culinarie',
            'Recensioni di Film/Prodotti',
            'Fitness e Benessere',
            'Appuntamenti',
            'Lavoro e Carriere',
            'Immobili',
            'Tecnologia e Informatica',
            'Arte e Design',
            'Sport e Fitness',
            'Fotografia',
            'Moda e Stile',
            'Giochi Online',
            'Salute e Benessere',
            'Finanza e Investimenti',
            'Animali Domestici',
            'Matrimonio e Eventi',
            'Viaggi e Turismo',
            'Hobby e Passioni',
            'Cucina e Gastronomia',
            'Fai da Te e Artigianato',
            'Auto e Motori',
            'Giardinaggio',
            'Educazione e Corsi Online',
            'Podcast',
            'Streaming Video',
            'Podcast',
            'Arte e Cultura',
            'Politica e Attualità',
            'Religione e Spiritualità',
            'Ambiente e Sostenibilità',
            'Tecnologia Blockchain',
            'Criptovalute',
            'Viaggi Spaziali e Astronomia',
            'Filosofia e Pensiero'
        ];


        foreach ($type as $element){
            $newType= new Type();
            $newType->type = $element;
            $newType->save();
        };


    }
}
