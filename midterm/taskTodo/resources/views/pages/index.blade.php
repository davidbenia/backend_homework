@extends('../layouts.indexLayout')

@section('content')
    @if ($message = session()->get('success'))
        <script>
            M.toast({
                html: '{{ $message }}',
                classes: 'rounded'
            });
        </script>
    @endif

    <div class='header'>
        <div class="row">
            <form class="col s12" action='{{ route('store') }}' method='POST'>
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="new task" name="task" type="text">
                    </div>
                    <div class="input-field col s6">
                        <button class="btn waves-effect waves-light grey" type="submit" name="action">
                            <i class="material-icons">add</i> Add Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class='body'>
        @foreach ($tasks as $task)
            <form id='deleteForm {{ $task->id }}' action="{{ route('destroy', $task) }}" method='POST'>
                @csrf
                @method('DELETE')

                <table>
                    <tbody>
                        <tr>
                            <td>
                                <p class='left-align'>
                                    <span class='green-text darken-1'>{{ $task->task }} </span>
                                </p>
                            </td>
                            <td>
                                <p class='right-align'>
                                    <label>
                                        <input type="checkbox" id='{{ $task->id }}' name='select' />
                                        <span>task {{ $task->id }}</span>
                                    </label>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        @endforeach
    </div>

    <div class='footer'>


        <button class="btn red" id='deleteAll'><i class="material-icons">delete</i>Delete</button>

        <script type='text/javascript'>
            function submitHandler(id) {
                let form = document.getElementById(`deleteForm ${id}`)
                form.submit();
            }

            function handler() {
                let tasks = [];
                let inputs = document.getElementsByName('select');

                for (let i = 0; i < inputs.length; ++i) {
                    if (inputs[i].checked) {
                        submitHandler(inputs[i].id);
                    }
                }
            }

            document.getElementById('deleteAll').addEventListener('click', handler);
        </script>
    </div>

    <div class='pages'>
        {{ $tasks->links() }}
    </div>
@endsection
