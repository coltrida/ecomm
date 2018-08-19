<ol id="cat">
    @if(!empty($collection))
        @forelse($collection as $category)
            <li>
                <a style="{{$category->parent_id==0 ? 'font-size:22px; color: red; font-weight: 500' : '' }}" href="{{route('category.show', $category->id)}}">{{$category->name}}</a>
                @include('admin.category._form')

                @if(isset($categories[$category->id]))
                    @include('admin.category._category-list', ['collection' => $categories[$category->id]])
                @endif

            </li>
            @empty
            <li>No items</li>
        @endforelse
    @endif
</ol>