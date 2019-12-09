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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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