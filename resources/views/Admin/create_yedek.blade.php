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
        <form action="">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Kategori Oluştur</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" placeholder="Kategori Başlığı" class="form-control">

                            </div>


                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Detaylı Açıklama</label>
                                <form>
                    <textarea id="editor1" name="description" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                                </form>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Üst Kategoriler</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Kategori Seçiniz"
                                        style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Kısa Açıklama</label>
                                <form>
                    <textarea id="editor2" name="short_description" rows="8" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                                </form>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>
                                    <input type="radio" name="active" value="1" class="flat-red" checked>
                                    Açık
                                </label>
                                <label>
                                    <input type="radio" name="active" value="0" class="flat-red" checked>
                                    Kapalı
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-default" onclick="return false;">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Kaydet</button>
                </div>
            </div>
            <!-- /.box -->
        </form>


        <!-- /.row -->

    </section>
    <!-- /.content -->

@endsection


@push('script')
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

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
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1', {
            width: '100%',
            height: 200
        });
        CKEDITOR.replace('editor2', {
            width: '100%',
            height: 120
        });
    });
</script>
@endpush