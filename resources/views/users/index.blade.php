@extends('layouts.master')

@section('page-title', 'Manage Users')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    /* Your existing styles remain the same */
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }

    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn-group {
        float: right;
    }

    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 150px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    /* Toggle Switch Styles */
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 24px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked + .toggle-slider {
        background-color: #4CAF50;
    }

    input:checked + .toggle-slider:before {
        transform: translateX(26px);
    }

    input:disabled + .toggle-slider {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Status Badge */
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }

    .status-active {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .status-inactive {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .verified-badge {
        background: #d4edda;
        color: #155724;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 500;
        display: inline-block;
    }

    .unverified-badge {
        background: #fff3cd;
        color: #856404;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 500;
        display: inline-block;
    }

    .action-icons i {
        font-size: 19px;
        margin: 0 5px;
        cursor: pointer;
        transition: opacity 0.3s;
    }

    .action-icons i:hover {
        opacity: 0.7;
    }

    .delete {
        color: #F44336;
    }
    
    /* Alert styles */
    .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 350px;
        border-radius: 8px;
        padding: 15px 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        animation: slideInRight 0.3s ease;
        border: none;
    }
    
    .alert-success-custom {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border-left: 4px solid #28a745;
    }
    
    .alert-danger-custom {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        border-left: 4px solid #dc3545;
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
    
    @keyframes progressBar {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
    
    .pagination {
        float: right;
        margin: 0;
    }
    
    .pagination li a, .pagination li span {
        border-radius: 3px !important;
        margin: 0 2px;
    }
</style>

<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Manage <b>Users</b></h2>
                    </div>
                    <div class="col-xs-6">
                        <span class="btn btn-info" style="float: right;">
                            <i class="material-icons">people</i> 
                            <span>Total: {{ $users->total() }}</span>
                        </span>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Verification</th>
                        <th>Status</th>
                        <th>Registered Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr id="user-row-{{ $user->id }}">
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td>
                            <strong>{{ $user->name }}</strong>
                            @if($user->id === auth()->id())
                                <span class="verified-badge" style="background: #17a2b8; color: white; margin-left: 5px;">You</span>
                            @endif
                         </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->email_verified_at)
                                <span class="verified-badge">
                                    <i class="fa fa-check-circle"></i> Verified
                                </span>
                                <br>
                                <small>{{ $user->email_verified_at->format('Y-m-d') }}</small>
                            @else
                                <span class="unverified-badge">
                                    <i class="fa fa-clock-o"></i> Unverified
                                </span>
                            @endif
                         </td>
                        <td>
                            @if($user->id === auth()->id())
                                <span class="status-badge status-active">
                                    <i class="fa fa-circle"></i> Active (You)
                                </span>
                            @else
                                <label class="toggle-switch">
                                    <input type="checkbox" class="status-toggle" data-id="{{ $user->id }}" 
                                           {{ $user->is_active ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                                <span class="status-text" id="status-text-{{ $user->id }}" style="margin-left: 10px; font-size: 12px;">
                                    {{ $user->is_active ? 'Active' : 'Deactivated' }}
                                </span>
                            @endif
                         </td>
                        <td>
                            <small>{{ $user->created_at->format('M d, Y') }}</small>
                            <br>
                            <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                         </td>
                        <td class="action-icons">
                            @if($user->id !== auth()->id())
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" 
                                   data-id="{{ $user->id }}" 
                                   data-name="{{ $user->name }}">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            @else
                                <span class="text-muted">Cannot modify</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No users found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $users->firstItem() }}</b> to <b>{{ $users->lastItem() }}</b> of <b>{{ $users->total() }}</b> entries</div>
                <ul class="pagination">
                    {{ $users->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="delete_message">Are you sure you want to delete this user?</p>
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

<script>
$(document).ready(function() {
    // Get the admin prefix from the current URL
    var pathParts = window.location.pathname.split('/');
    var adminPrefix = pathParts[1];
    
    // Function to show alert with 8 seconds duration (much slower)
    window.showAlert = function(type, message, duration = 3000) {
        // Remove any existing alerts
        $('.custom-alert').remove();
        
        var icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        var alertClass = type === 'success' ? 'alert-success-custom' : 'alert-danger-custom';
        
        var alertHtml = '<div class="custom-alert ' + alertClass + '">' +
            '<div style="display: flex; align-items: center;">' +
            '<i class="fa ' + icon + '" style="font-size: 20px; margin-right: 12px;"></i>' +
            '<div style="flex: 1; font-size: 14px;">' + message + '</div>' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left: 15px; color: inherit;">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '</div>' +
            '<div style="height: 3px; background: ' + (type === 'success' ? '#28a745' : '#dc3545') + '; width: 100%; position: absolute; bottom: 0; left: 0; animation: progressBar ' + (duration/1000) + 's linear forwards;"></div>' +
            '</div>';
        
        $('body').append(alertHtml);
        
        // Auto remove after duration
        setTimeout(function() {
            $('.custom-alert').fadeOut(500, function() {
                $(this).remove();
            });
        }, duration);
    };
    
    // Toggle Status with AJAX
    $('.status-toggle').on('change', function() {
        var checkbox = $(this);
        var userId = checkbox.data('id');
        var isChecked = checkbox.is(':checked');
        var statusText = $('#status-text-' + userId);
        var originalState = isChecked;
        var toggleUrl = '/' + adminPrefix + '/users/' + userId + '/toggle-status';
        
        $.ajax({
            url: toggleUrl,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'POST'
            },
            beforeSend: function() {
                checkbox.prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    statusText.text(response.status === 'active' ? 'Active' : 'Deactivated');
                    statusText.css('color', response.status === 'active' ? 'green' : 'red');
                    showAlert('success', response.message, 3000);
                }
                checkbox.prop('disabled', false);
            },
            error: function(xhr) {
                checkbox.prop('checked', originalState);
                checkbox.prop('disabled', false);
                var errorMsg = xhr.responseJSON?.error || 'An error occurred. Please try again.';
                showAlert('danger', errorMsg, 3000);
            }
        });
    });
    
    // Delete button click
    $('.delete').on('click', function() {
        var userId = $(this).data('id');
        var userName = $(this).data('name');
        var deleteUrl = '/' + adminPrefix + '/users/' + userId;
        
        $('#deleteForm').attr('action', deleteUrl);
        $('#delete_message').html('Are you sure you want to delete user <strong>"' + userName + '"</strong>?');
    });
    
    // Handle delete form submission
    $('#deleteForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var userName = $('#delete_message').find('strong').text().replace(/"/g, '');
        var rowId = url.split('/').pop();
        
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                $('#deleteEmployeeModal').modal('hide');
                
                // Remove the row from table
                $('#user-row-' + rowId).fadeOut(500, function() {
                    $(this).remove();
                    
                    // Update the counter
                    var newTotal = $('.table tbody tr:visible').length;
                    $('.btn-info span').text(newTotal);
                    
                    // Renumber the remaining rows
                    $('.table tbody tr:visible').each(function(index) {
                        $(this).find('td:first').text(index + 1);
                    });
                });
                
                showAlert('success', 'User ' + userName + ' deleted successfully!', 3000);
            },
            error: function(xhr) {
                $('#deleteEmployeeModal').modal('hide');
                var errorMsg = xhr.responseJSON?.message || 'Error deleting user';
                showAlert('danger', errorMsg, 3000);
            }
        });
    });
    
    // Show any flash messages
    @if(session('success'))
        showAlert('success', '{{ session('success') }}', 3000);
    @endif
    
    @if(session('error'))
        showAlert('danger', '{{ session('error') }}', 3000);
    @endif
});
</script>
@endsection