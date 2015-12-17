<?php
function dataPtBrParaMysql($dataPtBr) {
    $temp = explode("/", $dataPtBr);
    return "{$temp[2]}-{$temp[1]}-{$temp[0]}";
}