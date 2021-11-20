@extends('../layouts.postLayout')

@section('title', $name)

@section('forms')
<div id="insert_div">
    <p>Insert a new row:</p>
    {{ Form::open(array('route' => array('insert', $id)))}}
        {{Form::text('title', null, array('placeholder' => 'title'))}}<br>
        {{Form::textarea('content', null, array('placeholder' => 'content'))}}<br>
        <input type="submit", value="insert row">
    {{ Form::close() }}
</div>
<div id="update_div">
    <p>Update a row:</p>
    {{ Form::open(array('route' => 'update'))}}
        {{Form::number('post_id', null, array('placeholder' => 'post id'))}}<br>
        {{Form::text('title', null, array('placeholder' => 'title'))}}<br>
        {{Form::textarea('content', null, array('placeholder' => 'content'))}}<br>
        <input type="submit", value="update row">
    {{ Form::close() }}
</div>
<div id="delete_div">
    <p>Delete a row:</p>
    {{ Form::open(array('route' => 'delete'))}}
        {{Form::number('post_id', null, array('placeholder' => 'post id'))}}<br>
        <input type="submit", value="delete row">
    {{ Form::close() }}
</div>
@endsection

@section('back')
@include("./components/backButton")
@endsection

@section('content')
<div class='container'>
    <div class="posts" style='padding:25px'>
        @foreach($data as $post)
        <div class="title" style='margin-bottom: 25px'>
            post id: {{$post->post_id}}<br>
            -------------------------<br>
            {{$post->title}}
        </div>
        <div class="content" style='margin-bottom: 50px'>
            {{$post->content}}<br>
            -------------------------
        </div>
        @endforeach
    </div>
</div>
@endsection