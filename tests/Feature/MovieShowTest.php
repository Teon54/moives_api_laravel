<?php

namespace Tests\Feature;

use Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieShowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_main_page_shows_correct_info(): void
    {
        $response = $this->get(route('movies.index'));

        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => Http::response($this->fakePopularMovies()),
            'https://api.themoviedb.org/3/movie/now_playing' => Http::response($this->fakeNowPlayingMovies()),
            'https://api.themoviedb.org/3/genre/movie/list' => Http::response($this->fakeGenres()),
        ],
            200
        );

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('No Way Up');
        $response->assertSee('Action, Horror, Thriller');
        $response->assertSee('Now Playing');
        $response->assertSee('Poor Things');
    }

    public function test_one_movie_page_shows_correct_info(): void
    {
        $response = $this->get(route('movies.show', [
            'id' => 980137
        ]));

        Http::fake([
                'https://api.themoviedb.org/3/movie/*' => Http::response($this->fakeMovie()),
            ]
        );

        $response->assertSuccessful();
        $response->assertSee('Papá o Mamá');
    }

    public function fakePopularMovies(): array
    {
        return [
            'page' => 1,
            'results' => [
                "adult" => false,
                "backdrop_path" => "/4woSOUD0equAYzvwhWBHIJDCM88.jpg",
                "genre_ids" => [
                    28,
                    27,
                    53
                ],
                "id" => 1096197,
                "original_language" => "en",
                "original_title" => "No Way Up",
                "overview" => "Characters from different backgrounds are thrown together when the plane they're travelling on crash
es into the Pacific Ocean. A nightmare fight for survival ensues with the air supply running out and dangers creeping in from all sides.",
                "popularity" => 2105.449,
                "poster_path" => "/7FpGJTN8IL6IBvQMp6YHBFyhO9Z.jpg",
                "release_date" => "2024-01-18",
                "title" => "No Way Up",
                "video" => false,
                "vote_average" => 5.807,
                "vote_count" => 88,
            ],
            'total_pages' => 42762,
            'total_results' => 855229,
        ];
    }

    public function fakeNowPlayingMovies(): array
    {
        return [
            'page' => 1,
            'results' => [
                "adult" => false,
                "backdrop_path" => "/bQS43HSLZzMjZkcHJz4fGc7fNdz.jpg",
                "genre_ids" => [
                    878,
                    10749,
                    35,
                ],
                "id" => 792307,
                "original_language" => "en",
                "original_title" => "Poor Things",
                "overview" => "Brought back to life by an unorthodox scientist, a young woman runs off with a debauched lawyer on a w
hirlwind adventure across the continents. Free from the prejudices of her times, she grows steadfast in her purpose to stand for equality and liberation.",
                "popularity" => 1357.698,
                "poster_path" => "/kCGlIMHnOm8JPXq3rXM6c5wMxcT.jpg",
                "release_date" => "2023-12-07",
                "title" => "Poor Things",
                "video" => false,
                "vote_average" => 8.065,
                "vote_count" => 1568,
            ]
            ,
            'total_pages' => 42762,
            'total_results' => 855229,
        ];
    }

    public function fakeGenres(): array
    {
        return [
            "genres" => [
                [
                    "id" => 28,
                    "name" => "Action",
                ],
                [
                    "id" => 12,
                    "name" => "Adventure",
                ],
                [
                    "id" => 16,
                    "name" => "Animation",
                ],
                [
                    "id" => 35,
                    "name" => "Comedy",
                ],
                [
                    "id" => 80,
                    "name" => "Crime",
                ],
                [
                    "id" => 99,
                    "name" => "Documentary",
                ],
                [
                    "id" => 18,
                    "name" => "Drama",
                ],
                [
                    "id" => 10751,
                    "name" => "Family",
                ],
                [
                    "id" => 14,
                    "name" => "Fantasy",
                ],
                [
                    "id" => 36,
                    "name" => "History",
                ],
                [
                    "id" => 27,
                    "name" => "Horror",
                ],
                [
                    "id" => 10402,
                    "name" => "Music",
                ],
                [
                    "id" => 9648,
                    "name" => "Mystery",
                ],
                [
                    "id" => 10749,
                    "name" => "Romance",
                ],
                [
                    "id" => 878,
                    "name" => "Science Fiction",
                ],
                [
                    "id" => 10770,
                    "name" => "TV Movie",
                ],
                [
                    "id" => 53,
                    "name" => "Thriller",
                ],
                [
                    "id" => 10752,
                    "name" => "War",
                ],
                [
                    "id" => 37,
                    "name" => "Western",
                ],
            ]
        ];
    }

    public function fakeMovie(): array
    {
        return [
            "adult" => false,
            "backdrop_path" => "/d2d0njdp19FbuOGTW1dbrVMJpTH.jpg",
            "belongs_to_collection" => null,
            "budget" => 0,
            "genres" => [
                [
                    "id" => 35,
                    "name" => "Comedy"
                ]
            ],
            "homepage" => "",
            "id" => 980137,
            "imdb_id" => "tt17518264",
            "original_language" => "es",
            "original_title" => "Papá o Mamá",
            "overview" => "Florencia and Vicente are getting divorced. When both are promoted at their jobs, they will do anything in order to do not keep custody of their children.",
            "popularity" => 431.358,
            "poster_path" => "/e0ezklncv9ApFVj50FSYJZo08oT.jpg",
            "production_companies" => [
                [
                    "id" => 7570,
                    "logo_path" => "/gW8dfVtl1JsGIiLnvglea1OHHVr.png",
                    "name" => "Videocine",
                    "origin_country" => "MX"
                ]
            ],
            "production_countries" => [
                [
                    "iso_3166_1" => "MX",
                    "name" => "Mexico"
                ]
            ],
            "release_date" => "2023-11-30",
            "revenue" => 0,
            "runtime" => 92,
            "spoken_languages" => [
                [
                    "english_name" => "Spanish",
                    "iso_639_1" => "es",
                    "name" => "Español"
                ]
            ],
            "status" => "Released",
            "tagline" => "They will do anything to get rid of them.",
            "title" => "Dad or Mom",
            "video" => false,
            "vote_average" => 7.305,
            "vote_count" => 41,
            "credits" => [
                "cast" => [
                    [
                        "adult" => false,
                        "gender" => 2,
                        "id" => 175615,
                        "known_for_department" => "Acting",
                        "name" => "Mauricio Ochmann",
                        "original_name" => "Mauricio Ochmann",
                        "popularity" => 6.217,
                        "profile_path" => "/h5NuTsPV9HdsjPSuBG4vZtvKtlF.jpg",
                        "cast_id" => 5,
                        "character" => "Vicente",
                        "credit_id" => "646fa0235437f501475e9e65",
                        "order" => 0
                    ],
                ],
                "crew" => [
                    [
                        "adult" => false,
                        "gender" => 2,
                        "id" => 57558,
                        "known_for_department" => "Writing",
                        "name" => "Matthieu Delaporte",
                        "original_name" => "Matthieu Delaporte",
                        "popularity" => 5.641,
                        "profile_path" => "/ofOMIBoC3FyRgfPRWhQxzJMCeLy.jpg",
                        "credit_id" => "64316e831f98d10222212831",
                        "department" => "Writing",
                        "job" => "Original Film Writer"
                    ],
                ]
            ],
            "videos" => [
                "results" => [
                    [
                        "iso_639_1" => "en",
                        "iso_3166_1" => "US",
                        "name" => "Papá o mamá - Tráiler Oficial",
                        "key" => "aXxvw4CLSH4",
                        "site" => "YouTube",
                        "size" => 1080,
                        "type" => "Trailer",
                        "official" => true,
                        "published_at" => "2023-06-13T15:12:17.000Z",
                        "id" => "65403e9157530e012cf429b1"
                    ]
                ]
            ],
            "images" => [
                "backdrops" => [
                    [
                        "aspect_ratio" => 1.782,
                        "height" => 872,
                        "iso_639_1" => null,
                        "file_path" => "/d2d0njdp19FbuOGTW1dbrVMJpTH.jpg",
                        "vote_average" => 5.312,
                        "vote_count" => 1,
                        "width" => 1554
                    ],
                ],
                "logos" => [],
                "posters" => [
                    [
                        "aspect_ratio" => 0.667,
                        "height" => 3000,
                        "iso_639_1" => "es",
                        "file_path" => "/e0ezklncv9ApFVj50FSYJZo08oT.jpg",
                        "vote_average" => 5.312,
                        "vote_count" => 1,
                        "width" => 2000
                    ],
                ]
            ]
        ];
    }
}
