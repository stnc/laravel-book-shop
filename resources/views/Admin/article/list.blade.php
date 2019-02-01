@extends('Admin.layout')

@section('style')
{!! HTML::style('Admin/plugins/datatables/dataTables.bootstrap.css') !!}
{!! HTML::style('Admin/dist/css/AdminLTE.min.css') !!}
{!! HTML::style('Admin/dist/css/skins/_all-skins.min.css') !!}
@endsection

@section('content')
        <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Yazılar Listeleniyor</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Sort</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>showing home</th>
                            <th>operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{$article->title}}</td>
                                <td>
                                    @foreach($categories as $cat)
                                        @if($article->categories->contains('id',$cat->id))
                                            {{$cat->title}} <br>
                                        @endif

                                        @foreach($cat->children as $child)
                                            @if($article->categories->contains('id',$child->id))
                                                {{$cat->title}} > {{$child->title}} <br>
                                            @endif

                                            @foreach($child->children as $subchild)
                                                @if($article->categories->contains('id',$subchild->id))
                                                    {{$cat->title}} > {{$child->title}}  > {{$subchild->title}} <br>

                                                @endif
                                            @endforeach

                                        @endforeach

                                    @endforeach

                                </td>
                                <td>{{$article->sort}}</td>
                                <td>{{$article->active==1?'aktif':'pasif'}}</td>
                                <td>{{$article->created_at}}</td>
                                <td>{{$article->is_home==1?'aktif':'pasif'}}</td>


                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-flat">Seç</button>
                                        <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                                data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{url($prefix.'/'.$article->id)}}">Detay</a></li>

                                            <li class="divider"></li>
                                            <li>
                                                <form action="{{url($prefix.'/'.$article->id)}}" method="post">
                                                    {!! csrf_field() !!}
                                                    {!! method_field('DELETE') !!}
                                                    <button type="button" onclick="$(this).parent().submit();"
                                                            class="btn btn-block btn-danger btn-sm">Sil
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Sort</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>showing home</th>
                            <th>operations</th>
                        </tr>
                        </tfoot>
                    </table>

                    @if (session('article_status')!=null)
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('article_status') }}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection


@push('script')
{!! HTML::script('Admin/plugins/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('Admin/plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>
    $(function () {
        $("#example1").DataTable({
            "iDisplayLength": 50,
            initComplete: function () {
                this.api().columns([1]).every(function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.header()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                );

                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endpush