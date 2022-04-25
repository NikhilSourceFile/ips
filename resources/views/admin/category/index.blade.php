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
                                        <th>Date Time</th>
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
                "ajax": "{{ url('get-categories') }}",
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
                        data: "action_edit",
                        "mRender": function(data, type, row) {
                            return row.action_edit + ' ' + row.action_delete;
                        }
                    }
                ]
            });


            $('#new-category-form').on('submit', function(event) {
                event.preventDefault();

                // $('#pr-tags-error').text('');
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
                    },
                    error: function(response) {

                        // $('#pr-tags-error').text(response.responseJSON.errors.pr_tags);
                    }
                });
            });
        });
    </script>
@endsection
