@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ access()->user()->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! getLanguageBlock('backend.lang.welcome') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }} - Example for paginated results</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->render(false,true,5,'hist') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }} - Example 1 for history ajax call </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div id="history-type-user" class="box-body">
            <ul class="timeline">
            </ul>
            <div id="history-loader" class="center-block text-center" style="display: none;">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><h4><strong>{{ trans('history.general.load_item') }}</strong></h4>
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts-end')
    <script>
        $(function() {           
            var historyParams = {
                history_id: 'history-type-user',
                loader_id: 'history-loader',
                perpage: 5,
                url: "{{ route('admin.access.user.history.get-history') }}",
                nomore: '<li><h3 class="timeline-header no-border text-center"><strong>{{ trans("history.general.no_more_item") }}</strong></h3></div></li>'
            };
            var flag = true; 
            var catchScroll = true;
            ajaxCall();
            $(window).scroll(function(){ 
                if ($(window).scrollTop() == $(document).height() - $(window).height()){
                    ajaxCall();
                }
            });

            function ajaxCall(){
                if(flag && catchScroll){                    
                    var data = {perpage: historyParams.perpage};
                    $.ajax({
                        url: historyParams.url,
                        type: 'get',
                        cache: false,
                        data: data,
                        beforeSend: function(){
                            catchScroll = false;
                            $('#' + historyParams.loader_id).show();   
                        },
                        complete: function(){
                            $('#' + historyParams.loader_id).hide(); 
                            catchScroll = true;
                        },
                        success: function(data){
                            console.log(data);
                            appendHistory(data, historyParams.history_id, historyParams.nomore);
                        }
                    });                      
                }
            }

            function appendHistory(data, el_id, nomore){
                var ul = '#' +el_id + ' > ul';
                var i = 1;   
                $(data.data).each(function(a,b){         
                    $(b).hide().appendTo(ul).fadeIn(i*200);
                });
                historyParams.url = data.next_page_url;
                if(data.last_page == data.current_page){           
                    $(nomore).hide().appendTo(ul).fadeIn(200); 
                    flag = false;                   
                }
            }
        });        
    </script>
@stop