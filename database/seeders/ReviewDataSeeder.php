<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Review;

class ReviewDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'id' => 1,
            'user_id' => 1,
            'movie_id' => 594767,
            'movie_name' => 'Shazam! Fury of the Gods',
            'review' => 'Great movie! Highly recommend you watch it.',
            'created_at' => '2021-06-11 14:18:50',
            'updated_at' => '2021-06-11 14:18:50',
            'rating' => 5
        ]);

        Review::create([
            'id' => 2,
            'user_id' => 1,
            'movie_id' => 76600,
            'movie_name' => 'Avatar: The Way of Waters',
            'review' => 'It was alright. Felt long and a bit bland a times but was a good movie overall.',
            'created_at' => '2023-02-11 14:18:50',
            'updated_at' => '2023-02-11 14:18:50',
            'rating' => 3
        ]);

        Review::create([
            'id' => 3,
            'user_id' => 2,
            'movie_id' => 713704,
            'movie_name' => 'Evil Dead Rise',
            'review' => 'Brilliant Movie. Really kept me on the edge of my seat the whole time and left me terrified at times. Really enjoyed it. Would recommend!',
            'created_at' => '2023-04-13 13:17:50',
            'updated_at' => '2023-04-13 14:18:50',
            'rating' => 3
        ]);

        Review::create([
            'id' => 4,
            'user_id' => 2,
            'movie_id' => 640146,
            'movie_name' => 'Ant-Man and the Wasp: Quantumania',
            'review' => 'Another amazing instalment into the series! Enjoyed every moment of watching this masterpiece.10/10.',
            'created_at' => '2023-04-20 11:18:50',
            'updated_at' => '2023-04-20 14:18:50',
            'rating' => 3
        ]);

        Review::create([
            'id' => 5,
            'user_id' => 3,
            'movie_id' => 640146,
            'movie_name' => 'Ant-Man and the Wasp: Quantumania',
            'review' => 'Did\'t like this one as much as the previous Ant man movie. Had a lot less action and the story wasn\'t as exciting to me. It wasn\'t a terrible movie, but it was just lacking that spark that make the last one so brilliant.',
            'created_at' => '2023-04-29 07:02:50',
            'updated_at' => '2023-04-29 11:20:50',
            'rating' => 2
        ]);

        Review::create([
            'id' => 6,
            'user_id' => 3,
            'movie_id' => 502356,
            'movie_name' => 'The Super Mario Bros. Movie',
            'review' => 'Didn\'t think that this movie was going to be as good as it was before I watched it. From start to end, this movie was an absolute joy to watch and I would highly recommend it!',
            'created_at' => '2023-04-29 07:02:50',
            'updated_at' => '2023-04-29 11:20:50',
            'rating' => 2
        ]);

        Review::create([
            'id' => 7,
            'user_id' => 1,
            'movie_id' => 502356,
            'movie_name' => 'The Super Mario Bros. Movie',
            'review' => 'Really enjoyed this movie. It was a lot better than I thought it was going to be. Would recommend to anyone who is a fan of the games.',
            'created_at' => '2023-05-01 10:02:50',
            'updated_at' => '2023-05-02 12:20:50',
            'rating' => 2
        ]);

    }
}
