
<h3>{{ $books->name }}</h3>

<ul>
       Like olayları ({{ $books->likes->count()}})  //kimler like etmiş .... user bağlantısı
    @foreach($books->likes as $like)
        <li>{{ $like->body }}</li>
    @endforeach
</ul>
<task></task>
<example></example>
<a href="http://blog.test/author/11">author</a>