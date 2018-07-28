
<header>
    <div class="container">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/posts">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/posts/create">Nwe posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            {!! Form::model( ['url' => 'admin/posts','class' => 'form-inline mt-2 mt-md-0','method' => 'GET']) !!}

            {!! Form::text('search', null, array('placeholder' => 'Seacrh','class' => 'form-inline mt-2 mt-md-0')) !!}
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            {!! Form::close() !!}
        </div>
    </nav>
    </div>
</header>