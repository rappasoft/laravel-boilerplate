@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        
        @foreach($articles as $article)
        <div class="col-md-12">

            <div class="panel panel-info">
                <div class="panel-heading"><i class="fa fa-book"></i><a href="/article/view/{{ $article->id }}"> {{ $article->title }} </a></div>

                <div class="panel-body">
                    {{$article->excerpt}}
                    <div class="pull-right">{{ $article->created_at->diffForHumans() }}</div>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->
        @endforeach
        <nav class="text-center">{!! $articles->render() !!}</nav>

    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop