@extends('layout.main')

@section('content')
    <div class="row">
        <div class="small-6 small-centered column">
            <h3>Shipping Info</h3>
            <form action="{{route('address.store')}}" method="post">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="addressline">Address line</label>
                    <input type="text" class="form-control" name="addressline" placeholder="Enter addressline">
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter city">
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" placeholder="Enter state">
                </div>

                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" name="zip" placeholder="Enter zip">
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" placeholder="Enter country">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                </div>

                <button type="submit" class="button success">Proceed to Payment</button>

            </form>
        </div>
    </div>
@endsection