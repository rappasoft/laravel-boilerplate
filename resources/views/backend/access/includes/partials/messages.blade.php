@if (Session::get('error'))
    <div class="alert alert-error alert-danger">{!! Session::get('error') !!}</div>
@elseif (Session::get('notice'))
    <div class="alert">{!! Session::get('notice') !!}</div>
@elseif ($errors->any())
    <div class="alert alert-danger">
        <ul>
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        </ul>
    </div>
@elseif (Session::get('flash_success'))
    <div class="alert alert-success">
        @if(is_array(json_decode(Session::get('flash_success'),true)))
            {!! implode('', Session::get('flash_success')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_success') !!}
        @endif
    </div>
@elseif (Session::get('flash_warning'))
    <div class="alert alert-warning">
        @if(is_array(json_decode(Session::get('flash_warning'),true)))
            {!! implode('', Session::get('flash_warning')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_warning') !!}
        @endif
    </div>
@elseif (Session::get('flash_info'))
    <div class="alert alert-info">
        @if(is_array(json_decode(Session::get('flash_info'),true)))
            {!! implode('', Session::get('flash_info')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_info') !!}
        @endif
    </div>
@elseif (Session::get('flash_danger'))
    <div class="alert alert-danger">
        @if(is_array(json_decode(Session::get('flash_danger'),true)))
            {!! implode('', Session::get('flash_danger')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_danger') !!}
        @endif
    </div>
@elseif (Session::get('flash_message'))
    <div class="alert alert-info">
        @if(is_array(json_decode(Session::get('flash_message'),true)))
            {!! implode('', Session::get('flash_message')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_message') !!}
        @endif
    </div>
@endif