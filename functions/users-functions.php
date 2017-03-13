<?php

function getUsersAlert(){

    if (isset($_SESSION['deleted_account'])) {
        unset($_SESSION['deleted_account']); ?>
        <div class="alert alert-warning">
            <strong>Success!</strong> Account successfully deleted.
        </div>
        <?php
    } else if (isset($_SESSION['created_account'])) {
        unset($_SESSION['created_account']); ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Account successfully created.
        </div>
        <?php
    } else if (isset($_SESSION['edit_account'])) {
        unset($_SESSION['edit_account']);  ?>
        <div class="alert alert-info">
            <strong>Success!</strong> The account has been updated.
        </div>
        <?php
    }

}
