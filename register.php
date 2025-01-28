<?php

if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
    extract($errors);  # variable with values --> based on errors
}
if (isset($_GET['old'])) {
    $old_data = json_decode($_GET['old'], true);

    if (isset($old_data['firstname'])) {
        $old_firstname = $old_data['firstname'];
    }
    if (isset($old_data['lastname'])) {
        $old_lastname = $old_data['lastname'];
    }
    if (isset($old_data['username'])) {
        $old_username = $old_data['username'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-warning">Regestration</h1>
        <form action="save2file.php" method="post">

            <div class="mb-3">

                <label for="firstName" class="form-label fs-4">First Name</label>
                <input type="text" name="firstname" value="<?php echo $old_firstname ?? ''; ?>" class="
                    form-control">
                <p class="text-danger"> <?php echo $firstname ?? '' ?> </p>


                <label for=" lastName" class="form-label fs-4">Last Name</label>
                <input type="text" name="lastname" value="<?php echo $old_lastname ?? ''; ?>" class="form-control">
                <p class="text-danger"> <?php echo $lastname ?? '' ?> </p>


                <label for="username" class="form-label fs-4">User Name</label>
                <input type="text" name="username" value="<?php echo $old_username ?? ''; ?>" class="form-control">
                <p class="text-danger"> <?php echo $username ?? '' ?> </p>

                <label for="lastName" class="form-label fs-4">E-Mail</label>
                <input type="text" name="email" value="<?php echo $old_email ?? ''; ?>" class=" form-control">
                <p class="text-danger"> <?php echo $email ?? '' ?> </p>

            </div>
            <div class="col-12 row">

                <button type="submit" class="btn btn-primary col-6">Submit</button>

                <button type="reset" class="btn btn-primary col-6">Reset</button>

            </div>

        </form>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>