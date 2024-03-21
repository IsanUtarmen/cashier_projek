@extends('template.layout')


@section('content')
    <div class="right_col" role="main">
        <!-- /top tiles -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Tentang Kami</h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right"
                                style="
                                    background: #fff;
                                    cursor: pointer;
                                    padding: 5px 10px;
                                    border: 1px solid #ccc;
                                ">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span>
                                <b class="caret"></b>
                            </div>
                        </div>
                    </div>

                    <div class="card-body row d-flex justify-content-evenly" style="gap: 1rem">
                        <div class=" col-5">
                            <h2>Tentang Aplikasi</h2>
                            <p>Aplikasi ini dibuat saat tugas project sekolah.Aplikasi ini masih dalam proses
                                pembuatan, jadi ini belum begitu
                                sempurna.</p>
                        </div>
                        <div class=" col-5">
                            <h2>Sejarah Aplikasi</h2>
                            <p>Aplikasi ini dibuat saat tugas project sekolah.Aplikasi ini masih dalam proses
                                pembuatan, jadi ini belum begitu
                                sempurna.</p>
                        </div>
                        <div class=" col-5">
                            <h2>Pelayanan</h2>
                            <ul class="list-group s-none">
                                <li class="list-group-item">Personal Branding</li>
                                <li class="list-group-item">Website</li>
                                <li class="list-group-item">Ui Desainer</li>
                            </ul>
                        </div>
                        <div class=" col-5">
                            <h2>Anjay</h2>
                            <p>Aplikasi ini dibuat saat tugas project sekolah.Aplikasi ini masih dalam proses
                                pembuatan, jadi ini belum begitu
                                sempurna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
