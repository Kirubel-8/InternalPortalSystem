        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Service</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" name="url" class="form-control" required>
                            </div>
                            <!-- <div class="form-group">
                            <label>Date</label>
                            <textarea class="form-control" required></textarea>
                            </div> -->
                            <div class="form-group">
                            <img src="{{ asset('storage/' . $sys->image) }}" width="50px" height="40px" alt="Current Image">
                                <label>Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('.edit').on('click', function() {
                var sysId = $(this).data('id');
                var sysName = $(this).data('name');
                var sysDescription = $(this).data('description');
                var sysUrl = $(this).data('url');
                var sysImage = $(this).data('image');

                $('#editEmployeeModal form').attr('action', '/systems/' + sysId);
                $('#editEmployeeModal #name').val(sysName);
                $('#editEmployeeModal #description').val(sysDescription);
                $('#editEmployeeModal #url').val(sysUrl);
                $('#editEmployeeModal #image').val(sysImage);
            });
        </script>