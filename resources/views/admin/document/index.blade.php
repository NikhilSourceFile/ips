@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Documents</h4>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex">
                <div class="chat-leftsidebar me-lg-4">
                    <div class="">
                        <div class="py-4 border-bottom">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1">New Document</h5>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('new-document') }}" id="new-document-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">File Name</label>
                                <input type="text" class="form-control" name="file_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Upload File</label>
                                <input type="file" class="form-control" name="document_pdf" accept=".pdf,image/*,.gif, .jpg, .png, .doc" required>
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
                                    <h5 class="font-size-15 mb-1">PDF List</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>Document</th>
                                        <th>Copy</th>
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
                    <form id="update-document-form">
                        @csrf
                        <input type="hidden" name="id" id="editId">
                        <input type="hidden" name="old_file" id="old_file">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Category</label>
                            <select name="category_id" class="form-select" id="category_id" required>
                               
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">File Name</label>
                            <input type="text" class="form-control" name="file_name" id="file_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Upload File</label>
                            <input type="file" class="form-control" name="document_pdf" accept=".pdf,image/*,.gif, .jpg, .png, .doc">
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
                "ajax": "{{ route('get-documents') }}",
                "columns": [{
                        data: 'id'
                    },

                    {
                        data: 'category'
                    },
                    {
                        data: 'document'
                    },
                    {
                        data: 'copy'
                    },
                    {
                        data: "action_edit",
                        "mRender": function(data, type, row) {
                            return row.action_edit + ' ' + row.action_delete;
                        }
                    }
                ]
            });


            $('#new-document-form').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: "{{ route('new-document') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        $("#new-document-form")[0].reset();
                        Swal.fire({ title: "Success!", text: response.success, icon: "success", showCancelButton: 0, confirmButtonColor: "#556ee6"});
                    },
                    error: function(response) {

                        
                    }
                });
            });


            $(document).on("click", ".copyLink", function(e) {
                var base_url = window.location.origin;

                var url = $(this).attr("data-href");
                let link = base_url + url;
                navigator.clipboard.writeText(link).then(function() {
                    $(e.target).text('Copied!').addClass('btn-success')

                    console.log()
                }, function(err) {
                    console.error('Async: Could not copy text: ', err);
                });
            });




            $(document).on("click", ".editdocument", function(e) {
                e.preventDefault();
                Id = $(this).attr("data-id");
                $.ajax({
                    url: "{{ route('edit-document') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": Id
                    },
                    success: function(response) {
                        console.log(response)
                        $('#editId').val(response.document.id);
                        $('#file_name').val(response.document.file_name);

                        let html = '';
                        html = `<option value="${response.document.category_id}" selected>${response.document.category}</option>`;
                        response.categories.forEach(function(key) {
                            html += `<option value="${key.id}">${key.category}</option>`;
});
                        $('#category_id').html(html);
                        $('#old_file').val(response.document.document)
                        $('#editModal').modal('show');
                    }
                });
            });


            $('#update-document-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('update-document') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        $('#editModal').modal('hide');
                        $("#update-document-form")[0].reset();
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
            


            $(document).on("click", ".deleteDocument", function(e) {
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
                            url: "{{ route('document-delete') }}",
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
