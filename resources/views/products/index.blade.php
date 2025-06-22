<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ürünler</h1>
    @foreach($products as $product)
        <h2>{{$product->name}} ({{$product->qty}})</h2>
        <p>
            {{$product->description}}
        </p>
        <a href="/urunler/sil/{{$product->id}}">Sil</a>
    @endforeach
</body>
</html>
