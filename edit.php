<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit</title>
</head>
<body>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Edit
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM title WHERE id='$id' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $pb = mysqli_fetch_array($query_run);
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="id" value="<?=$pb['id']; ?>">

                                <div class="mb-3">
                                    <label>FIO</label>
                                    <input type="text" name="fio" value="<?=$pb['fio'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" value="<?=$pb['phone'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Job</label>
                                    <input type="text" name="job" value="<?=$pb['job'];?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>

                            </form>
                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
