@extends('../layouts.blogLayout')

@section('content')
<div class='container'>
    @foreach($data as $blog)
    <a href='{{route("viewPosts", $blog->id)}}'>{{$blog->blog_name}}</a>
    @endforeach
</div>
@endsection