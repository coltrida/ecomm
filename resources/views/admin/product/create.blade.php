@extends('admin.layout.admin')

@section('content')
    <h3>Add Product</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required="" minlength="3" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" required="" class="form-control" id="description" name="description" placeholder="Enter description">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" required="" class="form-control" id="price" name="price" placeholder="Enter description">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <select required="" class="form-control" id="size" name="size">
                        <option selected="selected" value="">Select Size</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category_id">category</label>
                    <select required="" class="form-control" name="category_id" id="category_id">
                        <option selected="selected" value="">Select Category</option>
                        @foreach($categories as $id => $name )
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="image">File input</label>
                    <input type="file" class="form-control-file" id="image" name="image" aria-describedby="fileHelp">
                </div>

                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection