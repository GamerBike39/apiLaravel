<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon mini-blog</title>
</head>

<body>

    <h1>Nos articles</h1>

    {{-- {{ dd($articles) }} --}}
    <ul>
        @foreach ($articles as $article)
            <li><a href="home/{{ $article->id }}">{{ $article->titre }}</a></li>
        @endforeach
    </ul>



</body>

</html>
