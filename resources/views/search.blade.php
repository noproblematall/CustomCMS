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
            <i class="pe-7s-server icon-gradient bg-amy-crisp">
            </i>
        </div>
        <div>SEARCH DATABASE</div>                            
    </div> 
@endsection

@section('content')
        <div class="row form_container">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sel1" class="float-left" style="margin-top:0.5rem;">Admins:</label>
                                    <select class="form-control float-right" id="select_admin" style="width:70%">
                                        <option value="">Please select...</option>
                                        @isset($admins)
                                            @foreach ($admins as $admin)
                                                <?php 
                                                    if(isset($user_id)){
                                                        if($admin->id == $user_id){
                                                ?>
                                                    <option value="{{$admin->id}}" selected>{{$admin->name}}</option>
                                                <?php
                                                        }else{
                                                ?>
                                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                                                <?php            
                                                        }
                                                    }else{
                                                ?>
                                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                                <?php

                                                    }
                                                ?>
                                            @endforeach
                                            
                                        @endisset
                                    </select>
                                    <form id="search_form" action="{{ route('admin_search') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="admin_id" id="admin_id">
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="select_table" class="float-left" style="margin-top:0.5rem;">Tables:</label>
                                    <select class="form-control float-right" id="select_table" name="select_table" style="width:70%">
                                        <option value="">Please select...</option>
                                        @isset($tables)
                                            @foreach ($tables as $table)
                                                <option value="{{$table}}">{{$table}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    {{-- <form id="table_search_form" action="" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="category_id" id="category_id">
                                    </form> --}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search_col" class="float-left" style="margin-top:0.5rem;">Columns:</label>
                                    <select class="form-control float-right" id="search_col" name="search_col" style="width:70%">
                                        <option value="">Please select tables...</option>
                                        {{-- <option value="">Please select...</option>
                                        <option value="1">Product ID</option>
                                        <option value="2">Product Name</option>
                                        <option value="3">Vendor</option>
                                        <option value="4">Sold</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="search_keyword" placeholder="Pleae enter keyword...">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" id="core_search" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="col-md-12 clone " style="display : none">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                   
                                </thead>
                                <tbody>
                                                          
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>

            

                <?php 
                if(isset($isian) || isset($mengisi) || isset($pakan)){
                ?>
                    <div class="col-md-12">
                        <div class="row" id="search_result">
                            <div class="col-md-6"><!--tab kiri-->
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Tabel Isian</h5>
                                        <form action="{{route('isian_edit')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="@isset($user_id){{$user_id}}@endisset">
                                            <table class="mb-0 table table-bordered">
                                                
                                                {{-- {{dd($isian)}} --}}
                                                <tbody>
                                                    <tr>
                                                        <td>Kelurahan</td>
                                                    <td><input type="text" name="kelurahan" value="@isset($isian){{$isian->kelurahan}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td><input type="text" name="kecamatan" value="@isset($isian){{$isian->kecamatan}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten/Kota</td>
                                                        <td><input type="text" name="kabupaten_kota" value="@isset($isian){{$isian->kabupaten_kota}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr><tr>
                                                        <td>Provinsi</td>
                                                        <td><input type="text" name="provinsi" value="@isset($isian){{$isian->provinsi}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bulan</td>
                                                        <td><input type="text" name="bulan" value="@isset($isian){{$isian->bulan}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun</td>
                                                        <td><input type="text" name="tahun" value="@isset($isian){{$isian->tahun}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr><tr>
                                                        <td>Nama pengisi</td>
                                                        <td><input type="text" name="nama_pengisi" value="@isset($isian){{$isian->nama_pengisi}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr><tr>
                                                        <td>Pekerjaan</td>
                                                        <td><input type="text" name="pekerjaan" value="@isset($isian){{$isian->pekerjaan}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    </tr><tr>
                                                        <td>Jabatan ($$$)</td>
                                                        <td><input type="number" name="jabatan" value="@isset($isian){{$isian->jabatan}}@endisset" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                </tbody>
                                                
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"><!--tab kanan-->
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">SUMBER  DATA UNTUK MENGISI PROFIL KELURAHAN</h5>
                                        <form action="{{route('mengisi_edit')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="@isset($user_id){{$user_id}}@endisset">
                                            <table class="mb-0 table table-bordered">
                                                <tbody>
                                                    </tr><tr>
                                                        <td>field1</td>
                                                        <td><input type="text" value="@isset($mengisi){{$mengisi->field1}}@endisset" name="field1" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    </tr><tr>
                                                        <td>field2</td>
                                                        <td><input type="text" value="@isset($mengisi){{$mengisi->field2}}@endisset" name="field2" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    </tr><tr>
                                                        <td>field3</td>
                                                        <td><input type="text" value="@isset($mengisi){{$mengisi->field3}}@endisset" name="field3" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                    </tr><tr>
                                                        <td>field4 ($$$)</td>
                                                        <td><input type="number" value="@isset($mengisi){{$mengisi->field4}}@endisset" name="field4" class="mb- form-control-sm form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Ketersediaan Hijauan Pakan Ternak</h5>
                                        <form action="{{route('pakan_edit')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="@isset($user_id){{$user_id}}@endisset">
                                            <table class="mb-0 table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Luas tanaman pakan ternak (rumput gajah, dll)</td>
                                                        <td><input type="text" name="luas_tanaman_pakan_ternak_rumput_gajah_dll" value="@isset($pakan){{$pakan->luas_tanaman_pakan_ternak_rumput_gajah_dll}}@endisset" id="luas_tanaman_pakan_ternak_rumput_gajah_dll" class="form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Produksi hijauan makanan ternak</td>
                                                        <td><input type="text" name="produksi_hijauan_makanan_ternak" value="@isset($pakan){{$pakan->produksi_hijauan_makanan_ternak}}@endisset" id="produksi_hijauan_makanan_ternak" class="form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dipasok dari luar Kelurahan</td>
                                                        <td><input type="text" name="dipasok_dari_luar_kelurahan" value="@isset($pakan){{$pakan->dipasok_dari_luar_kelurahan}}@endisset" id="dipasok_dari_luar_kelurahan" class="form-control-sm form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Disubsidi dinas ($$$)</td>
                                                        <td><input type="number" name="disubsidi_dinas" value="@isset($pakan){{$pakan->disubsidi_dinas}}@endisset" id="disubsidi_dinas" class="form-control-sm form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="edit_button">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title"></h5>
                                        <div class="text-center">
                                            <button id="data_submit" class="btn-wide mb-2 mr-2 btn-icon-vertical btn btn-primary btn-lg"><i class=""> </i>Simpan</button>
                                            {{-- <button class="btn-wide mb-2 mr-2 btn-icon-vertical btn btn-primary btn-lg"><i class=""> </i>Batal</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }else{
                ?>
                    <div class="col-md-12">
                        <div class="row" id="search_result">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body text-center">
                                        <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                            <thead>
                                                
                                            </thead>
                                            <tbody>
                                                <h3>Please enter keyword for your search...</h3>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }            
                ?>

            
        </div>
        

        
@endsection
@section('script')
    
    <script src="{{ asset('js/data.js') }}"></script>
@endsection
<div class="my_toast"  style="display:none;">
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

</div>

<div class="loader_container">    
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
</div>