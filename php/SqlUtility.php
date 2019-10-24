<?php

function checkDataExists($conn, $sql)
{
    $result = mysqli_query($conn, $sql);
    return (mysqli_num_rows($result) > 0);
}

function executeSql($conn, $sql)
{
    $result =  mysqli_query($conn, $sql);
    $result = mysqli_fetch_row($result);
    return $result[0];
}

function executeAllSql($conn, $sql)
{
    $result =  mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($result);
    return $result;
}

?>