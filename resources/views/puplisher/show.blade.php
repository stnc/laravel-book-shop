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
                    <strong>Yaıncının Kitapları</strong>
                    @foreach ($Books as $sook)
                       {{--{!! link_to_route('book.show', $sook->name, ['bookID' => $sook->id]) !!}--}}
                        <a href="{{ URL::route('book.show', array('bookID' => $sook->id)) }}" class="list-group-item ">{{ $sook->name }}</a>
                    @endforeach



                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">

                    <div class="card-body">
                        <h3 class="card-title">{{ $Puplisher->name }}</h3>

                        <p class="card-text">
                            {!! $Puplisher->info  !!}

                            <br>


                    </div>
                </div>
                <!-- /.card -->


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
