@extends('layouts.master')



@section('content')

    <div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Items CRUD</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Item</a>

            </div>

        </div>

    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Description</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($Posts as $key => $item)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $item->post_title }}</td>

                <td>{{ $item->post_content }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('posts.show',$item->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('posts.edit',$item->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $item->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>


    {!! $Posts->render() !!}

    </div>
@endsection
