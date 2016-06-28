@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.content.article.management') }}
        <small>{{ trans('labels.backend.content.article.all') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.content.article.articles') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right" style="margin-bottom:10px">
                    <div class="btn-group">
                          <a href="{{route('admin.content.article.create')}}" class="btn btn-success btn-xs">{{ trans('buttons.general.crud.create') }}</a>
                    </div>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.content.article.index.table.id') }}</th>
                        <th>{{ trans('labels.backend.content.article.index.table.user_id') }}</th>
                        <th>{{ trans('labels.backend.content.article.index.table.title') }}</th>
                        <th>{{ trans('labels.backend.content.article.index.table.slug') }}</th>
                        <th>{{ trans('labels.backend.content.article.index.table.excerpt') }}</th>
                        <th>{{ trans('labels.backend.content.article.index.table.status') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.content.article.index.table.created_at') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.content.article.index.table.updated_at') }}</th>
                        <th class="visible-lg">{{ trans('labels.backend.content.article.index.table.deleted_at') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                            <tr>
                                <td>{!! $model->id !!}</td>
                                <td>{!! $model->user_id !!}</td>
                                <td>{!! $model->title !!}</td>
                                <td>{!! $model->slug !!}</td>
                                <td>{!! $model->excerpt !!}</td>
                                <td>{!! $model->status !!}</td>
                                <td>{!! $model->created_at !!}</td>
                                <td>{!! $model->updated_at !!}</td>
                                <td>{!! $model->deleted_at !!}</td>
                                <td>
                                    <a href="{{route('admin.content.article.view',['id' => $model->id])}}" class="btn btn-default btn-xs">{{ trans('buttons.general.view') }}</a>
                                    <a href="{{route('admin.content.article.edit',['id' => $model->id])}}" class="btn btn-success btn-xs">{{ trans('buttons.general.edit') }}</a>
                                    @if ($model->deleted_at)
                                    <a href="{{route('admin.content.article.restore',['id' => $model->id])}}" class="btn btn-warning btn-xs">{{ trans('buttons.general.restore') }}</a>
                                    @else
                                    <a href="{{route('admin.content.article.destroy',['id' => $model->id])}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.delete') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $models->total() !!} {{ trans_choice('labels.backend.content.article.index.table.total', $models->total()) }}
            </div>

            <div class="pull-right">
                {!! $models->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
