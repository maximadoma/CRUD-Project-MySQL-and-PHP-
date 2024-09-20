<?php
require '_functions.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Boostrap CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>

    <!-- Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <title>CRUD Project</title>

</head>

<body class="bg-dark">

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Create | Retrieve | Update | Delete
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#create">Create Fruits</button>
                    </div>
                    <div class="card-body">
                        <!-- Search Bar start -->
                        <form action="_redirect.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="fruitSearch" id="fruitSearch"
                                    placeholder="Search Here..." autofocus required>
                            </div>
                        </form>
                        <!-- Search Bar end -->

                        <!-- Table start -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <br>
                                <!-- THead start -->
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Fruit</th>
                                        <th>Quantity</th>
                                        <th>Registered</th>
                                        <th>Updated</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <!-- THead end -->

                                <!-- TBody start -->
                                <tbody>
                                    <?php
                                    //pull the method selectFruits() out of function.php to get the fruits
                                    $getFruits = selectFruits();

                                    //populate the table data by looping the array result 
                                    while ($fruit = $getFruits->fetch(PDO::FETCH_ASSOC)) {
                                        ?>

                                        <tr>
                                            <td class="text-center"><?= $fruit['fruit_id'] ?></td>
                                            <td><?= $fruit['fruit_name'] ?></td>
                                            <td><?= $fruit['fruit_qty'] ?> pc(s)</td>
                                            <td><?= date("M d, Y g:i A", strtotime($fruit['fruit_created'])) ?></td>
                                            <td><?= date("M d, Y g:i A", strtotime($fruit['fruit_updated'])) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info data-bs-toggle=" modal"
                                                    data-bs-target="#edit_">Edit</button>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger data-bs-toggle=" modal"
                                                    data-bs-target="#edit_">Delete</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                                <!-- TBody end -->
                            </table>
                        </div>
                        <!-- Table end -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Start (Create Fruits) -->
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Fruits</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="fruit_create.php" method="POST">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">Fruit Name</label>
                                <input type="text" class="form-control" name="fruitName" id="fruitName" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">Quantity</label>
                                <input type="text" class="form-control" name="fruitQty" id="fruitQty" min="0"
                                    step="0.01" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="createFruit"
                                id="createFruit">Create</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal End (Create Fruits) -->



    </div>

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>




</html>