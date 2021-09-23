<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<h1>Hello World</h1>

<?php foreach ($posts as $post): ?>
<article>
    <h1>
        <a href="/posts/<?= $post->slug?>"><?=$post->title?></a>
    </h1>
    <p>
        Publised on: <span><?=$post->date?></span>
    </p>
    <p>
        <?=$post->excerpt ?>
    </p>
</article>
<?php endforeach;?>
</body>
</html>