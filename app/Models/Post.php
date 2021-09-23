<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
    public string $title;
    public string $excerpt;
    public string $date;
    public string $slug;
    public string $body;

    public function __construct($title, $excerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(): Collection
    {
        return cache()->rememberForever("posts.all", function () {

            $files = File::files(resource_path('posts'));

            return collect($files)->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->slug,
                    $document->body()
                );
            })->sortByDesc("date");
        });
    }

    public static function findOrFail($slug)
    {
        $posts = static::all();
        if (!$post = $posts->firstWhere('slug', $slug)) {
            throw new ModelNotFoundException();
        }
        return $posts->firstWhere('slug', $slug);

    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

}
