<?php

use App\Publisher;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thumbnails = scandir("public/images/book/thumbnails");
        array_shift($thumbnails); array_shift($thumbnails);
        $langs = ['en', 'hu', 'fr', 'de', 'ch', 'cz', 'sk', 'ru'];
        factory(\App\Author::class, 30)->create(); //author table shouldn't be empty
        factory(\App\Genre::class, 10)->create(); //genre table shouldn't be empty
        factory(\App\Publisher::class, 10)->create(); //publisher table shouldn't be empty

        for ($i = 0; $i < 50; $i++) {
            echo("\rGenerating " . (50-$i) . " more... ");
            $faker = \Faker\Factory::create();
            if($i < count($thumbnails))
                $currentThumbnail = $thumbnails[$i];
            else
                $currentThumbnail = "";

            DB::table('books')->insert([
                'ISBN' => $faker->numerify('##########'),
                'title' => $faker->sentence(),
                'thumbnail' => $currentThumbnail,
                'publish_year' => $faker->year('now'),
                'publisher_id' => \App\Publisher::all()->random()->id,
                'language' => $langs[rand(0, 7)],
                'page_count' => rand(30, 1100),
                'description' => implode(' ', $faker->paragraphs(rand(3, 6))),
                'can_order' => 1,
                'can_preorder' => 1,
                'in_stock' => rand(2, 1000),
                'price' => rand(49, 999) . 9
            ]);

            $used_ids = [];
            for ($j = 0; $j < rand(1, 5); $j++) {
                do{
                    $id = \App\Author::all()->random()->id;
                }while(in_array($id, $used_ids));
                array_push($used_ids, $id);
                DB::table('book_authors')->insert([
                    'author_id' => $id,
                    'book_id' => $i + 1
                ]);
            }

            $used_ids = [];
            for ($j = 0; $j < rand(1, 5); $j++) {
                do{
                    $id = \App\Genre::all()->random()->id;
                }while(in_array($id, $used_ids));
                array_push($used_ids, $id);
                DB::table('book_genres')->insert([
                    'genre_id' => $id,
                    'book_id' => $i + 1
                ]);
            }
        }
        echo("\r");
    }
}
