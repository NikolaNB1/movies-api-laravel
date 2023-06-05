<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieService
{

    public function showMovies()
    {

        $movies = Movie::get();
        return $movies;
    }

    public function postMovie(Request  $request)
    {

        $request->validate([]);

        $movie = new Movie();

        $movie->title = $request->title;
        $movie->director = $request->director;
        $movie->image_url = $request->image_url;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;
        $movie->genre = $request->genre;
        $movie->save();

        return $movie;
    }

    public function showMovie($id)
    {

        $movie = Movie::find($id);
        return $movie;
    }

    public function editMovie(Request $request, string $id)
    {

        $movie = Movie::find($id);
        error_log($request->title);
        $movie->title = $request->title;
        $movie->director = $request->director;
        $movie->image_url = $request->image_url;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;
        $movie->genre = $request->genre;
        $movie->save();

        return $movie;
    }

    public function deleteMovie($id)
    {

        Movie::destroy($id);
    }
}
