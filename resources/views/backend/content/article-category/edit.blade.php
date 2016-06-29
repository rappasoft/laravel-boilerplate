@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.content.article-category.management') . ' | ' . trans('labels.backend.content.article-category.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.content.article-category.management') }}
        <small>{{ trans('labels.backend.content.article-category.article-category') }}#{{ $model->id }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($model, ['route' => ['admin.content.article-category.update', $model->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.content.article-category.edit') }}</h3>

                <div class="box-tools pull-right">
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('title', trans('validation.attributes.backend.content.article-category.title'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article-category.title')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('slug', trans('validation.attributes.backend.content.article-category.slug'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article-category.slug')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.content.article-category.status') }}</label>
                    <div class="col-lg-1">
                        <!--<input type="checkbox" value="1" name="status" checked="checked" />-->
                        {!! Form::hidden('status', false, ['class' => 'form-control']) !!}
                        {!! Form::checkbox('status', true) !!}
                    </div>
                </div><!--form control-->
                
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.content.article-category')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.save') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop
