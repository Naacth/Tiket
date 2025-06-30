<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'description' => 'Setelah peristiwa yang menghancurkan di Avengers: Infinity War, alam semesta dalam reruntuhan. Dengan bantuan yang tersisa dari Avengers, tim harus berkumpul sekali lagi untuk membalikkan tindakan Thanos dan mengembalikan keseimbangan alam semesta.',
                'genre' => 'Action, Adventure, Drama',
                'duration' => 181,
                'director' => 'Anthony Russo, Joe Russo',
                'cast' => 'Robert Downey Jr., Chris Evans, Mark Ruffalo',
                'poster' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=TcMBFSGVi1c',
                'rating' => 'PG-13',
                'is_active' => true,
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'description' => 'Peter Parker mengungkapkan identitas Spider-Man-nya kepada dunia dan meminta bantuan Doctor Strange untuk membuat dunia melupakan hal tersebut. Namun, ketika mantra berjalan salah, multiverse terbuka.',
                'genre' => 'Action, Adventure, Fantasy',
                'duration' => 148,
                'director' => 'Jon Watts',
                'cast' => 'Tom Holland, Zendaya, Benedict Cumberbatch',
                'poster' => 'https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=JfVOs4VSpmA',
                'rating' => 'PG-13',
                'is_active' => true,
            ],
            [
                'title' => 'The Batman',
                'description' => 'Ketika Riddler, seorang pembunuh berantai sadis, mulai membunuh tokoh-tokoh politik elit di Gotham, Batman dipaksa untuk menyelidiki, dan menemukan korupsi yang mengejutkan.',
                'genre' => 'Action, Crime, Drama',
                'duration' => 176,
                'director' => 'Matt Reeves',
                'cast' => 'Robert Pattinson, Zoë Kravitz, Paul Dano',
                'poster' => 'https://image.tmdb.org/t/p/w500/74xTEgt7R36Fpooo50r9T25onhq.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=mqqft2x_Aa4',
                'rating' => 'PG-13',
                'is_active' => true,
            ],
            [
                'title' => 'Dune',
                'description' => 'Paul Atreides, seorang pemuda berbakat yang lahir dengan takdir besar, harus melakukan perjalanan ke planet paling berbahaya di alam semesta untuk memastikan masa depan keluarga dan rakyatnya.',
                'genre' => 'Adventure, Drama, Sci-Fi',
                'duration' => 155,
                'director' => 'Denis Villeneuve',
                'cast' => 'Timothée Chalamet, Rebecca Ferguson, Oscar Isaac',
                'poster' => 'https://image.tmdb.org/t/p/w500/d5NXSklXo0qyIYkgV94XAgMIckC.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=n9xhJrPXop4',
                'rating' => 'PG-13',
                'is_active' => true,
            ],
            [
                'title' => 'No Time to Die',
                'description' => 'James Bond telah meninggalkan dinas aktif dan menikmati kehidupan yang tenang di Jamaika. Namun, kedamaiannya berumur pendek ketika Felix Leiter, teman lamanya dari CIA, muncul meminta bantuan.',
                'genre' => 'Action, Adventure, Thriller',
                'duration' => 163,
                'director' => 'Cary Joji Fukunaga',
                'cast' => 'Daniel Craig, Ana de Armas, Rami Malek',
                'poster' => 'https://image.tmdb.org/t/p/w500/iUgygt3fscRoKWCV1d0C7FbM9TP.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=BIhNsAtPbPI',
                'rating' => 'PG-13',
                'is_active' => true,
            ],
            [
                'title' => 'Black Widow',
                'description' => 'Natasha Romanoff menghadapi masa lalunya yang gelap ketika konspirasi berbahaya muncul yang melibatkan dirinya. Dikejar oleh kekuatan yang tidak akan berhenti sampai dia dihancurkan.',
                'genre' => 'Action, Adventure, Sci-Fi',
                'duration' => 134,
                'director' => 'Cate Shortland',
                'cast' => 'Scarlett Johansson, Florence Pugh, David Harbour',
                'poster' => 'https://image.tmdb.org/t/p/w500/qAZ0pzat24kLdO3o8ejmbLxyOac.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=Fp9pNPdNwjI',
                'rating' => 'PG-13',
                'is_active' => true,
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
} 