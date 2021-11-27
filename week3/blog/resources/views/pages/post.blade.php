@extends('../layouts.postLayout')

@section('content')
<div class='postContainer'>
    <div class="posts" style='padding:25px'>
       <h1>{{$content[0]['title']}}</h1>
       <h4>by {{$content[0]['author']}}</h4>
       <p>{{$content[0]['post']}}</p>
       <a href="/">
           <button>Home</button>
       </a>
    </div>
</div>
@endsection
