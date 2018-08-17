@extends('layout.main')

@section('content')
    <div class="row">
        <h3>Cart Items</h3>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Size</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->price}}</td>
                    <form action="{{route('cart.update', $cartItem->rowId)}}" method="post">
                        {{csrf_field()}}
                        <td width="100px">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="text" name="qty" value="{{$cartItem->qty}}">
                        </td>
                        <td>
                            <select class="form-control" id="size" name="size">
                                <option value="small" @if($cartItem->options->size == 'small') selected="selected"  @endif>Small</option>
                                <option value="medium" @if($cartItem->options->size == 'medium') selected="selected" @endif>Medium</option>
                                <option value="large" @if($cartItem->options->size == 'large') selected="selected" @endif> Large</option>
                            </select>
                        </td>

                    <td>
                        <input style="float: left" type="submit" class="button small" value="ok">
                    </form>
                        <form action="{{route('cart.destroy', $cartItem->rowId)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" value="Delete" class="button small alert">
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    Tax: ${{Cart::tax()}} <br>
                    Sub Total: ${{Cart::subtotal()}} <br>
                    Total: ${{Cart::total()}}
                </td>
                <td>Items: {{Cart::count()}}</td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>

        <a href="{{route('checkout.shipping')}}" class="button">Checkout</a>
    </div>

@endsection