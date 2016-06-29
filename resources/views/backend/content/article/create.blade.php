@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.content.article.management') . ' | ' . trans('labels.backend.content.article.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.content.article.management') }}
        <small>{{ trans('labels.backend.content.article.new') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($model, ['route' => 'admin.content.article.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.content.article.create') }}</h3>

                <div class="box-tools pull-right">
                </div>
            </div><!-- /.box-header -->

            @include('backend.content.article._form')
            
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.content.article')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
    
    {!! HTML::style('https://imperavi.com/assets/js/redactor/redactor.css') !!}
    {!! HTML::script('https://imperavi.com/assets/js/redactor/redactor.js') !!}
    <script>$('#content').redactor();</script>
@stop
