@extends('layouts.app')

@section('content')
<h3>{{ $Authors->name }}</h3>

<ul>
     <strong>   like edenler ({{ $Authors->likes->count()}})</strong>
    @foreach($Authors->likes as $like)
        <li>{{ $like->body }}</li>
    @endforeach
</ul>

<task></task>
<example></example>
<a href="http://blog.test/books/4">books</a>
@endsection
