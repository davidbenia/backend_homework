@extends('../layouts.postCreateLayout')

@section('title', 'Create New Post')

@section('forms')
    <div id="createContainer">
        <h3>Create a new Post for {{ $name }}</h3>
        <form action="{{ route('posts.store') }}" method='POST'>
            @csrf

            <div class='row'>
                <input type='hidden' name='user_id' class='form-control' value={{ $userID }} />
            </div>
            <div class='row'>
                <div class='form-group'>
                    <strong>Title:</strong>
                    <input type='text' name='title' class="form-control" placeholder="Enter title..." />
                </div>
            </div>
            <div class='row'>
                <div class='form-group'>
                    <strong>Post:</strong>
                    <textarea style="height: 300px" name='post' class="form-control"
                        placeholder="Enter text..."></textarea>
                </div>
            </div>
            <div class='row'>
                <div class='form-group'>
                    <strong>Key Words:</strong>
                    <textarea name='key_words' class="form-control" placeholder="Enter key words..."></textarea>
                </div>
            </div>
            <div class='row'>
                <button type='submit' class="waves-effect waves-light btn">Submit Post</button>
            </div>
        </form>
    </div>
@endsection

@section('back')
    @include('../components/back')
@endsection
