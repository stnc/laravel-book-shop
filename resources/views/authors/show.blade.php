@extends('layouts.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                <h1 class="my-4"><h3>{{ $authors->name }}</h3></h1>
                <div class="list-group">
                    <strong>Yazarın diğer kitapları</strong>

                    @foreach ($authors->books as $book)
                  <a href="/book/{{$book->id}}">{{$book->name}}</a>

                @endforeach

                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="/uploads/700x400.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{ $authors->name }}</h3>

                        <p class="card-text">{{ $authors->info }}</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        {{$toplamBegenilme}} stars
                        <br>
                        {{$tags}}
                    </div>
                </div>
                <!-- /.card -->



                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Kitabın Yorumları
                    </div>
                    <div class="card-body">
                        @foreach ($authors->comments as $comment)
                            <p>{{$comment->comment_content}}</p>
                            <small class="text-muted">Posted by {{$comment->comment_author}} on {{$comment->created_at}} </small>
                            <hr>
                        @endforeach

                        <a href="#" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->







@endsection



@push('scripts')
    <script type="text/javascript">
        alert("rtet")
    </script>
@endpush
