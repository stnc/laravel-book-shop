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
                <h1 class="my-4"><h3>{{ $Authors->name }}</h3></h1>
                <div class="list-group">
                    <strong>Yazarın diğer kitapları</strong>
                    @foreach ($Authors->books as $book)
                        <a href="#" class="list-group-item ">{{ $book->name }}</a>
                    @endforeach

                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Product Name</h3>
                        <h4>$24.99</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta
                            fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi
                            pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        {{$ToplamBegenilme}} stars
                        <br>

                       Tags: {{$tags}}
                    </div>
                </div>
                <!-- /.card -->

                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                       Yazarın Yorumları
                    </div>
                    <div class="card-body">
                        @foreach ($Comments as $book)
                        <p>{{$book->content}}</p>
                        <small class="text-muted">Posted by {{$book->author}} on {{$book->created_at}} </small>
                        <hr>
                        @endforeach

                        <a href="#" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>
                <!-- /.card -->


                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Kitabın Yorumları
                    </div>
                    <div class="card-body">
                        @foreach ($Authors->comments as $book)
                            <p>{{$book->content}}</p>
                            <small class="text-muted">Posted by {{$book->author}} on {{$book->created_at}} </small>
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
