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




                <div class="list-group">
                    <strong>Yaıncının kategorileri gelecek s</strong>




                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">

                    <div class="card-body">
                        <h3 class="card-title">{{ $puplisher->name }}</h3>

                        <p class="card-text">
                            {!! $puplisher->info  !!}
                            <br>
                    </div>


                </div>
<br>

                <!-- /.card -->

                <div class="row">

                        @foreach ($books as $book)
                        <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                  <a href="#"><img class="card-img-top" src="/uploads/700x400.png" alt=""></a>
                                  <div class="card-body">
                                    <h4 class="card-title">
                                      <a href="/book/{{ $book->id }}">{{ $book->name }}</a>
                                    </h4>
                                    <h5>$24.99</h5>
                                    <p class="card-text">
                                            {{ str_limit($book->info, $limit = 150, $end = '...') }}
                                    </p>
                                  </div>
                                  <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                  </div>
                                </div>
                              </div>
                    @endforeach





                </div>
                <!-- /.row -->


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
