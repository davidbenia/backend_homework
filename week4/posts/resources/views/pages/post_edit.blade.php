@extends('../layouts.postCreateLayout')

@section('title', 'Create New Post')

@section('forms')
    <div id="createContainer">
        <h3>Edit Post</h3>
        <form action="{{ route('posts.update', $slug) }}" method='POST'>
            @csrf
            @method('PUT')

            <div class='row'>
                <div class='form-group'>
                    <strong>Title:</strong>
                    <input value="{{ $title }}" type='text' name='title' class="form-control"
                        placeholder="Enter title..." />
                </div>
            </div>
            <div class='row'>
                <div class='form-group'>
                    <strong>Post:</strong>
                    <textarea style="height: 300px" name='post' class="form-control"
                        placeholder="Enter text...">{{ $post }}</textarea>
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
