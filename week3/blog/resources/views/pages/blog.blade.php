@extends('../layouts.blogLayout')

@section('content')
<div class='blogContainer'>
    @foreach($content['data'] as $post)
    <a href='{{route("showPost", $post->slug)}}'>{{$post->title}}</a>
    <p>
        <span>last modified: {{$post->updated_at}}</span><br>
        by {{$post->author}}
    </p>
    @endforeach

    @include('../components/navButton', ['page' => $content['first'], 'text' => 'first'])
    @include('../components/navButton', ['page' => $content['prev'], 'text' => '<'])
    @include('../components/navButton', ['page' => $content['next'], 'text' => '>'])
    @include('../components/navButton', ['page' => $content['last'], 'text' => 'last'])

</div>
@endsection
