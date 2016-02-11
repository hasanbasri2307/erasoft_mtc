@extends("template.master")
@section("title","Rencana Kunjungan Detail")
@section("breadcrumbs",Breadcrumbs::render('view_rencana_kunjungan',$rk))
@section("sidebar_menu")
    @include("menu.support_menu")
@endsection
@section("content")
    <div class="page-content">


        <!-- /section:settings.box -->
        <div class="page-header">
            <h1>
                Rencana Kunjungan Detail

            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">

                <div>
                    <div id="user-profile-2" class="user-profile">
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-18">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        <i class="green ace-icon fa fa-user bigger-120"></i>
                                        Information
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content no-border padding-24">
                                <div id="home" class="tab-pane in active">
                                    <div class="row">


                                        <div class="col-xs-12 col-sm-12">

                                            <div class="profile-user-info">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Client </div>

                                                    <div class="profile-info-value">
                                                        <span>{{ $rk->tiket->client->nama_pt }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> PIC </div>

                                                    <div class="profile-info-value">
                                                        <span>{{ $rk->tiket->client->pic }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Tanggal Kunjungan </div>

                                                    <div class="profile-info-value">
                                                        <span>{!! \Erasoft\Libraries\CustomLib::gen_tanggal($rk['tgl_kunjungan']) !!}</span>
                                                    </div>
                                                </div>


                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Jam Berangkat </div>

                                                    <div class="profile-info-value">
                                                        <span>{{ $rk->jam_berangkat}}</span>
                                                    </div>
                                                </div>


                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Jam Pulang </div>

                                                    <div class="profile-info-value">
                                                        <span>{{ $rk->jam_pulang }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Aktifitas </div>

                                                    <div class="profile-info-value">
                                                        <span>{{ $rk->aktifitas }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> No Tiket </div>

                                                    <div class="profile-info-value">
                                                        <span>{{ $rk->id_tiket }}</span>
                                                    </div>
                                                </div>

                                            </div>


                                        </div><!-- /.col -->
                                    </div><!-- /.row -->

                                    <div class="space-20"></div>
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Nama Bugs</th>
                                                <th>Penyelesaian</th>
                                                <th>Software</th>
                                                <th>Modul</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $no =1;?>
                                            @foreach($rk_detail as $item)
                                                <tr>
                                                    <td class="center">{{ $no }}</td>

                                                    <td>
                                                       {{ $item->bugs->nama_bugs }}
                                                    </td>
                                                    <td>{{ $item->bugs->penyelesaian }}</td>
                                                    <td>{{ $item->bugs->software_detail->software->nama }}</td>
                                                    <td>{{ $item->bugs->software_detail->nama_modul }}</td>

                                                </tr>
                                                <?php $no++; ?>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /#home -->
                            </div>
                        </div>
                    </div>
                </div>



                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
