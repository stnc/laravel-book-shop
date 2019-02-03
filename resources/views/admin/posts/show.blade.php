@extends('layouts.master')



@section('content')

    <div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Item</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>

            </div>

        </div>

    </div>


    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $posts->post_title }}

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                {{ $posts->post_content }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>İmage:</strong>
                <img src="/uploads/{{ $posts->media_picture}}" alt="">

            </div>

        </div>


    </div>
    @foreach ($tags as  $employee)

                @if ($loop->iteration == 1)
                    <b>: {{ $tags->count() }} tag(s)</b>
                @endif
                {{ $employee->name }},

    @endforeach
    </div>
@endsection
