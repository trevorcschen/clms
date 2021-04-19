@extends('layouts.default')

@section('title', 'Sessions')

@section('subheader', 'Sessions')
@section('subheader-link', route('sessions.index'))

@section('subheader-action', 'List')

@section('content')
    <div class="m-content">
        @if (session('success'))
            <div class="m-alert m-alert--icon m-alert--air alert alert-success alert-dismissible fade show" role="alert">
                <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                </div>
                <div class="m-alert__text">
                    <strong>
                        Well done!
                    </strong>
                    {!! session('success') !!}
                </div>
                <div class="m-alert__close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Sessions
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{route('sessions.create')}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-cart-plus"></i>
													<span>
														New Record
													</span>
												</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped table-bordered table-hover table-checkable" id="session-table">
                    <thead>
                    <tr>
                        <th>
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" class="m-group-checkable master">
                                <span></span>
                            </label>
                        </th>
                        <th>Session ID</th>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Active</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" class="m-group-checkable master">
                                <span></span>
                            </label>
                        </th>
                        <th>Session ID</th>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Active</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                    </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Permanently?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>The record and all its associated data will deleted.</p>
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/demo/default/custom/crud/datatables/data-sources/delete.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {

            $('#session-table tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            });


            var table = $('#session-table').DataTable( {
                processing: true,
                serverSide: true,
                dom:
                    "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                keys: true,
                colReorder: true,
                buttons: [{
                    extend : 'copy',
                    text : '<i class="far fa-copy"></i> Copy</i>',
                }, {
                    extend : 'csv',
                    text : '<i class="fas fa-file-csv"> CSV</i>',
                }, {
                    extend : 'excel',
                    text : '<i class="far fa-file-excel"></i> Excel</i>',
                },  {
                    extend : 'pdfHtml5',
                    orientation : 'landscape',
                    pageSize : 'LEGAL',
                    text : '<i class="fa fa-file-pdf-o"> PDF</i>',
                } , {
                    extend : 'print',
                    text : '<i class="fas fa-print"></i> Print</i>',
                }, 'colvis'],
                ajax: "{{ route('ajax.sessions') }}",
                columns: [
                    { data: 'id', orderable: false, searchable: false },
                    { data: 'id', sWidth :'1%' },
                    { data: 'title', sWidth :'15%'  },
                    { data: 'start_date', sWidth :'10%'  },
                    { data: 'end_date', sWidth :'10%'  },
                    { data: 'active', sWidth :'10%'  },
                    { data: 'created_at', sWidth :'10%'  },
                    { data: 'updated_at', sWidth :'10%'  },
                    { data: 'actions', orderable: false, searchable: false },
                ],
                order: [
                    [0, "desc"]
                ],
                columnDefs: [{
                    targets: 0,
                    width: "30px",
                    className: "dt-right",
                    render: function(e, a, t, n) {
                        return '\n<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">\n' +
                            '<input type="checkbox" value="" class="m-checkable sub_chk" data-id="' + e + '">\n' +
                            '<span></span>\n</label>'
                    }
                }]
            } );

            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });


        });

    </script>
@endsection
