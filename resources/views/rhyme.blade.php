@extends('layouts.structure')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('index') }}">На главную</a>   
            @if($rhyme->author->id == Auth::id())
                <div class="w-100"></div>
                <a onclick="return check()" href="{{ route('delete', ['id' => $rhyme->id]) }}">Удалить</a>   
                <div class="w-100"></div>
                <a href="{{ route('edit', ['id' => $rhyme->id]) }}">Редактировать</a>   
            @endif
            <div class="w-100"></div>
            <h1>{{ $rhyme->title }}</h1>
            <div class="w-100"></div>
            <h3>{{ $rhyme->text }}</h3>
            <div class="w-100"></div>
            @foreach($rhyme->categories as $category)
                <a class="m-1" href="{{ route('tag', ['tag' => $category->name]) }}"><h5 class="btn btn-primary">{{ $category->name }}</h5></a> 
            @endforeach
            <div class="w-100"></div>
            <h4>Автор: </h4><a href="{{ route('profile', ['id' => $rhyme->author->id]) }}"><h4>{{ $rhyme->author->name }}</h4></a>
        </div>    
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        function check(){
            $check = confirm("Вы уверены?");
            if($check == true){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    
@endsection
