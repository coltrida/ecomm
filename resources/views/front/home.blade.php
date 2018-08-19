@extends('layout.main')

@section('content')
    <section class="hero text-center">
        <br/>
        <br/>
        <br/>
        <br/>
        <h2>
            <strong>
                Hey! Welcome to DAVIDE's Store
            </strong>
        </h2>
        <br>
        <a href="{{route('shirts')}}">
            <button class="button large">Check out My Shirts</button>
        </a>
    </section>
    <br/>
    <div class="subheader text-center">
        <h2>
            MyKey&rsquo;s Latest Shirts
        </h2>
    </div>

    <!-- Latest SHirts -->
    <div class="row">
        @forelse($shirts as $shirt)

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.addItem', $shirt->id)}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                            <img src="{{asset("images/$shirt->image")}}"/>
                        </a>
                    </div>
                    <a href="{{route('shirt')}}">
                        <h3>
                            {{$shirt->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$shirt->price}}
                    </h5>
                    <p>
                        {{$shirt->description}}
                    </p>
                </div>
            </div>

        @empty
            <h3>No shirts</h3>
        @endforelse
    </div>
    <!-- Footer -->
    <br>
@endsection