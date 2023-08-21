<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM title WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $fio = mysqli_real_escape_string($con, $_POST['fio']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $job = mysqli_real_escape_string($con, $_POST['job']);

    $query = "UPDATE title SET fio='$fio', phone='$phone', job='$job' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $fio = mysqli_real_escape_string($con, $_POST['fio']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $job = mysqli_real_escape_string($con, $_POST['job']);

    $query = "INSERT INTO title (fio,phone,job) VALUES ('$fio','$phone','$job')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Created";
        header("Location: create.php");
        exit(0);
    }
}

?>