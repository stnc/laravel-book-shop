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

                Kitabın Yazarı/Yazarları
                @foreach ($books->authors as $author)
                    <a href="#" class="list-group-item ">{{ $author->name }}</a>
                    <p>
                        {{ str_limit($author->info, $limit = 150, $end = '...') }}
                    </p>
                @endforeach


                <div class="list-group">
                    <strong>Kategorlileri</strong>
                    @foreach ($books->categories as $cat)
                        <a href="#" class="list-group-item ">{{ $cat->name }}</a>
                    @endforeach

                    Yayıncı Firma
                    <h3 class="card-title">{{ $books->puplisher->name }}</h3>


                   <strong> Ekleyen kullancı detay</strong>
                    <h6 class="card-title">{{ $userDetail->name ." ". $userDetail->lastname}} </h6>

                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{ $books->name }}</h3>
                        <h4>$24.99</h4>
                        <p class="card-text">
                            {!! $books->content  !!}
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                            {{$toplamBegenilme}} stars
                            <br>

                            Tags: {{$tags}}
                    </div>
                </div>
                <!-- /.card -->

                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Kitapa yapılan  Yorumlar
                    </div>
                    <div class="card-body">
                        @foreach ($comments as $Comment)
                            <p>{{$Comment->comment_content}}</p>
                            <small class="text-muted">Posted by {{$Comment->comment_author}} on {{$Comment->created_at}} </small>
                            <hr>
                        @endforeach

                        <a href="#" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>
                <!-- /.card -->


                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Yazara yapılan  Yorumlar
                    </div>
                    <div class="card-body">
                        @foreach ($commentsAuthor as $CommentAuthor)
                            <p>{{$CommentAuthor->comment_content}}</p>
                            <small class="text-muted">Posted by {{$CommentAuthor->comment_author}} on {{$CommentAuthor->created_at}} </small>
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
