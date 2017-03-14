<?php

function getSettingsAlert(){

    if (isset($_SESSION['account_settings_updated'])) {
        unset($_SESSION['account_settings_updated']); ?>
        <div class="alert alert-info">
            <strong>Success!</strong> Your settings have been updated.
        </div>
        <?php
    } elseif (isset($_SESSION['order_not_found'])) {
        unset($_SESSION['order_not_found']); ?>
        <div class="alert alert-warning">
            Order number not found.
        </div>
        <?php
    } elseif (isset($_SESSION['order_id_updated'])) {
        ?>
        <div class="alert alert-info">
            <strong>Success!</strong> The order has been edited.
        </div>
        <?php
    }

}
