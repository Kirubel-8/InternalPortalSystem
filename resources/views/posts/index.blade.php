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
</style>

<style>
    /* Responsive Table Container */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        width: 100%;
    }

    @media (max-width: 768px) {
        .table-responsive {
            margin: 15px 0;
        }
        
        .table-wrapper {
            min-width: auto;
            padding: 15px;
        }
        
        table.table {
            min-width: 600px;
        }
        
        table.table tr th, 
        table.table tr td {
            padding: 8px 10px;
            font-size: 12px;
        }
        
        .table-title .btn span {
            display: inline-block;
        }
        
        .table-title .btn i {
            font-size: 18px;
        }
    }

    @media (max-width: 480px) {
        .table-title {
            padding: 12px 15px;
        }
        
        .table-title h2 {
            font-size: 16px;
        }
        
        .table-title .btn {
            font-size: 11px;
            padding: 6px 12px;
        }
        
        .table-wrapper {
            padding: 10px;
        }
    }

    /* Fix for table header cut-off on mobile */
    .table-wrapper {
        min-width: 100%;
        overflow-x: auto;
        position: relative;
    }

    .table-title {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .table-title .row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .table-title .col-xs-6 {
        flex: 1;
    }

    .table-title .col-xs-6:last-child {
        text-align: right;
    }

    .table-title h2 {
        white-space: nowrap;
    }

    .table-title .btn {
        white-space: nowrap;
    }

    @media (max-width: 576px) {
        .table-title .row {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
        
        .table-title .col-xs-6 {
            width: 100%;
            text-align: center !important;
        }
        
        .table-title h2 {
            white-space: normal;
            font-size: 18px;
        }
        
        .table-title .btn {
            float: none;
            display: inline-block;
        }
        
        .table-wrapper {
            padding: 15px;
        }
        
        .table-title {
            padding: 12px 20px;
        }
    }
</style>

<style>
    /* Improved Modal Styles - Fully Responsive */
    .modal {
        text-align: center;
        padding: 0 !important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
        width: 90%;
        max-width: 550px;
        margin: 20px auto;
    }

    /* Large screens */
    @media (min-width: 992px) {
        .modal .modal-dialog {
            max-width: 550px;
            margin: 30px auto;
        }
        
        .modal .modal-dialog.modal-sm {
            max-width: 400px;
        }
    }

    /* Medium screens */
    @media (max-width: 991px) and (min-width: 768px) {
        .modal .modal-dialog {
            max-width: 500px;
        }
    }

    /* Small screens (tablets) */
    @media (max-width: 767px) {
        .modal .modal-dialog {
            width: 55%;
            margin: 10px auto;
        }
        
        .modal .modal-body {
            padding: 20px;
            max-height: 60vh;
            overflow-y: auto;
        }
        
        .modal .modal-header {
            padding: 15px 20px;
        }
        
        .modal .modal-header h4 {
            font-size: 16px;
        }
        
        .modal .form-group label {
            font-size: 12px;
        }
        
        .modal .form-control {
            padding: 8px 12px;
            font-size: 13px;
        }
        
        .modal-footer {
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .modal-footer button {
            flex: 1;
            min-width: 100px;
        }
    }

    /* Extra small screens (phones) */
    @media (max-width: 480px) {
        .modal .modal-dialog {
            width: 78%;
            margin: 5px auto;
        }
        
        .modal .modal-body {
            padding: 15px;
            max-height: 70vh;
        }
        
        .modal .modal-header {
            padding: 12px 15px;
        }
        
        .modal .modal-footer {
            padding: 12px 15px;
        }
        
        .modal-footer button {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .current-image-preview img {
            max-width: 100%;
            height: auto;
        }
    }

    .modal .modal-content {
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        border: none;
        overflow: hidden;
        animation: modalFadeIn 0.3s ease;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modal .modal-header {
        background: linear-gradient(135deg, #435d7d, #2c4a6e);
        color: white;
        padding: 20px 25px;
        border-bottom: none;
    }

    .modal .modal-header h4 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .modal .modal-header .close {
        color: white;
        opacity: 0.8;
        text-shadow: none;
        font-size: 24px;
        margin-top: -8px;
        transition: all 0.3s;
    }

    .modal .modal-header .close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    .modal .modal-body {
        padding: 25px;
        background: #fafbfc;
    }

    .modal .modal-footer {
        padding: 15px 25px;
        background: #fff;
        border-top: 1px solid #e9ecef;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    /* Button Styles */
    .btn-cancel {
        background: #6c757d;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
        cursor: pointer;
    }

    .btn-cancel:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108,117,125,0.3);
    }

    .btn-save, .btn-add {
        background: linear-gradient(135deg, #28a745, #218838);
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
        cursor: pointer;
    }

    .btn-save:hover, .btn-add:hover {
        background: linear-gradient(135deg, #218838, #1e7e34);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40,167,69,0.3);
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #c82333, #bd2130);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220,53,69,0.3);
    }

    .btn-edit {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: #212529;
        border: none;
        padding: 8px 25px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
        cursor: pointer;
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #e0a800, #d39e00);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255,193,7,0.3);
    }

    /* Form Group Styles */
    .modal .form-group {
        margin-bottom: 20px;
    }

    .modal .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
        font-size: 13px;
    }

    .modal .form-group label i {
        margin-right: 5px;
        color: #435d7d;
    }

    .modal .form-control {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
        font-size: 14px;
        transition: all 0.3s;
        box-shadow: none;
        width: 100%;
    }

    .modal .form-control:focus {
        border-color: #435d7d;
        box-shadow: 0 0 0 3px rgba(67,93,125,0.1);
        outline: none;
    }

    .modal textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* Current Image Preview */
    .current-image-preview {
        background: #fff;
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        margin-top: 5px;
        transition: all 0.3s;
    }

    .current-image-preview:hover {
        border-color: #435d7d;
        background: #f8f9fa;
    }

    .current-image-preview img {
        border-radius: 8px;
        max-width: 100%;
        height: auto;
        max-height: 150px;
        object-fit: contain;
    }

    /* Delete Modal Specific */
    .modal-sm .modal-dialog {
        max-width: 400px;
    }

    .delete-icon {
        font-size: 56px;
        color: #dc3545;
        margin-bottom: 15px;
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* Alert Styles */
    .alert {
        border-radius: 10px;
        padding: 12px 18px;
        border: none;
        margin-bottom: 20px;
        animation: slideDown 0.4s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    /* Small text helper */
    .text-muted {
        font-size: 11px;
        margin-top: 5px;
        display: block;
    }

    .text-danger {
        color: #dc3545;
    }

    /* Loading state for buttons */
    button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    /* Responsive table */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    @media (max-width: 768px) {
        .table-wrapper {
            min-width: auto;
            overflow-x: auto;
        }
        
        table.table {
            min-width: 600px;
        }
        .table-title {
            background: #ffffff;
            color: #333;
        }
    }
</style>

<style>
    /* Toast Notification Style - Positioned at top right */
    .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        max-width: 450px;
        padding: 15px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        animation: slideInRight 0.3s ease;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .toast-notification.success {
        background: linear-gradient(135deg, #28a745, #1e7e34);
        color: white;
        border-left: 4px solid #fff;
    }

    .toast-notification.error {
        background: linear-gradient(135deg, #dc3545, #bd2130);
        color: white;
        border-left: 4px solid #fff;
    }

    .toast-notification.warning {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: #212529;
        border-left: 4px solid #fff;
    }

    .toast-notification i {
        font-size: 20px;
    }

    .toast-notification .close-toast {
        margin-left: auto;
        cursor: pointer;
        opacity: 0.8;
        transition: opacity 0.3s;
        font-size: 18px;
    }

    .toast-notification .close-toast:hover {
        opacity: 1;
    }

    /* Remove old alert styles */
    .alert {
        display: none !important;
    }

    /* Hide default Laravel flash messages */
    .alert-success, .alert-danger, .alert-warning {
        display: none;
    }
</style>

<body>
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger" style="display: none;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <script>
            // Handle validation errors
            @if($errors->any())
                var errorMessages = [];
                @foreach($errors->all() as $error)
                    errorMessages.push('{{ $error }}');
                @endforeach
                showToast(errorMessages.join('\n'), 'error');
            @endif
        </script>

        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Manage Announcements</h2>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i> 
                                <span>Add</span>
                            </a>
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

    <!-- ADD Modal for Posts -->
    <div id="addEmployeeModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fa fa-plus-circle"></i> 
                            Post New Announcement
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><i class="fa fa-heading"></i> Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter announcement title" required>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-file-text"></i> Body <span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control" rows="5" placeholder="Enter announcement content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-image"></i> Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Supported: JPG, PNG, GIF, WEBP (Max 5MB)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" data-dismiss="modal">
                            <i class="fa fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn-add">
                            <i class="fa fa-save"></i> Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT Modal for Posts -->
    <div id="editEmployeeModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-edit mr-2"></i> Edit Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><i class="fa fa-heading mr-1"></i> Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="edit_title" class="form-control" placeholder="Enter announcement title" required>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-file-text mr-1"></i> Body <span class="text-danger">*</span></label>
                            <textarea name="body" id="edit_body" class="form-control" rows="4" placeholder="Enter announcement content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-image mr-1"></i> Current Image</label>
                            <div id="current_image_preview" class="current-image-preview"></div>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-upload mr-1"></i> New Image (Optional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                        <button type="submit" class="btn-edit"><i class="fa fa-save mr-1"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE Modal -->
    <div id="deleteEmployeeModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="background: linear-gradient(135deg, #dc3545, #c82333);">
                        <h4 class="modal-title"><i class="fa fa-trash mr-2"></i> Delete Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fa fa-exclamation-triangle" style="font-size: 48px; color: #dc3545; margin-bottom: 15px;"></i>
                        <p id="delete_message" style="font-size: 14px;">Are you sure you want to delete this announcement?</p>
                        <p class="text-warning small">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn-cancel" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                        <button type="submit" class="btn-delete"><i class="fa fa-trash mr-1"></i> Delete </button>
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

        // ==============+++++++++++++++++++=====================
        // Function to show toast notification
        function showToast(message, type = 'success') {
            // Remove existing toast
            $('.toast-notification').remove();
            
            var icon = type === 'success' ? 'fa-check-circle' : (type === 'error' ? 'fa-exclamation-circle' : 'fa-exclamation-triangle');
            var toastHtml = '<div class="toast-notification ' + type + '">' +
                '<i class="fa ' + icon + '"></i>' +
                '<span>' + message + '</span>' +
                '<span class="close-toast">&times;</span>' +
                '</div>';
            
            $('body').append(toastHtml);
            
            // Auto remove after 4 seconds
            setTimeout(function() {
                $('.toast-notification').fadeOut(300, function() {
                    $(this).remove();
                });
            }, 4000);
            
            // Close on click
            $('.close-toast').on('click', function() {
                $(this).closest('.toast-notification').fadeOut(300, function() {
                    $(this).remove();
                });
            });
        }

        // Check for flash messages on page load
        $(document).ready(function() {
            @if(session('success'))
                showToast('{{ session('success') }}', 'success');
            @endif
            
            @if(session('error'))
                showToast('{{ session('error') }}', 'error');
            @endif
            
            @if(session('warning'))
                showToast('{{ session('warning') }}', 'warning');
            @endif
        });
    </script>
@endsection