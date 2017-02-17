@extends('log-viewer::_template.master')

@section('page-header')
    <h1>
        Log Viewer
        <small>By <a href="https://github.com/ARCANEDEV/LogViewer" target="_blank">ARCANEDEV</a></small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-body">

            <h1 class="page-header">Log [{{ $log->date }}]</h1>

            <div class="row">
                <div class="col-md-2">
                    @include('log-viewer::_partials.menu')
                </div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Log info :

                            <div class="group-btns pull-right">
                                <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="btn btn-xs btn-success">
                                    <i class="fa fa-download"></i> DOWNLOAD
                                </a>
                                <a href="#delete-log-modal" class="btn btn-xs btn-danger" data-toggle="modal">
                                    <i class="fa fa-trash-o"></i> DELETE
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td>File path :</td>
                                        <td colspan="5">{{ $log->getPath() }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Log entries : </td>
                                        <td>
                                            <span class="label label-primary">{{ $entries->total() }}</span>
                                        </td>
                                        <td>Size :</td>
                                        <td>
                                            <span class="label label-primary">{{ $log->size() }}</span>
                                        </td>
                                        <td>Created at :</td>
                                        <td>
                                            <span class="label label-primary">{{ $log->createdAt() }}</span>
                                        </td>
                                        <td>Updated at :</td>
                                        <td>
                                            <span class="label label-primary">{{ $log->updatedAt() }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        @if ($entries->hasPages())
                            <div class="panel-heading">
                                {!! $entries->render() !!}

                                <span class="label label-info pull-right">
                                    Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                                </span>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="entries" class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>ENV</th>
                                        <th style="width: 120px;">Level</th>
                                        <th style="width: 65px;">Time</th>
                                        <th>Header</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($entries as $key => $entry)
                                        <tr>
                                            <td>
                                                <span class="label label-env">{{ $entry->env }}</span>
                                            </td>
                                            <td>
                                                <span class="level level-{{ $entry->level }}">
                                                    {!! $entry->level() !!}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="label label-default">
                                                    {{ $entry->datetime->format('H:i:s') }}
                                                </span>
                                            </td>
                                            <td>
                                                <p>{{ $entry->header }}</p>
                                            </td>
                                            <td class="text-right">
                                                @if ($entry->hasStack())
                                                    <a class="btn btn-xs btn-default" role="button" data-toggle="collapse" href="#log-stack-{{ $key }}" aria-expanded="false" aria-controls="log-stack-{{ $key }}">
                                                        <i class="fa fa-toggle-on"></i> Stack
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($entry->hasStack())
                                            <tr>
                                                <td colspan="5" class="stack">
                                                    <div class="stack-content collapse" id="log-stack-{{ $key }}">
                                                        {!! preg_replace("/\n/", '<br>', $entry->stack) !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($entries->hasPages())
                            <div class="panel-footer">
                                {!! $entries->render() !!}

                                <span class="label label-info pull-right">
                                    Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div><!-- /.box-body -->
    </div><!--box box-success-->

    {{-- DELETE MODAL --}}
    <div id="delete-log-modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="{{ $log->date }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">DELETE LOG FILE</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="label label-danger">DELETE</span> this log file <span class="label label-primary">{{ $log->date }}</span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">DELETE FILE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm  = $('form#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.submit(function(event) {
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
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception !')
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
        });
    </script>
@endsection
