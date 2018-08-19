@extends('admin.layout.admin')

@section('content')
    <div class="navbar">

        @include('admin.category._category-list', ['collection' => $categories['root']])

{{--    	<a class="navbar-brand" href="#">Categories</a>
    	<ul class="nav navbar-nav">

    		@if(!empty($categories))
                @forelse($categories as $category)
                    <li>
                        <a href="{{route('category.show', $category->id)}}">{{$category->name}}</a>
                    </li>
                    @empty
                    <li>No data</li>
                @endforelse
            @endif

    	</ul>--}}

        <a class="btn btn-primary" data-toggle="modal" href="#modal-id">Add Category</a>
        <div class="modal fade" id="modal-id">
        	<div class="modal-dialog">

                <form action="{{route('category.store')}}" method="post">

                    {{csrf_field()}}
                    <input type="hidden" name="parent_id" value="0">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add Category</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>

        	</div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

{{--    @if(!empty($products))
        <section>
            <h3>Products</h3>
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>Products</th>
            		</tr>
            	</thead>
            	<tbody>
                @forelse($products as $product)
            		<tr>
            			<td>{{$product->name}}</td>
            		</tr>
                    @empty
                    <tr><td>No Data</td></tr>
                @endforelse
            	</tbody>
            </table>
        </section>
    @endif--}}
@endsection