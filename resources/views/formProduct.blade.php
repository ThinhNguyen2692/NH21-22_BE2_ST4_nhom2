<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ url('product')}}" method="POST">
    <div class="row">
                     @csrf
                    <button type="submit">
                    store</button>
    </form>
    <form action="{{ url('product/12')}}" method="POST">
    <div class="row">
    @method('PUT')
                     @csrf
                    <button type="submit">
                 UPDATE</button>
    </form>
    <form action="{{ url('product/12')}}" method="POST">
    <div class="row">
    @method('DELETE')
                     @csrf
                    <button type="submit">
                    DELETE</button>
    </form>
    
</body>
</html>