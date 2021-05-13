<!-- Modal -->
<div class="modal fade text-left" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Update User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="{{ route('users.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user_id" id="ee_id">

                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="ee_name">Name</label>
                                <input type="text" class="form-control round" name="name" id="ee_name">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="ee_phone">Phone</label>
                                <input type="tel" class="form-control round" name="phone" id="ee_phone" placeholder="Enter Phone">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="e_role_id">Role</label>
                                <select class="select2 form-control" name="role_id" id="e_role_id">
                                    <option value="">Select</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="profile">Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="profile" id="e_profile">
                                    <label class="custom-file-label" for="profile">Choose file</label>
                                    <div id="e_load_add_user_profile"></div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="e_email">E-mail</label>
                                <input type="email" class="form-control round" name="email" id="ee_email">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control round" name="password" autocomplete="false" id="e_password" placeholder="Enter Password">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="password">Re-Type Password</label>
                                <input type="password" class="form-control round" name="password_confirmation" autocomplete="false" id="e_password_confirmation" placeholder="Re-Type Password">
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer pull-left">
                        <button type="submit" data-loading-text="Processing" id="save-changes" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
