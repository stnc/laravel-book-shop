@extends('layouts.app')




@section('content')


    <h3>{{ $books->name }}</h3>

    <ul>
        Like olayları ({{ $books->likes->count()}})  //kimler like etmiş .... user bağlantısı
        @foreach($books->likes as $like)
            <li>{{ $like->body }}</li>
        @endforeach
    </ul>

    <a href="http://blog.test/author/11">author</a>



    <task></task>
    <example></example>
@endsection

