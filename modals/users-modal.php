
<!-- Add User Modal -->
<div id="add-user" class="modal fade" tabindex="-1" data-focus-on="input:first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h1 class="modal-title">Create User</h1>
    </div>
    <div class="modal-body">
        <form role="form">
            <input style="display:none" type="text" name="username"/>
            <input style="display:none" type="password" name="password"/>
            <div class="form-group">
                <label for="user_name" autocomplete="false">Username</label>
                <input type="text" class="form-control" id="user_name"/>
            </div>
            <div class="form-group">
                <label for="password" autocomplete="new-password">Password</label>
                <input type="password" class="form-control" id="password"/>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"/>
            </div>
            <div class="form-group">
                <label for="name">Type</label>
                <select class="form-control" id="type">
                    <option disabled>--Select option</option>
                    <option value="1">Admin</option>
                    <option value="2" selected>User</option>
                </select>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
        <button type="button" id="add-user-confirm" class="btn green-jungle">Add User</button>
    </div>
</div>
<!-- END Add User Modal -->


<!-- Edit User Modal -->
<div id="edit-user" class="modal fade" tabindex="-1" data-focus-on="input:first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h1 class="modal-title">Edit User: <span class="edit_username" /></h1>
    </div>
    <div class="modal-body">
        <form role="form">
            <div class="form-group">
                <label autocomplete="false">Username</label>
                <input type="text" class="form-control" id="username_edit" disabled/>
                <span class="help-block"> You cannot change usernames once they are created. </span>

            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname_edit"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email_edit"/>
            </div>
            <div class="form-group">
                <label for="name">Type</label>
                <select class="form-control" id="type_edit">
                    <option disabled>--Select option</option>
                    <option value="0">Disabled</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
        <button type="button" id="edit-user-confirm" class="btn green-jungle">Save</button>
    </div>
</div>
<!-- END Edit User Modal -->


<!-- Delete User Modal -->
<div id="delete-user" class="modal fade" tabindex="-1" data-focus-on="input:first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h1 class="modal-title">Edit User: <span class="edit_username" /></h1>
    </div>
    <div class="modal-body">
        <p>You are removing this user from <?php echo $saved_settings['company_name'] ?>. This cannot be reversed.
            All associated data with user will still be preserved and can be viewed.</p>
        <input type="hidden" id="edit_account_id" />
        <input type="hidden" id="edit_username_input" />
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cancel</button>
        <button type="button" id="delete-user-confirm" class="btn btn-danger">Yes, Delete User</button>
    </div>
</div>
<!-- END Delete User Modal -->