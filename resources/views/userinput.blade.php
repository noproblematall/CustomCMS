@extends('layouts.app')
@section('css')
    <style media="screen">
        table > thead > tr > th {
          text-align: center !important;
          vertical-align: middle !important;
        }
        table > tfoot > tr > td {
          font-weight: bold;
        }
      </style>
@endsection
@section('subtitle')
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-edit icon-gradient bg-amy-crisp">
            </i>
        </div>
        <div>FORM INPUT DATA</div>                                
    </div>
    
@endsection

@section('content')
        <div class="row form_container">
            <div class="col-md-12 text-center mb-2">
                <div class="card">
                    <div class="card-body"><h5 class="card-title">Form Data of <span style="color:blue;">{{Auth::user()->my_admin->name}}</span></h5></div>
                </div>
                
            </div>
            <div class="col-md-6"><!--tab kiri-->
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Tabel Isian</h5>
                            <table class="mb-0 table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Kelurahan</td>
                                    <td>@isset($isian){{$isian->kelurahan}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>@isset($isian){{$isian->kecamatan}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten/Kota</td>
                                        <td>@isset($isian){{$isian->kabupaten_kota}}@endisset</td>
                                    </tr><tr>
                                        <td>Provinsi</td>
                                        <td>@isset($isian){{$isian->provinsi}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Bulan</td>
                                        <td>@isset($isian){{$isian->bulan}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>@isset($isian){{$isian->tahun}}@endisset</td>
                                    </tr><tr>
                                        <td>Nama pengisi</td>
                                        <td>@isset($isian){{$isian->nama_pengisi}}@endisset</td>
                                    </tr><tr>
                                        <td>Pekerjaan</td>
                                        <td>@isset($isian){{$isian->pekerjaan}}@endisset</td>
                                    </tr>
                                    </tr><tr>
                                        <td>Jabatan</td>
                                        <td>@isset($isian){{$isian->jabatan}}@endisset</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><!--tab kanan-->
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">SUMBER  DATA UNTUK MENGISI PROFIL KELURAHAN</h5>
                            <table class="mb-0 table table-bordered">
                                <tbody>
                                    </tr><tr>
                                        <td>1</td>
                                        <td>@isset($mengisi){{$mengisi->field1}}@endisset</td>
                                    </tr>
                                    </tr><tr>
                                        <td>2</td>
                                        <td>@isset($mengisi){{$mengisi->field2}}@endisset</td>
                                    </tr>
                                    </tr><tr>
                                        <td>3</td>
                                        <td>@isset($mengisi){{$mengisi->field3}}@endisset</td>
                                    </tr>
                                    </tr><tr>
                                        <td>4</td>
                                        <td>@isset($mengisi){{$mengisi->field4}}@endisset</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Ketersediaan Hijauan Pakan Ternak</h5>
                            <table class="mb-0 table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Luas tanaman pakan ternak (rumput gajah, dll)</td>
                                        <td>@isset($pakan){{$pakan->luas_tanaman_pakan_ternak_rumput_gajah_dll}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Produksi hijauan makanan ternak</td>
                                        <td>@isset($pakan){{$pakan->produksi_hijauan_makanan_ternak}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Dipasok dari luar Kelurahan</td>
                                        <td>@isset($pakan){{$pakan->dipasok_dari_luar_kelurahan}}@endisset</td>
                                    </tr>
                                    <tr>
                                        <td>Disubsidi dinas</td>
                                        <td>@isset($pakan){{$pakan->disubsidi_dinas}}@endisset</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            
        </div>
        

        
@endsection
@section('script')
    
    <script src="{{ asset('js/data.js') }}"></script>
@endsection
{{-- <div class="my_toast"  style="display:none;">
    <div class="toast" data-delay="1000">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect fill="#007aff" width="100%" height="100%"></rect></svg>
            <strong id="toast_header" class="mr-auto text-primary">INFO</strong>
            
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            
        </div>
    </div>
</div>

<div class="toast_container">        

</div> --}}

{{-- <div class="loader_container">    
    <div class="loader">
        <div class="ball-spin-fade-loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>    
</div> --}}