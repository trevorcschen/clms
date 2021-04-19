@extends('layouts.default')

@section('title', 'Users')

@section('subheader', 'Users')
@section('subheader-link', route('users.index'))

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
            @if (session('errors'))
                <div class="m-alert m-alert--icon m-alert--air alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="m-alert__icon">
                        <i class="la la-warning"></i>
                    </div>
                    <div class="m-alert__text">
                        <strong>
                            ERROR!!
                        </strong>
                        {!! session('errors') !!}
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
                            Users
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{route('users.create')}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
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
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">

                    </label>


                </div>

                    <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="">Delete Selected</button>
                    <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="">Delete Selected Permanently</button>

                <table class="table table-striped table-bordered table-hover table-checkable" id="user-table">
                    <thead>
                    <tr>
                        <th>
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" class="m-group-checkable master">
                                <span></span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Programme</th>
                        <th>Active</th>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Programme</th>
                        <th>Active</th>
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
@section('scripts')
    <script src="{{ asset('assets/demo/default/custom/crud/datatables/data-sources/delete.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {

            $('#user-table tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            });

            table = $('#user-table').DataTable( {
                searchDelay: 500,
                processing: true,
                serverSide: true,
                dom:
                    "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                keys: true,
                colReorder: true,
                scrollX: true,
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
                ajax: "{{ route('ajax.users') }}",
                columns: [
                    { data: 'id', orderable: false, searchable: false },
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'phone_number' },
                    { data: 'email' },
                    { data: 'roles' },
                    {data :'programmes'},
                    { data: 'active' },
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
            });

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

            $('#modal-delete').on('show.bs.modal', function (e) {
                var url = '{{ route("users.destroy", ':id') }}';
                url = url.replace(':id', $(e.relatedTarget).data('id'));
                $(this).find('form').attr('action', url);
            });



        });


    </script>

@endsection
@endsection

