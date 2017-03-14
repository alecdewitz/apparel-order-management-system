<?php

function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isAdmin($user) {
    return $user['account_type'] == 1;
}

function toDollars($num){
    return "$" . number_format($num, 2, '.', ',');
}

function getUserID($user) {
    return $user['account_id'];
}

function getUserIDNumber($user) {
    return $user['id'];
}

function getHeaderPath(){
    return 'core/header.php';
}

function getFooterPath(){
    return 'core/footer.php';
}
