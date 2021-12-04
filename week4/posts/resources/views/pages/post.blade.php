@extends('../layouts.postLayout')

@section('content')
    <div class='container'>
        <div style="display: flex; flex-direction: column" class='header'>
            <p>upvotes: {{ $vote_up }}<br>downvotes: {{ $vote_down }}</p>
        </div>

        <div style="padding: 10px; background-color: #e5e5e5" class='post'>
            <h3>{{ $title }}</h3>
            {{ $post }}
        </div>
        <div style=" margin-top: 50px" class='keyWords'>
            {{ 'key words: ' . $key_words }}
        </div>
    </div>
@endsection

@section('back')
    @include('../components/back')
@endsection
