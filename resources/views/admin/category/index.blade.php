@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Categories</h4>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex">
                <div class="chat-leftsidebar me-lg-4">
                    <div class="">
                        <div class="py-4 border-bottom">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">New Category</h5>
                                </div>
                            </div>
                        </div>
                        <form id="new-category-form">
                            @csrf
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Category</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="" selected>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-100 user-chat">
                    <div class="card">
                        <div class="p-4 border-bottom ">
                            <div class="row">
                                <div class="col-md-4 col-9">
                                    <h5 class="font-size-15 mb-1">Category List</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sample modal content -->
    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edite Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update-category-form">
                        @csrf
                        <input type="hidden" name="id" id="editId">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" id="statusq" required>

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // DataTable
            var table = $('#datatable').dataTable({
                "Paginate": true,
                "processing": true,
                "pageLength": 10,
                "serverSide": true,
                "rowCallback": function(nRow, aData, iDisplayIndex) {
                    var oSettings = this.fnSettings();
                    $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
                    return nRow;
                },
                "bDestroy": true,
                "ajax": "{{ route('get-categories') }}",
                "columns": [{
                        data: 'id'
                    },

                    {
                        data: 'category'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: "action_edit",
                        "mRender": function(data, type, row) {
                            return row.action_edit + ' ' + row.action_delete;
                        }
                    }
                ]
            });


            $('#new-category-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('new-category') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        $("#new-category-form")[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: response.success,
                            icon: "success",
                            showCancelButton: 0,
                            confirmButtonColor: "#556ee6"
                        });
                    },
                    error: function(response) {}
                });
            });

            $(document).on("click", ".editcategory", function(e) {
                e.preventDefault();
                Id = $(this).attr("data-id");
                $.ajax({
                    url: "{{ route('edit-category') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": Id
                    },
                    success: function(response) {
                        console.log(response)
                        $('#editId').val(response.id);
                        $('#category').val(response.category);
                        let html = '';
                        if (response.status) {
                            html = `<option value="1" selected>Active</option>`;
                            html += `<option value="0" >Inactive</option>`;
                        } else {
                            html = `<option value="1" >Active</option>`;
                            html += `<option value="0" selected>Inactive</option>`;
                        }

                        $('#statusq').html(html);
                        $('#editModal').modal('show');
                    }
                });
            });


            $('#update-category-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('update-category') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        $('#editModal').modal('hide');
                        $("#update-category-form")[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: response.success,
                            icon: "success",
                            showCancelButton: 0,
                            confirmButtonColor: "#556ee6"
                        });
                    },
                    error: function(response) {}
                });
            });
            
            

            $(document).on("click", ".deletecategory", function(e) {
                e.preventDefault();
                Id = $(this).attr("data-id");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1
                }).then(function(t) {
                    if (t.value) {
                        $.ajax({
                            url: "{{ route('category-delete') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": Id
                            },
                            success: function(response) {
                                $('#datatable').DataTable().ajax.reload();
                                Swal.fire({ title: "Success!", text: response.success, icon: "success", showCancelButton: 0, confirmButtonColor: "#556ee6"});
                            }
                        });
                    } else {
                        $("#form_status").html(
                            '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="mdi mdi-alert-outline me-2"></i><strong>Cancelled! </strong> Your data is safe <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                            );
                    }
                });
            });
        });
    </script>
@endsection
