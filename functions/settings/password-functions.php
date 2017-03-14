<?php

function getPasswordAlert(){

    if (isset($_SESSION['account_password_updated'])) {
        unset($_SESSION['account_password_updated']); ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Password successfully updated.
        </div>
        <?php
    } else if (isset($_SESSION['incorrect_current_password'])) {
        unset($_SESSION['incorrect_current_password']); ?>
        <div class="alert alert-danger">
            Old password incorrect.
        </div>
        <?php
    } else if (isset($_SESSION['invalid_password_verify'])) {
        unset($_SESSION['invalid_password_verify']);  ?>
        <div class="alert alert-danger">
            New passwords did not match.
        </div>
        <?php
    }

}
