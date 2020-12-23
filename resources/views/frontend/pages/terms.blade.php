@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Terms & Conditions')
                    </x-slot>

                    <x-slot name="body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Molestie ac feugiat sed lectus. Egestas diam in arcu cursus. Vitae nunc sed velit dignissim sodales ut eu sem. Nibh praesent tristique magna sit amet purus gravida quis. Tincidunt lobortis feugiat vivamus at augue. Mi quis hendrerit dolor magna eget est lorem. Dapibus ultrices in iaculis nunc sed augue lacus viverra vitae. Ullamcorper malesuada proin libero nunc consequat interdum varius. Tellus elementum sagittis vitae et leo duis ut diam quam. Nisl pretium fusce id velit. Sed enim ut sem viverra aliquet.</p>

                        <p>Laoreet suspendisse interdum consectetur libero id. Duis ut diam quam nulla porttitor massa id neque. Nullam eget felis eget nunc lobortis mattis aliquam faucibus. Tristique sollicitudin nibh sit amet commodo. A erat nam at lectus urna duis convallis convallis. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Bibendum ut tristique et egestas. Risus sed vulputate odio ut enim blandit volutpat maecenas. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim. Tristique sollicitudin nibh sit amet commodo. Ac felis donec et odio pellentesque diam volutpat commodo sed. Quam quisque id diam vel. Massa tempor nec feugiat nisl pretium fusce id. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat.</p>

                        <p>Gravida rutrum quisque non tellus orci. Eget mauris pharetra et ultrices neque. Habitasse platea dictumst quisque sagittis purus sit amet volutpat. Nunc consequat interdum varius sit amet mattis vulputate enim. Venenatis a condimentum vitae sapien pellentesque habitant morbi tristique senectus. Tempor nec feugiat nisl pretium. Fames ac turpis egestas integer eget aliquet nibh. Mus mauris vitae ultricies leo integer. Vitae proin sagittis nisl rhoncus mattis rhoncus. Commodo odio aenean sed adipiscing diam donec. Purus semper eget duis at tellus at urna condimentum mattis.</p>

                        <p>Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Massa massa ultricies mi quis hendrerit. Nunc id cursus metus aliquam eleifend mi in nulla posuere. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Accumsan tortor posuere ac ut consequat semper viverra nam. Massa tincidunt dui ut ornare. Elit sed vulputate mi sit amet mauris commodo. Faucibus nisl tincidunt eget nullam non nisi. Tortor condimentum lacinia quis vel eros donec ac odio. Posuere ac ut consequat semper. Vestibulum mattis ullamcorper velit sed ullamcorper. Blandit libero volutpat sed cras. Ultricies integer quis auctor elit sed vulputate mi. In hendrerit gravida rutrum quisque non tellus orci ac. Orci phasellus egestas tellus rutrum tellus pellentesque eu. Etiam non quam lacus suspendisse faucibus interdum. Ornare lectus sit amet est. Bibendum est ultricies integer quis auctor elit sed vulputate. Eget duis at tellus at urna.</p>

                        <p>Sit amet massa vitae tortor condimentum lacinia quis. Id venenatis a condimentum vitae sapien pellentesque habitant. Ac tortor dignissim convallis aenean. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat. Consectetur adipiscing elit ut aliquam purus sit amet luctus venenatis. Id porta nibh venenatis cras sed felis. Fermentum odio eu feugiat pretium. Id velit ut tortor pretium viverra. Quis auctor elit sed vulputate mi sit amet mauris. Vel elit scelerisque mauris pellentesque pulvinar pellentesque. Facilisis volutpat est velit egestas dui id ornare. Pretium viverra suspendisse potenti nullam ac. Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus. Amet purus gravida quis blandit turpis.</p>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
