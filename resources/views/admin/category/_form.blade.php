<form action="{{route('category.store')}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="parent_id" value="{{$category->id}}">
    <input type="text" name="name" class="form-control">
    <input type="submit" value="Submit">
</form>