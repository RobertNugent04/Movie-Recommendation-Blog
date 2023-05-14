<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;

class BlogDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Image from https://assets-prd.ignimgs.com/2022/05/25/starwarssaga-blogroll-1653501853399.jpg
        Post::create([
            'id' => 1,
            'slug' => 'darth-vadar-is-returning',
            'title' => 'Darth Vadar is returning',
            'movieName' => 'Star Wars Episode 9',
            'description' => 'Darth Vadar is returning in the new Star Wars movie. Once the heroic Jedi Knight named Anakin Skywalker, Darth Vader was seduced by the dark side of the Force. Forever scarred by his defeat on Mustafar, Vader was transformed into a cybernetically-enhanced Sith Lord. At the dawn of the Empire, Vader led the Empire’s eradication of the Jedi Order and the search for survivors. He remained in service of the Emperor -- the evil Darth Sidious -- for decades, enforcing his Master’s will and seeking to crush the Rebel Alliance and other detractors. But there was still good in him…',
            'image_path' => '645e441dec5cf-New SW Blog.jpg',
            'created_at' => '2021-02-22 17:47:18',
            'updated_at' => '2021-03-22 19:47:18',
            'user_id' => 1
        ]
    );

    //Image from https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSX5sUyDInfwKIEw8-p-F37ZpOjK97tWaQaTHrFTXf9ezC2o3rw
    Post::create(
    [
        'id' => 2,
        'slug' => 'john-wick-conspiricies',
        'title' => 'John Wick Conspiricies',
        'movieName' => 'John Wick 4',
        'description' => 'John Wick is a character in a popular action film series known for his exceptional skills as a hitman. Over the years, several conspiracy theories have emerged surrounding the character and his story. One of the prevailing theories suggests that John Wick is not just an ordinary hitman but actually a legendary figure or a symbol of a secret organization. According to this theory, his seemingly superhuman abilities and unwavering determination indicate that he is more than just a mortal man. Another conspiracy theory revolves around the idea that the world of John Wick operates under a hidden set of rules and a complex network of assassins, known as the High Table. This theory speculates that there is a vast underworld society with its own hierarchy and code of conduct, governed by the enigmatic High Table. These conspiracies add an intriguing layer to the already captivating world of John Wick, sparking discussions and debates among fans about the hidden depths and mysteries that surround the character and his universe.',
        'image_path' => '645e5837286c2-bad movie.jpg',
        'created_at' => '2023-04-20 17:47:18',
        'updated_at' => '2023-05-10 19:47:18',
        'user_id' => 2
    ]
);

//Image from https://www.scannain.com/media/matrixposters.0.jpeg
Post::create([
    'id' => 3,
    'slug' => 'the-matrix-resurrections-analysis',
    'title' => 'The Matrix Resurrections: Analysis',
    'movieName' => 'The Matrix Resurrections',
    'description' => 'The Matrix Resurrections is the highly anticipated fourth installment in The Matrix film series. Directed by Lana Wachowski, the film explores the themes of reality, identity, and choice, which are the hallmarks of the franchise. Set years after the events of the original trilogy, it follows Neo, Trinity, and a new generation of rebels as they navigate the simulated world of the Matrix and confront the forces that seek to control humanity. The Matrix Resurrections delves deeper into the philosophical underpinnings of the series while delivering mind-bending action sequences and visual spectacles. Fans can expect a thought-provoking and visually stunning cinematic experience that pushes the boundaries of storytelling and visual effects.',
    'image_path' => '646121c5d8cf0-matrix.jpg',
    'created_at' => '2023-05-08 10:30:00',
    'updated_at' => '2023-05-08 10:30:00',
    'user_id' => 3
]);

//Image from https://hips.hearstapps.com/hmg-prod/amv-prod-cad-assets/images/08q3/267465/bat-tastic-batmans-rides-from-the-dark-knight-up-close-and-personal-feature-car-and-driver-photo-216382-s-original.jpg
Post::create([
    'id' => 4,
    'slug' => 'the-dark-knight-legacy',
    'title' => 'The Dark Knight Legacy',
    'movieName' => 'The Dark Knight',
    'description' => 'The Dark Knight, directed by Christopher Nolan, has left a lasting legacy in the world of superhero films. Released in 2008, the film redefined the genre with its gritty realism, complex characters, and thought-provoking themes. Heath Ledger delivered an iconic performance as the Joker, creating a villain that is both terrifying and captivating. The film explores the moral dilemmas faced by Batman as he confronts the chaos unleashed by the Joker in Gotham City. With its masterful storytelling, intense action sequences, and exploration of deeper themes, The Dark Knight has become a benchmark for superhero films and continues to influence the genre to this day.',
    'image_path' => '64612350c68ca-batman.jpg',
    'created_at' => '2023-05-10 14:15:00',
    'updated_at' => '2023-05-10 14:15:00',
    'user_id' => 1
]);

//Image from https://m.media-amazon.com/images/M/MV5BMTUxMjI3Njk4OF5BMl5BanBnXkFtZTcwNzI2NjQ0Mw@@._V1_SX1500_CR0,0,1500,999_AL_.jpg
Post::create([
    'id' => 5,
    'slug' => 'inception-mind-bending-thriller',
    'title' => 'Inception: A Mind-Bending Thriller',
    'movieName' => 'Inception',
    'description' => 'Inception, directed by Christopher Nolan, is a mind-bending thriller that takes audiences on a journey into the realm of dreams. The film follows Dom Cobb, a skilled thief who specializes in stealing valuable secrets from people\'s subconscious. However, instead of stealing, he is tasked with planting an idea in someone\'s mind through a process called "inception." As the intricate heist unfolds, viewers are taken through layers of dreams within dreams, blurring the lines between reality and illusion. Inception is a visually stunning and intellectually stimulating film that challenges perceptions and explores the power of the human mind.',
    'image_path' => '6461239a4d15e-inception.jpg',
    'created_at' => '2023-05-12 09:45:00',
    'updated_at' => '2023-05-12 09:45:00',
    'user_id' => 2
]);

// Image from https://image.cnbcfm.com/api/v1/image/105828186-1554212544565avengers-endgame-poster-og-social-crop.jpg?v=1555618903&w=1600&h=900
Post::create([
    'id' => 6,
    'slug' => 'avengers-endgame-epic-culmination',
    'title' => 'Avengers: Endgame - An Epic Culmination',
    'movieName' => 'Avengers: Endgame',
    'description' => 'Avengers: Endgame marks the epic culmination of the Marvel Cinematic Universe\'s Infinity Saga. Directed by the Russo brothers, the film brings together an ensemble cast of beloved superheroes as they face their greatest threat yet, Thanos. Endgame takes audiences on an emotional rollercoaster as the Avengers embark on a mission to undo the devastating events of Infinity War. With stunning action sequences, heartfelt moments, and surprising twists, the film delivers a satisfying conclusion to over a decade of interconnected storytelling. Avengers: Endgame is a celebration of superheroes and the power of teamwork, leaving a lasting impact on both fans and the wider cinematic landscape.',
    'image_path' => '64612422bbdfd-avengers.jpg',
    'created_at' => '2023-05-14 16:30:00',
    'updated_at' => '2023-05-14 16:30:00',
    'user_id' => 3
]);

//Image from https://www.hollywoodreporter.com/wp-content/uploads/2021/11/nhw_still_107-H-2021.jpg?w=1024
Post::create([
    'id' => 7,
    'slug' => 'spiderman-returns-home',
    'title' => 'Spider-Man Returns Home',
    'movieName' => 'Spider-Man: No Way Home',
    'description' => 'In the latest installment of the Spider-Man franchise, Tom Holland returns as Peter Parker, aka Spider-Man. The movie picks up where the last one left off, with Peter\'s identity being revealed to the world by Mysterio. Peter turns to Doctor Strange for help, and they embark on a dangerous journey through the multiverse to fix the timeline and stop the impending threat of the Sinister Six. Along the way, Peter reunites with old friends, including Tobey Maguire and Andrew Garfield as their respective versions of Spider-Man, and faces off against some of his most dangerous enemies. The movie is packed with action, humor, and heart, and is a must-see for any Spider-Man fan.',
    'image_path' => '646124e9e3c50-spiderman.jpg',
    'created_at' => '2022-12-20 10:00:00',
    'updated_at' => '2023-01-05 16:30:00',
    'user_id' => 1
]);

//Image from https://media.npr.org/assets/img/2014/11/13/fl-17895r_wide-d745edc663a75ddc961f66684631a621dc148566.jpg
Post::create([
    'id' => 8,
    'slug' => 'the-great-sci-fi-adventure',
    'title' => 'The Great Sci-Fi Adventure',
    'movieName' => 'Interstellar',
    'description' => 'Embark on a thrilling journey across the cosmos in the sci-fi masterpiece, Interstellar. Directed by Christopher Nolan, this film takes place in a future where Earth is facing an environmental crisis. A group of astronauts is sent through a wormhole to explore distant planets in search of a new habitable world. As they venture into the unknown, they encounter mind-bending phenomena and face the limits of human endurance. Interstellar combines stunning visuals, a gripping storyline, and thought-provoking themes of love, sacrifice, and the nature of time. Get ready for a cinematic experience that will leave you questioning the boundaries of human exploration.',
    'image_path' => '6461225162d6c-interstellar.jpg',
    'created_at' => '2014-11-07 09:00:00',
    'updated_at' => '2014-12-01 14:30:00',
    'user_id' => 2
]);

//Image from https://images-na.ssl-images-amazon.com/images/S/pv-target-images/6d0dbdd5d2be872e0d2b59a7cdc7dbebb2fb4303ae3b5cef3b9d3d0804b4650e._RI_.jpg
Post::create([
    'id' => 9,
    'slug' => 'the-magical-adventure',
    'title' => 'The Magical Adventure',
    'movieName' => 'Harry Potter and the Philosopher\'s Stone',
    'description' => 'Step into the enchanting world of "Harry Potter and the Philosopher\'s Stone," the first installment in the beloved film franchise based on J.K. Rowling\'s best-selling novels. Join young Harry Potter as he discovers he is a wizard and enters the prestigious Hogwarts School of Witchcraft and Wizardry. With his new friends Ron and Hermione, Harry embarks on a thrilling adventure filled with magic, friendship, and the discovery of his true destiny. Directed by Chris Columbus, this film captures the wonder and imagination of Rowling\'s universe, bringing iconic characters and magical creatures to life. "Harry Potter and the Philosopher\'s Stone" is a captivating blend of fantasy, friendship, and the power of believing in oneself.',
    'image_path' => '646123fe6628e-harry potter.jpg',
    'created_at' => '2001-11-16 08:00:00',
    'updated_at' => '2001-11-28 12:45:00',
    'user_id' => 3
]);

//Image from https://img.buzzfeed.com/buzzfeed-static/static/2014-03/campaign_images/webdr06/25/22/the-real-life-story-that-inspired-up-is-even-more-2-15283-1395801689-35_dblbig.jpg?resize=1200:*
Post::create([
    'id' => 10,
    'slug' => 'the-heartwarming-animation',
    'title' => 'The Heartwarming Animation',
    'movieName' => 'Up',
    'description' => 'Experience a heartwarming adventure filled with laughter and tears in Pixar\'s "Up." This animated gem tells the story of Carl Fredricksen, a 78-year-old widower who embarks on a journey to fulfill his late wife\'s lifelong dream of traveling to South America. With his house lifted by thousands of balloons, Carl finds an unexpected stowaway, a young Wilderness Explorer named Russell. Together, they encounter a colorful cast of characters and face thrilling challenges as they explore a hidden world in the clouds. "Up" is a testament to the power of friendship, love, and the joy of pursuing dreams. With its stunning animation, heartfelt storytelling, and memorable characters, this film will lift your spirits and touch your heart.',
    'image_path' => '6461252506a2c-up.jpg',
    'created_at' => '2009-05-29 09:30:00',
    'updated_at' => '2009-06-12 12:15:00',
    'user_id' => 1
]);
    }
}
