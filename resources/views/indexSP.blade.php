<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </style>
    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/index">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/indexGT">Gioi thieu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/indexSP">san pham</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/indexLH">lien he</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/indexBG">ban ghe</a>
      </li>
    </ul>
    <table>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>CPU</th>
      </tr>
      @foreach($data as $row)
        <tr>
          <td>{{ $row->name}}</td>
          <td>{{ $row->price}}</td>
          <td>{{ $row->chip}}</td>
        </tr>
      @endforeach
    </table>
  </div>
</nav>
            <div>Đây là sản phẩm</div>
          
    </body>
</html>
