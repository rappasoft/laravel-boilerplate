@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-push-8">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ $user->picture }}" alt="Profile picture">
                                    </div>
                                    <div class="media-body">
                                      <h4 class="media-heading">{{ $user->name }} <br><small>{{ $user->email }}</small></h4>
                                      {{ link_to_route('frontend.user.profile.index', 'My Profile / Settings', [], ['class' => 'btn btn-info btn-xs']) }}
                                    </div>
                                </li><!--media-->
                            </ul><!--media-list-->
                            <img src="https://placeholdit.imgix.net/~text?txtsize=80&bg=c5c5c5&txtclr=ffffff&txt=Placeholder+for+user+data&w=800&h=200&txttrack=0" alt="" class="img-responsive" style="margin-bottom: 10px">
                            <img src="https://placeholdit.imgix.net/~text?txtsize=80&bg=c5c5c5&txtclr=ffffff&txt=Example+user+area+for+your+user&w=800&h=200&txttrack=0" alt="" class="img-responsive" style="margin-bottom: 10px">
                            <h3>More user data</h3>
                            <img src="https://placeholdit.imgix.net/~text?txtsize=80&bg=c5c5c5&txtclr=ffffff&txt=More+data+for+your+user&w=800&h=200&txttrack=0" alt="" class="img-responsive" style="margin-bottom: 10px">
                        </div><!--col-md-4-->
                        <div class="col-md-8 col-md-pull-4">
                            This is where you put the dashboard for your application. All the yummy data that serves the user.
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Item 1</h4>
                                        </div>
                                        <div class="panel-body">
                                            <img src="https://placeholdit.imgix.net/~text?txtsize=50&bg=c5c5c5&txtclr=ffffff&txt=This+could+be+a+chart&w=1000&h=200&txttrack=0" alt="" class="img-responsive">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Item 2</h4>
                                        </div>
                                        <div class="panel-body">
                                            <img src="https://placeholdit.imgix.net/~text?txtsize=80&bg=c5c5c5&txtclr=ffffff&txt=Another+object&w=800&h=200&txttrack=0" alt="" class="img-responsive">
                                            Descritpion for item 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Item 3</h4>
                                        </div>
                                        <div class="panel-body">
                                            <img src="https://placeholdit.imgix.net/~text?txtsize=80&bg=c5c5c5&txtclr=ffffff&txt=Another+object&w=800&h=200&txttrack=0" alt="" class="img-responsive">
                                            Descritpion for item 3. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--col-md-8-->
                    </div><!--row-->
                </div><!--panel body-->

            </div><!-- panel -->
        </div><!-- col-md-10 -->
    </div><!-- row -->
@endsection
