<!-- Delete User Modal -->
<div id="delete-order" class="modal fade" tabindex="-1" data-focus-on="input:first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h1 class="modal-title">Delete Order</h1>
    </div>
    <div class="modal-body">
        <p>You are removing this order from <?php echo $saved_settings['company_name'] ?>. This cannot be reversed.</p>

    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cancel</button>
        <a type="button" id="delete-order-confirm" class="btn btn-danger">Yes, Delete Order</a>
    </div>
</div>
<!-- END Delete User Modal -->