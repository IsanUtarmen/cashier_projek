@extends('template/layout2')

@push('style')
@endpush

@section('content')
    <section class="content">
        <div class="right_col" role="main">
            <!-- /top tiles -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>
                                    PROJECT UJIKOM
                                    <h3>CHASIER GACORAN</h3>
                                </h3>
                            </div>
                            <div class="col-md-6 text-center"> <!-- Tanggal di tengah -->
                                <div id="reportrange"
                                    style="
                                        background: #fff;
                                        cursor: pointer;
                                        padding: 5px 10px;
                                        border: 1px solid #ccc;
                                        display: inline-block; <!-- Tampilkan dalam satu baris -->
                                    ">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2014 - January 28, 2015</span>
                                    <b class="caret"></b>
                                </div>
                            </div>
                        </div>
                        <div class="x_title">
                            <h2>Laporan</h2>
                            <div class="row align-items-center">
                                <div class="col-md-4"> <!-- Bagian kiri -->
                                    <div class="input-group date" id="tanggalAwal" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#tanggalAwal" placeholder="Tanggal Awal" />
                                        <div class="input-group-append" data-target="#tanggalAwal"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"> <!-- Tengah -->
                                    <div class="input-group date" id="tanggalAkhir" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#tanggalAkhir" placeholder="Tanggal Akhir" />
                                        <div class="input-group-append" data-target="#tanggalAkhir"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4"> <!-- Bagian kanan -->
                                    <div class="float-left ml-auto"> <!-- Tambah float-left dan ml-auto -->
                                        <div class="input-group">
                                            <a href="{{ route('data-laporan') }}">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                        </div>
                                    </div>
                                    <div class="float-right ml-auto">
                                        <a href="{{ route('export-laporan') }}" class="btn btn-success">
                                            <i class="fa fa-file-excel"></i> Export
                                        </a>
                                        {{-- <a href="{{ route('export-laporan-pdf')}}" class="btn btn-danger ml-2">
                                            <i class="fa fa-file-pdf"></i> Export PDF
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        @include('laporan.data')
    </section>
@endsection


@push('script')
    <script>
        $('#tbl-laporan').DataTable()


        // var btnCari = document.getElementById('btnCari');

        // btnCari.addEventListener('click', function() {
        //     // Dapatkan nilai dari input tanggal awal
        //     var tanggalAwal = document.getElementById('tanggalAwal').value;
        //     // Dapatkan nilai dari input tanggal akhir
        //     var tanggalAkhir = document.getElementById('tanggalAkhir').value;

        //     // Buat objek dengan data pencarian
        //     var searchData = {
        //         tanggalAwal: tanggalAwal,
        //         tanggalAkhir: tanggalAkhir
        //     };

        //     // Lakukan permintaan pencarian ke server menggunakan AJAX
        //     // Misalnya, dengan menggunakan jQuery AJAX
        //     $.ajax({
        //         url: '/pencarian',
        //         method: 'GET',
        //         data: searchData,
        //         success: function(response) {
        //             // Di sini Anda dapat menampilkan hasil pencarian ke pengguna
        //             console.log(response);
        //             // Contoh: Tampilkan hasil pencarian dalam tabel atau daftar
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle error jika permintaan pencarian gagal
        //             console.error(error);
        //         }
        //     });
        // });


    </script>
@endpush
