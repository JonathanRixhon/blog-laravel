@extends("layout")

@section("main_title")
    <title>{{$page_title}}</title>
@endsection

@section('main_content')
    <h1>Hello World</h1>
    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
            </h2>
            <p>
                Publised on: <span>{{$post->date}}</span>
            </p>
            <p>
                {{$post->excerpt}}
            </p>
        </article>
    @endforeach
@endsection
