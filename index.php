<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Rebrica App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            <span class="navbar-text">
                <?php 
                    if(!isset($_SESSION['userLogin'])){ ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="detail.php">
                                    <img src=<?= $_SESSION['userLogin']['image'] ?> width="30" >
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="controller.php?action=logout">Logout</a> 
                            </li>
                        </ul>
                    <?php } ?>
            </span>
            </div>
        </div>
    </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>