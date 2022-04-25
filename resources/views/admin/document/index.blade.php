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
                        <form action="{{route('new-document')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Category</label>
                                <select name="category_id" class="form-select">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">File Name</label>
                                <input type="text" class="form-control" name="file_name">
                            </div>

                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Upload File</label>
                                <input type="file" class="form-control" name="document_pdf" accept=".pdf">
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
                "ajax": "{{ url('get-documents') }}",
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
