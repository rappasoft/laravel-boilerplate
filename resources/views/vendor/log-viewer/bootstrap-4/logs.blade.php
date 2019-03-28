@extends('backend.layouts.app')

@push('after-styles')
    @include('log-viewer::_template.style')
@endpush

@section('page-header')
    <h5 class="mb-4">Log Viewer
        <small class="text-muted">By <a href="https://github.com/ARCANEDEV/LogViewer" target="_blank">ARCANEDEV</a></small>
    </h5>
@endsection

@section('content')
    {!! $rows->render('log-viewer::_pagination.bootstrap-4') !!}

    <div class="card">
        <div class="card-header">
            {{ __('menus.backend.log-viewer.logs') }}
        </div><!-- box-header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        @foreach($headers as $key => $header)
                            <th class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                @if($key == 'date')
                                    <span class="badge badge-info level">{{ $header }}</span>
                                @else
                                    <span class="badge level level-{{ $key }}">
                                    {!! log_styler()->icon($key) . ' ' . $header !!}
                                </span>
                                @endif
                            </th>
                        @endforeach
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rows->count() > 0)
                        @foreach($rows as $date => $row)
                            <tr>
                                @foreach($row as $key => $value)
                                    <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                        @if($key == 'date')
                                            <a href="{{ route('log-viewer::logs.show', [$value]) }}" class="btn btn-sm btn-primary">
                                                {{ $value }}
                                            </a>
                                        @elseif($value == 0)
                                            <span class="badge level level-empty">{{ $value }}</span>
                                        @else
                                            <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                                <span class="badge level level-{{ $key }}">{{ $value }}</span>
                                            </a>
                                        @endif
                                    </td>
                                @endforeach
                                <td class="text-right">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Log Viewer Actions">
                                        <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-download"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="false" data-target="#delete-log-modal" data-log-date="{{ $date }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11" class="text-center">
                                <span class="badge badge-default">{{ __('log-viewer::general.empty-logs') }}</span>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div>
    </div>

    {!! $rows->render('log-viewer::_pagination.bootstrap-4') !!}

    <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-log-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Log File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;"><i class="fa fa-trash"></i> DELETE FILE</button>
                        <button type="button" class="btn btn-sm btn-primary pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(function () {

            var deleteLogModal = $('#delete-log-modal'),
                deleteLogForm  = $('#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogModal.on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var logdate = button.data('log-date'); // Extract info from data-* attributes
                var modal = $(this);
                modal.find('.modal-body p').html(
                    'Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file <span class="badge badge-primary">' + logdate + '</span> ?'
                );
                deleteLogForm.find('input[name=date]').val(logdate)
            });

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.reload();
                        }
                        else {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(data);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            deleteLogModal.on('hidden.bs.modal', function() {
                deleteLogForm.find('input[name=date]').val('');
                deleteLogModal.find('.modal-body p').html('');
            });
        });
    </script>
@endpush
