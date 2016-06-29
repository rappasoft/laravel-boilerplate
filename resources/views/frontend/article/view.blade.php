@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        
        <div class="col-md-12">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-book"></i>
                    {!! $model->category?$model->category->title_label:'' !!}
                    <a href="/article/view/{{ $model->id }}"> {{ $model->title }} </a>
                </div>

                <div class="panel-body">
                    <div>{{$model->excerpt}}</div>
                    <div>{!! $model->content !!}</div>
                    <div class="pull-right">{{ $model->created_at->diffForHumans() }}</div>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop