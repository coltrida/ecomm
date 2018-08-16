@extends('admin.layout.admin')

@section('content')
    <h3>Products</h3>

    <ul>
        @forelse($products as $product)
        <li>
            <h4>Name of product:{{$product->name}}</h4>
            <h4>Category:{{$product->category->name}}</h4>
            <form action="{{route('product.destroy', $product->id)}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
            </form>
        </li>
            @empty
            <h3>No products</h3>
        @endforelse
    </ul>
@endsection