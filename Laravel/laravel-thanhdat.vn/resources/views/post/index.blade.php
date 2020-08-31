<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1>Trang danh sách bài viết</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="">{{$post->title}}</a>
                {{-- <img src="{{url($post->thumbnail)}}" alt="{{$post->thumbnail}}"> --}}
            </li>
            <p>{{$post->content}}</p>
        @endforeach
    </ul>
    {{ $posts->appends(['sort'=>'votes'])->links()}}
</body>
</html>
