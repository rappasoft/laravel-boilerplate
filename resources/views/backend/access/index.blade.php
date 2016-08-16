@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="users-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.access.users.table.id') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.name') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.created') }}</th>
                            <th>{{ trans('labels.backend.access.users.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div id="history-type-user" class="box-body">
            <?php $item = 5; $type = 'User'; ?>
            {!! history()->renderType($type, 0, $item) !!}
            <div id="history-loader" class="center-block text-center" style="display: none;">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><h4><strong>{{ trans('history.general.load_item') }}</strong></h4>
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.user.get") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'confirmed', name: 'confirmed'},
                    {data: 'roles', name: 'roles'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            var historyParams = {
                skip: {{ $item }},
                take: {{ $item }},
                type: '{{ $type }}',
                history_id: 'history-type-user',
                loader_id: 'history-loader',
                nomore: '<li><h3 class="timeline-header no-border text-center"><strong>{{ trans("history.general.no_more_item") }}</strong></h3></div></li>'
            };
            var flag = true; 
            var catchScroll = true;
            $(window).scroll(function(){ 
                if(flag && $('#' + historyParams.history_id + ' > ul > li').length <= historyParams.skip){
                    if ($(window).scrollTop() == $(document).height() - $(window).height()){
                        var data = {skip: historyParams.skip, take: historyParams.take, type: historyParams.type};
                        $.ajax({
                            url: "{{ route('admin.access.user.history.get-history-type') }}",
                            type: 'post',
                            cache: false,
                            data: data,
                            beforeSend: function(){
                                catchScroll = false;
                                $('#' +historyParams.loader_id).show();   
                            },
                            complete: function(){
                                $('#' +historyParams.loader_id).hide(); 
                                catchScroll = true;
                            },
                            success: function(data){
                                appendHistory(data, historyParams.history_id, historyParams.nomore);
                            }
                        });  
                    }
                }
            });

            function appendHistory(data, el_id, nomore){
                var i = 1;
                var ul = '#' +el_id + ' > ul';
                if(data.data != "{{ trans('history.backend.none_for_type') }}"){     
                    $('li', data.data).each(function(index){            
                        $(this).hide().appendTo(ul).fadeIn(i*200);
                        i++;
                    });
                    historyParams.skip += historyParams.take;
                } else {           
                    $(nomore).hide().appendTo(ul).fadeIn(500); 
                    flag = false;                   
                }
            }
        });        
    </script>
@stop