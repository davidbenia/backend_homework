@extends('../layouts.postLayout')

@section('content')
    <div class='container'>
        <h3>{{ $title }}</h3>

        <div class='post'>
            {{ $post }}
        </div>
        <div class='keyWords'>
            {{ $key_words }}
        </div>
    </div>
@endsection

@section('back')
    @include('../components/back')
@endsection
