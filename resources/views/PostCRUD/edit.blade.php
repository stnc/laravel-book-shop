@extends('layouts.master')


@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit New Item</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {!! Form::model($Posts, ['method' => 'PATCH','files'=>'true','route' => ['posts.update', $Posts->id]]) !!}

    <div class="row">

        <div class="col-md-4 order-md-2 mb-4">
            @if ($Posts->categories()->count() > 0)
            <ul>
                    @php
                   //  dd($Posts->categories[0]->name);
                    @endphp

    <h5>            Bağlı olduğu kategoriler ({{$Posts->categories()->count()}})</h5>
                        @foreach ($Posts->categories as $cat)
                            <li>
                                    {{$cat->name}}
                            </li>
                        @endforeach
            </ul>

            @endif

                @if ($Posts->tags()->count() > 0)
                    <ul>

                        <h5>            Taglar  ({{$Posts->tags()->count()}})</h5>
                        @foreach ($Posts->tags as $tag)
                            <li>
                                {{$tag->name}}
                            </li>
                        @endforeach
                    </ul>

                @endif

                @php
              //  dd($Posts->comments());
                @endphp
                @if ($Posts->comments()->count() > 0)
                    <ul>

                        <h5>            Yorumlar  ({{$Posts->comments()->count()}})</h5>
                        @foreach ($Posts->comments as $comments)
                            <li>
                                {{$comments->comment_content}}
                            </li>
                        @endforeach
                    </ul>

                @endif

                <img class="img-thumbnail img-responsive"  src="/uploads/{{$Posts->media_picture}}" alt="" class="img-responsive">

        </div>

        <div class="col-md-8 order-md-10 mb-8">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Title:</strong>

                    {!! Form::text('post_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Description:</strong>

                    {!! Form::textarea('post_content', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>MEdia:</strong>

                    {!! Form::file('media_picture', null, array('placeholder' => 'MEdia','class' => 'form-control','style'=>'height:100px')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>




    </div>

    {!! Form::close() !!}

</div>
@endsection