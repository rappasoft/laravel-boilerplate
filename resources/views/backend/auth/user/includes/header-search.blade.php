<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    {{ html()->form('GET', route(Route::currentRouteName()))->id('search-form')->open() }}
    <input type="hidden" name="sort" id="sort" value="{{ $sort }}">
    <input type="hidden" name="orderBy" id="orderBy" value="{{ $orderBy }}">
    <input type="text" id='searchText' name="search" class="mb-2 form-control" value="{{ old('search',$search) }}" placeholder="@lang('strings.backend.general.search_placeholder')" />
    {{ html()->form()->close() }}
</div><!--btn-toolbar-->