<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel hide">
            <div class="pull-left image">
                {!! HTML::image('Admin/dist/img/avatar5.png',null,['class'=>'img-circle']) !!}
            </div>
            <div class="pull-left info">
                <p>{{auth()->guard('admin')->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form hide">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENULER</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Panel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url('admin/dashboard')}}"><i class="fa fa-circle-o"></i> Panel
                            </a></li>
                    <li><a href="{{url('/')}}" target="_blank"><i class="fa fa-circle-o"></i> Site</a></li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Siparişler</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/order?status=success')}}"><i class="fa fa-circle-o"></i> Görüntüle</a></li>

                    <li class="treeview menu-open ">
                        <a href="#">
                            <i class="fa fa-share"></i> <span>Sipariş Mailleri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li><a href="{{url('admin/comment/'.$orders['success']->id)}}"><i class="fa fa-circle-o"></i> Yeni Siparişler</a></li>
                            <li><a href="{{url('admin/comment/'.$orders['preparing']->id)}}"><i class="fa fa-circle-o"></i> Hazırlanıyor</a></li>
                            <li><a href="{{url('admin/comment/'.$orders['shipping']->id)}}"><i class="fa fa-circle-o"></i> Kargoya Verilenler</a></li>
                        </ul>
                    </li>
                </ul>


            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>Ürünler</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/product/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>
                    <li><a href="{{url('admin/product')}}"><i class="fa fa-circle-o"></i> Listele</a></li>
                  <li class="treeview menu-open ">
                    <a href="#">
                            <i class="fa fa-share"></i> <span>Ürün Özellikleri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu" style="display: block;">
                            <li><a href="{{url('admin/option/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>
                            <li><a href="{{url('admin/option')}}"><i class="fa fa-circle-o"></i> Listele</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

    {{--        <li class="treeview">
                <a href="#">
                    <i class="fa fa-truck"></i>
                    <span>Kargo</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/shipment/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>
                    <li><a href="{{url('admin/shipment')}}"><i class="fa fa-circle-o"></i> Listele</a></li>
                </ul>
            </li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span>Kupon</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/coupon/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>
                    <li><a href="{{url('admin/coupon')}}"><i class="fa fa-circle-o"></i> Listele</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span>İstatistikler</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/statistics')}}"><i class="fa fa-circle-o"></i> Listele</a></li>
                </ul>
            </li>

            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-cogs"></i>--}}
                    {{--<span>Ürün Opsiyonları </span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/globaloption/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>--}}
                    {{--<li><a href="{{url('admin/globaloption')}}"><i class="fa fa-circle-o"></i> Listele</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-user"></i>--}}
                    {{--<span>Müşteriler </span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/user')}}"><i class="fa fa-circle-o"></i> Listele</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-pie-chart"></i>--}}
                    {{--<span>Etiketler</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/tag/create')}}"><i class="fa fa-circle-o"></i> create</a></li>--}}
                    {{--<li><a href="{{url('admin/tag')}}"><i class="fa fa-circle-o"></i> list</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
{{----}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Kategoriler</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/category/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>
                    <li><a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i> Listele</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Yazılar</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/article/create')}}"><i class="fa fa-circle-o"></i> Ekle</a></li>
                    <li><a href="{{url('admin/article')}}"><i class="fa fa-circle-o"></i> Listele</a></li>

                </ul>
            </li>
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-edit"></i> <span>Languages</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/lang/create')}}"><i class="fa fa-circle-o"></i> create</a></li>--}}
                    {{--<li><a href="{{url('admin/lang')}}"><i class="fa fa-circle-o"></i> list</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-share"></i> <span>Yönetim</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/author/create?type=staff')}}"><i class="fa fa-circle-o"></i> create</a></li>--}}
                    {{--<li><a href="{{url('admin/author?type=staff')}}"><i class="fa fa-circle-o"></i> List</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
                {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-share"></i> <span>Customer Recommends</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/author/create?type=customer')}}"><i class="fa fa-circle-o"></i> create</a></li>--}}
                    {{--<li><a href="{{url('admin/author?type=customer')}}"><i class="fa fa-circle-o"></i> List</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
{{----}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-bar-chart-o"></i>--}}
                    {{--<span>Raporlar</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/report/online-users')}}"><i class="fa fa-circle-o"></i>Online kullanıcılar</a></li>--}}
                    {{--<li><a href="{{url('admin/report/product-showing')}}"><i class="fa fa-circle-o"></i>Ürün Görüntüleme </a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="treeview">--}}
                {{--<a href="{{url('admin/comment')}}">--}}
                    {{--<i class="fa fa-commenting"></i>--}}
                    {{--<span>Yorumlar</span>--}}
                {{--</a>--}}

            {{--</li>--}}



           {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>İletişim Adresi</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/contact/create')}}"><i class="fa fa-circle-o"></i>Ekle</a></li>
                    <li><a href="{{url('admin/contact')}}"><i class="fa fa-circle-o"></i>Listele</a></li>
                </ul>
            </li>--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sliders"></i> <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/slider/create')}}"><i class="fa fa-circle-o"></i>Ekle</a></li>
                    <li><a href="{{url('admin/slider')}}"><i class="fa fa-circle-o"></i>Listele</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{url('/admin/dashboard/multi-pdf-create')}}">
                    <i class="fa fa-sliders"></i> <span>Çoklu PDF gönder</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

            </li>
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-table"></i> <span>Banner</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/banner/create')}}"><i class="fa fa-circle-o"></i>oluştur</a></li>--}}
                    {{--<li><a href="{{url('admin/banner')}}"><i class="fa fa-circle-o"></i>listele</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
{{----}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-table"></i> <span>Satış noktalarımız</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/logo/create')}}"><i class="fa fa-circle-o"></i>oluştur</a></li>--}}
                    {{--<li><a href="{{url('admin/logo')}}"><i class="fa fa-circle-o"></i>listele</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview hide">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-table"></i> <span>Çalıştıklarımız Filtre</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="{{url('admin/filter/create')}}"><i class="fa fa-circle-o"></i>oluştur</a></li>--}}
                    {{--<li><a href="{{url('admin/filter')}}"><i class="fa fa-circle-o"></i>listele</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            <li>
                <a href="{{url('admin/account')}}">
                    <i class="fa fa-user    "></i> <span>Profil Ayarları</span>
                    <span class="pull-right-container">
              {{--<small class="label pull-right bg-yellow">12</small>--}}
              {{--<small class="label pull-right bg-green">16</small>--}}
              {{--<small class="label pull-right bg-red">5</small>--}}
            </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>