@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.content.article-category.management') . ' | ' . trans('labels.backend.content.article-category.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.content.article-category.management') }}
        <small>{{ trans('labels.backend.content.article-category.article-category') }}#{{ $model->id }}</small>
    </h1>
@endsection

@section('content')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.content.article-category.view') }}</h3>

                <div class="box-tools pull-right">
                <div class="pull-right" style="margin-bottom:10px">
                    <div class="btn-group">
                          <a href="{{route('admin.content.article-category.edit', ['id' => $model->id])}}" class="btn btn-success btn-xs">{{ trans('buttons.general.edit') }}</a>
                          @if ($model->deleted_at)
                          <a href="{{route('admin.content.article-category.restore', ['id' => $model->id])}}" class="btn btn-warning btn-xs">{{ trans('buttons.general.restore') }}</a>
                          @else
                          <a href="{{route('admin.content.article-category.destroy', ['id' => $model->id])}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.delete') }}</a>
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
                            <td>{{ trans('labels.backend.content.article-category.index.table.id') }}</td><td>{!! $model->id !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article-category.index.table.user_id') }}</td><td>{!! $model->user->name !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article-category.index.table.title') }}</td><td>{!! $model->title !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article-category.index.table.slug') }}</td><td>{!! $model->slug !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('labels.backend.content.article-category.index.table.status') }}</td><td>{!! $model->status_label !!}</td>
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
