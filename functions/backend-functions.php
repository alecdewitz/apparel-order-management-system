<?php

function isPOST() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}