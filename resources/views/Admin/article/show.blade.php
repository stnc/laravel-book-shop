@extends('Admin.layout')

@section('style')
{!! HTML::style('Admin/plugins/daterangepicker/daterangepicker.css') !!}
{!! HTML::style('Admin/plugins/datepicker/datepicker3.css') !!}
{!! HTML::style('Admin/plugins/iCheck/all.css') !!}

{!! HTML::style('Admin/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
{!! HTML::style('Admin/plugins/timepicker/bootstrap-timepicker.min.css') !!}
{!! HTML::style('Admin/plugins/select2/select2.min.css') !!}


{!! HTML::style('Admin/dist/css/AdminLTE.min.css') !!}
{!! HTML::style('Admin/dist/css/skins/_all-skins.min.css') !!}

@endsection


@section('content')
        <!-- Main content -->
<section class="content">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session('article_status')!=null)
        <div class="alert alert-success">
            <ul>
                <li>{{ session('article_status') }}</li>
            </ul>
        </div>
    @endif

    <form action="{{url($prefix.'/'.$article->id)}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
                {!! method_field('PUT') !!}

                    <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Yazı Ekle</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">


                        <div class="row">
                            <div class="col-md-12">
                                <!-- Custom Tabs (Pulled to the right) -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li ><a href="#tab_meta"
                                                data-toggle="tab"
                                                aria-expanded="false">Meta Etiketler
                                            </a></li>

                                            <li class="active"><a href="#tab_home"
                                                                                 data-toggle="tab"
                                                                                 aria-expanded="false">Detay
                                                </a></li>



                                        <li class="pull-left header"><i class="fa fa-th"></i>Yazı Ekleme Modülü</li>
                                    </ul>
                                    <div class="tab-content">

                                                    <!-- /.tab-pane -->
                                            <div class="tab-pane active" id="tab_home">
                                                <section class="content">


                                                    <!-- SELECT2 EXAMPLE -->
                                                    <div class="box box-default">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">
                                                                Content</h3>

                                                            <div class="box-tools pull-right">
                                                                <button type="button" class="btn btn-box-tool"
                                                                        data-widget="collapse"><i
                                                                            class="fa fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-box-tool"
                                                                        data-widget="remove"><i
                                                                            class="fa fa-remove"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Başlık</label>
                                                                        <input type="text"
                                                                               name="title"
                                                                               class="form-control" value="{{$article->title}}">

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label> Resmi </label>
                                                                        <input type="text" name="images[]"
                                                                               placeholder="yazıya resim yüklemek için tıklayınız." class="form-control"
                                                                               onclick="openKCFinder_singleFile('Images',this);" value="{{$article->images->count()>0?$article->images->first()->path:null}}">

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> Kategoriler</label>
                                                                        <select name="categories[]" class="form-control select2" multiple="multiple"
                                                                                data-placeholder="Kategori Seçiniz"
                                                                                style="width: 100%;">
                                                                            @foreach($categories as $cat)
                                                                                <option value="{{$cat->id}}" {{$article->categories->contains('id',$cat->id)?'selected':null}}> {{$cat->title}}</option>

                                                                                @foreach($cat->children as $child)
                                                                                    <option value="{{$child->id}}" {{$article->categories->contains('id',$child->id)?'selected':null}}> {{$cat->title}} > {{$child->title}}</option>

                                                                                    @foreach($child->children as $subchild)

                                                                                        <option value="{{$subchild->id}}" {{$article->categories->contains('id',$subchild->id)?'selected':null}}>{{$cat->title}} > {{$child->title}}
                                                                                            > {{$subchild->title}}</option>
                                                                                    @endforeach

                                                                                @endforeach

                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Excel pdf vs </label>
                                                                        <input type="text" name="files[]"
                                                                               placeholder="yazıya pdf excel yüklemek için tıklayınız." class="form-control" value="{{$article->files->count()>0?$article->files->first()->path:null}}"
                                                                               onclick="openKCFinder_singleFile('Files',this);">

                                                                    </div>





                                                                    <div class="form-group">
                                                                        <label>İlişkili içerikler</label>
                                                                        <select name="related_articles[]"
                                                                                class="form-control select2"
                                                                                multiple="multiple"
                                                                                data-placeholder="içerik Seçiniz"
                                                                                style="width: 100%;">

                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label> Etiketler</label>
                                                                        <select name="tags[]"
                                                                                class="form-control select2"
                                                                                multiple="multiple"
                                                                                data-placeholder="Etiket Seçiniz"
                                                                                style="width: 100%;">
                                                                            @foreach($tags as $tag)
                                                                                <option value="{{$tag->id}}" {{$article->tags->contains('id',$tag->id)?'selected':null}}>{{$tag->title}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>


                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label>Sıralama</label>
                                                                        <input type="number" name="sort" placeholder="Article Sort" class="form-control"
                                                                               value="{{$article->sort}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Durum </label>

                                                                        <label>
                                                                            <input type="radio" name="active" value="1" class="flat-red" {{$article->active=='1'?'checked':null}}>
                                                                            Active
                                                                        </label>

                                                                        <label>
                                                                            <input type="radio" name="active" value="0" class="flat-red" {{$article->active!='1'?'checked':null}}>
                                                                            Passive
                                                                        </label>
                                                                    </div>



                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-6">


                                                                    <div class="form-group">
                                                                        <label>Kısa Açıklama</label>

                                                                        <textarea
                                                                                id="short_description"
                                                                                name="short_description"
                                                                                rows="8"
                                                                                cols="80">{!! $article->short_description !!}</textarea>
                    </textarea>

                                                                    </div>

                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label> Açıklama</label>

                                                                        <textarea id="description"
                                                                                  name="description"
                                                                                  rows="10"
                                                                                  cols="80"> {!! $article->description !!}</textarea>
                    </textarea>

                                                                    </div>



                                                                </div>

                                                            </div>

                                                            <!-- /.row -->
                                                        </div>
                                                        <!-- /.box-body -->


                                                    </div>
                                                    <!-- /.box -->


                                                    <!-- /.row -->

                                                </section>

                                            </div>
                                            <div class="tab-pane " id="tab_meta">
                                                <section class="content">


                                                    <!-- SELECT2 EXAMPLE -->
                                                    <div class="box box-default">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">
                                                                Content</h3>

                                                            <div class="box-tools pull-right">
                                                                <button type="button" class="btn btn-box-tool"
                                                                        data-widget="collapse"><i
                                                                            class="fa fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-box-tool"
                                                                        data-widget="remove"><i
                                                                            class="fa fa-remove"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Meta Title</label>
                                                                        <input type="text"
                                                                               name="meta_title"
                                                                               class="form-control" value="{{$article->meta_title}}">

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Meta Keywords</label>
                                                                        <input type="text"
                                                                               name="meta_keywords"
                                                                               class="form-control" value="{{$article->meta_keywords}}">

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Meta Description</label>
                                                                        <textarea
                                                                                name="meta_description"
                                                                                id="" cols="30"
                                                                                rows="5"
                                                                                class="form-control">{{$article->meta_description}}</textarea>


                                                                    </div>


                                                                    <!-- /.form-group -->
                                                                </div>


                                                            </div>

                                                            <!-- /.row -->
                                                        </div>
                                                        <!-- /.box-body -->


                                                    </div>
                                                    <!-- /.box -->


                                                    <!-- /.row -->

                                                </section>

                                            </div>

                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- nav-tabs-custom -->
                            </div>

                        </div>


                                <!-- /.row -->
                </div>

                    <div class="box-footer">
                        {{--<button type="submit" class="btn btn-default" onclick="return false;">Cancel</button>--}}
                        <button type="submit" class="btn btn-info pull-right">Kaydet</button>
                    </div>
            </div>
            <!-- /.box -->
    </form>



                <!-- /.row -->

</section>

@endsection


@push('script')
<script src="/ckeditor/ckeditor.js"></script>

{!! HTML::script('Admin/plugins/select2/select2.full.min.js') !!}
{!! HTML::script('Admin/plugins/input-mask/jquery.inputmask.js') !!}
{!! HTML::script('Admin/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}
{!! HTML::script('Admin/plugins/input-mask/jquery.inputmask.extensions.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

{!! HTML::script('Admin/plugins/daterangepicker/daterangepicker.js') !!}
{!! HTML::script('Admin/plugins/datepicker/bootstrap-datepicker.js') !!}
{!! HTML::script('Admin/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
{!! HTML::script('Admin/plugins/timepicker/bootstrap-timepicker.min.js') !!}
{!! HTML::script('Admin/plugins/iCheck/icheck.min.js') !!}




<script>



    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.

      CKEDITOR.replace('description', {
            width: '100%',
            height: 300,
            filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=files',
            filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
            filebrowserFlashBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=flash',
            filebrowserUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=files',
            filebrowserImageUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=images',
            filebrowserFlashUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=flash'

        });
        CKEDITOR.replace('short_description', {
            width: '100%',
            height: 120
        });




    });
</script>
<script>


    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>

@endpush