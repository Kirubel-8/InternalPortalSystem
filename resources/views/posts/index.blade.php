@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    body { color: #566787; background: #f5f5f5; font-family: 'Varela Round', sans-serif; font-size: 13px; }
    .table-responsive { margin: 30px 0; }
    .table-wrapper { min-width: 1000px; background: #fff; padding: 20px 25px; border-radius: 3px; box-shadow: 0 1px 1px rgba(0,0,0,.05); }
    .table-title { padding-bottom: 15px; background: #435d7d; color: #fff; padding: 16px 30px; margin: -20px -25px 10px; border-radius: 3px 3px 0 0; }
    .table-title h2 { margin: 5px 0 0; font-size: 24px; }
    .table-title .btn { color: #fff; float: right; font-size: 13px; border: none; min-width: 50px; border-radius: 2px; margin-left: 10px; }
    .table-title .btn i { float: left; font-size: 21px; margin-right: 5px; }
    table.table tr th, table.table tr td { border-color: #e9e9e9; padding: 12px 15px; vertical-align: middle; }
    table.table td a.edit { color: #FFC107; }
    table.table td a.delete { color: #F44336; }
    .modal .modal-dialog { max-width: 500px; }
    .modal .modal-header, .modal .modal-body, .modal .modal-footer { padding: 20px 30px; }
    .modal .modal-content { border-radius: 3px; }
    .modal .modal-footer { background: #ecf0f1; border-radius: 0 0 3px 3px; }
    .modal .form-control { border-radius: 2px; box-shadow: none; border-color: #dddddd; }
    .alert { padding: 10px; margin-bottom: 20px; border-radius: 3px; }
    .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
</style>

<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b>Announcements</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Post Announcement</span></a>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $index => $post)
                        <tr>
                            <td>{{ $posts->firstItem() + $index }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->body, 50) }}</td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" width="50px" height="50px" style="object-fit: cover;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal" 
                                   data-id="{{ $post->id }}" 
                                   data-title="{{ $post->title }}" 
                                   data-body="{{ $post->body }}" 
                                   data-image="{{ $post->image }}">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" 
                                   data-id="{{ $post->id }}" 
                                   data-title="{{ $post->title }}">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No announcements found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <!-- ADD Modal -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea name="body" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT Modal -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea name="body" id="edit_body" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Current Image</label>
                            <div id="current_image_preview"></div>
                        </div>
                        <div class="form-group">
                            <label>New Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE Modal -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p id="delete_message">Are you sure you want to delete this record?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // Edit button click
            $('.edit').on('click', function() {
                var postId = $(this).data('id');
                var postTitle = $(this).data('title');
                var postBody = $(this).data('body');
                var postImage = $(this).data('image');

                // Fix the URL - use the admin prefix from current URL
                var pathParts = window.location.pathname.split('/');
                var adminPrefix = pathParts[1];
                
                // Set form action with admin prefix
                $('#editForm').attr('action', '/' + adminPrefix + '/posts/' + postId);
                $('#edit_title').val(postTitle);
                $('#edit_body').val(postBody);
                
                if (postImage) {
                    $('#current_image_preview').html('<img src="/storage/' + postImage + '" width="100" height="80" class="img-thumbnail">');
                } else {
                    $('#current_image_preview').html('<span class="text-muted">No image uploaded</span>');
                }
            });

            // Delete button click
            $('.delete').on('click', function() {
                var postId = $(this).data('id');
                var postTitle = $(this).data('title');
                
                var pathParts = window.location.pathname.split('/');
                var adminPrefix = pathParts[1];
                
                $('#deleteForm').attr('action', '/' + adminPrefix + '/posts/' + postId);
                $('#delete_message').html('Are you sure you want to delete the announcement <strong>"' + postTitle + '"</strong>?');
            });
        });
    </script>
@endsection