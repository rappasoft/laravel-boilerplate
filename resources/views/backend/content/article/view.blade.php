@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.content.article.management') }}
        <small>{{ trans('labels.backend.content.article.all') }}</small>
    </h1>
@endsection

@section('content')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.content.article.create') }}</h3>

                <div class="box-tools pull-right">
                <div class="pull-right" style="margin-bottom:10px">
                    <div class="btn-group">
                          <a href="{{route('admin.content.article.edit', ['id' => $model->id])}}" class="btn btn-success btn-xs">{{ trans('buttons.general.edit') }}</a>
                          @if ($model->deleted_at)
                          <a href="{{route('admin.content.article.restore', ['id' => $model->id])}}" class="btn btn-warning btn-xs">{{ trans('buttons.general.restore') }}</a>
                          @else
                          <a href="{{route('admin.content.article.destroy', ['id' => $model->id])}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.delete') }}</a>
                          @endif
                    </div>
                </div>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.id') }}</td><td>{!! $model->id !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.user_id') }}</td><td>{!! $model->user_id !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.title') }}</td><td>{!! $model->title !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.slug') }}</td><td>{!! $model->slug !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.excerpt') }}</td><td>{!! $model->excerpt !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.content') }}</td><td>{!! $model->content !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article.index.table.status') }}</td><td>{!! $model->status !!}</td>
                        </tr>
                        <tr>
                            <th class="visible-lg">{{ trans('labels.backend.content.article.index.table.created_at') }}</td><td>{!! $model->created_at !!}</td>
                        </tr>
                        <tr>
                            <th class="visible-lg">{{ trans('labels.backend.content.article.index.table.updated_at') }}</td><td>{!! $model->updated_at !!}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop
