@extends('app.app')
@section('main')

<div class="container">
<div class="text-end">
    <a class="btn btn-dark mt-2 text-center" href="/create_product">New Product</a>
</div>
<h1>New Products</h1>

<table class="table table-light table-striped mt-2">
    <tbody>
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
            <td><a class="text-dark" href="products/{{$product->id}}/show">{{$product->name}}</a></td>
            <td>{{$product->description}}</td>
            <td><img class="rounded-circle" src="products/{{$product->image}}" alt="" height="50" width="50"></td>
            <td class="text-center ">
                <a class="btn btn-dark btn-sm" href="products/{{$product->id}}/edit">Edit</a>
                {{-- <a class="btn btn-danger btn-sm" href="">Delete</a> --}}
                <form class="d-inline" action="products/{{$product->id}}/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete2</button>
                </form>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
{{$products->links()}}
</div>
@endsection
