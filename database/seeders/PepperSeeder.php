<?php

namespace Database\Seeders;

use App\Models\Pepper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PepperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pepper::insert(
            [
                [
                    'name' => 'Jalapeño (10 nasion)',
                    'description' => 'Średnio ostra papryka o charakterystycznym zielonym lub czerwonym kolorze. Idealna do sals, sosów i jako dodatek do potraw meksykańskich.',
                    'price' => 30,
                    'img' => 'jalapeno.jpg'
                ],
                [
                    'name' => 'Habanero (10 nasion)',
                    'description' => 'Bardzo ostra papryka o owocowym aromacie. Doskonała do dań karaibskich, pikantnych sosów i marynat.',
                    'price' => 75,
                    'img' => 'habanero.jpg'
                ],
                [
                    'name' => 'Piri-Piri (10 nasion)',
                    'description' => 'Małe, ale wyjątkowo ostre papryczki pochodzące z Afryki. Często używane w kuchni portugalskiej, szczególnie w marynatach i sosach.',
                    'price' => 21,
                    'img' => 'piri-piri.jpg'
                ],
                [
                    'name' => 'Cayenne (10 nasion)',
                    'description' => 'Smukła, ostra papryka o wszechstronnym zastosowaniu. Idealna do przyprawiania zup, gulaszy i mięs.',
                    'price' => 40,
                    'img' => 'cayenne.jpg'
                ]
            ]
        );
    }
}
