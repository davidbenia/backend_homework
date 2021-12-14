@extends('../layouts.blogLayout')

@section('header')
    <h3>{{ $user->name }} Posts</h3>
@endsection

@section('content')
    @if ($message = session()->get('success'))
        <script>
            M.toast({
                html: '{{ $message }}',
                classes: 'rounded'
            });
        </script>
    @endif

    <a class="waves-effect waves-light btn"
        href="{{ route('posts.create', ['name' => $user->name, 'userID' => $user->id]) }}">Create New
        Post
    </a>
    <span style='margin-left: -150px'>@include('../components/back')</span>
    <div class='container'>
        @foreach ($posts as $post)
            <div class="col s12 m7">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>
                                {{ $post->title }}
                            </p>
                            <p style="margin-top: 10px">upvotes: {{ $post->vote_up }}
                                <br>downvotes:
                                {{ $post->vote_down }}
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('posts.show', $post->slug) }}">View Post</a>
                            <a href="{{ route('posts.edit', $post->slug) }}">Edit Post</a>
                            <form
                                action="{{ route('posts.destroy', ['slug' => $post->slug, 'userID' => $post->user_id]) }}"
                                method='POST'>
                                @csrf
                                @method("DELETE")
                                <button class="btn red" onclick="return confirm('Delete post?')"
                                    type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
