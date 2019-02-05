@extends('admin.layouts.app')
@section('content')
    <div class="main-content-container container-fluid px-4">

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


            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif

        <!-- Page Header -->

        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Blog Posts</span>
                <h3 class="page-title"> Posts</h3>
            </div>
        </div>
        <!-- End Page Header -->



            <div class="row">
                <div class="col">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Posts</h6>
                        </div>
                        <div class="card-body p-0 pb-3 text-center">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th>No</th>

                                    <th>Title</th>

                                    <th>Description</th>

                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
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


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @stop


