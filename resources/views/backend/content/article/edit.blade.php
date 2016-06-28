@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.content.article.management') }}
        <small>{{ trans('labels.backend.content.article.all') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($model, ['route' => 'admin.content.article.update', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.content.article.create') }}</h3>

                <div class="box-tools pull-right">
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-10">
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article.id')]) !!}
                    </div>
                </div><!--form control-->
                
                <div class="form-group">
                    {!! Form::label('title', trans('validation.attributes.backend.content.article.title'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article.title')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('slug', trans('validation.attributes.backend.content.article.slug'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article.slug')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('excerpt', trans('validation.attributes.backend.content.article.excerpt'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.excerpt')]) !!}
                    <div class="col-lg-10">
                        {!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('content', trans('validation.attributes.backend.content.article.content'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.content')]) !!}
                    <div class="col-lg-10">
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.content.article.status') }}</label>
                    <div class="col-lg-1">
                        <input type="checkbox" value="1" name="status" checked="checked" />
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('created_at', trans('validation.attributes.backend.content.article.created_at'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.created_at')]) !!}
                    <div class="col-lg-10">
                        {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                
                <div class="form-group">
                    {!! Form::label('updated_at', trans('validation.attributes.backend.content.article.updated_at'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.updated_at')]) !!}
                    <div class="col-lg-10">
                        {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.content.article')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
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
