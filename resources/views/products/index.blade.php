<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar nav-expand-sm bg-dark">
        <ul class="nav nav-underline px-4">
            <li class="nav-item">
              <a class="nav-link text-light" href="/">Products</a>
            </li>

          </ul>
      </nav>

      <div class="container">
        <div class="text-end">
            <a class="btn btn-dark mt-2" href="/create_product">New Product</a>
        </div>
        <h1>New Products</h1>

        <table class="table table-light table-striped mt-2">
            <tr>
                <th class="text-center">ID No.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th class="text-center">Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td class="text-center">{{$loop->index+1}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td><img class="rounded-circle" src="products/{{$product->image}}" alt="" height="50" width="50"></td>
                <td class="text-center">
                    <a class="btn btn-dark btn-sm" href="{{$product->id}}/edit">Edit</a>
                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                </td>
                @endforeach





            </tr>
          </table>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
