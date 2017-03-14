<?php

function getOrderAlert()
{

    if (isset($_SESSION['created_order'])) {
        unset($_SESSION['created_order']); ?>
        <div class="alert alert-info">
            <strong>Success!</strong> The order has been added.
        </div>
        <?php
    } elseif (isset($_SESSION['order_not_found'])) {
        unset($_SESSION['order_not_found']); ?>
        <div class="alert alert-warning">
            Order number not found.
        </div>
        <?php
    } elseif (isset($_SESSION['order_deleted'])) {
        unset($_SESSION['order_deleted']); ?>
        <div class="alert alert-danger">
            <strong>Success!</strong> Order has been deleted.
        </div>
        <?php
    } elseif (isset($_SESSION['order_id_updated'])) {
        unset($_SESSION['order_id_updated']); ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Order has been updated.
        </div>
        <?php
    }

}
