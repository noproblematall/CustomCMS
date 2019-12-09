@extends('layouts.app')

@section('subtitle')
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-magic-wand icon-gradient bg-amy-crisp">
            </i>
        </div>
        <div>ACTIVITY ADMIN/USER</div>                        
    </div>
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Aktifitas User Kelurahan</h5>
                <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                    @isset($history)
                        @forelse ($history as $item)
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl {{str_slug(strtolower($item->history_type))}}"> </i></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">{{$item->history_type}}</h4>
                                        <p>{{$item->history_name}}  <span style="color:blue;">{{$item->created_at}}</span></p>
                                        <span class="vertical-timeline-element-date">{{date("h:i:a", strtotime($item->created_at))}}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-warning"> </i></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">INFO</h4>
                                        <p>There is no history</a></p>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    @endisset
                    
                </div>
                <div class="mt-2 float-right">
                    {{$history->links()}}
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection
