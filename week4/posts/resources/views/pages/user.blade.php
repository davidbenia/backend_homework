@extends('../layouts.userLayout')

@section('content')
    @if ($message = session()->get('success'))
        <script>
            M.toast({
                html: '{{ $message }}',
                classes: 'rounded'
            });
        </script>
    @endif

    <div class='container'>
        @foreach ($users as $user)
            <div class="col s12 m7">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>
                                {{ $user->name }}
                            </p>
                            <p>
                                {{ $user->email }}
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('posts.index', ['userID' => $user->id]) }}">View User Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class='pages'>
        {{ $users->links() }}
    </div>
@endsection
