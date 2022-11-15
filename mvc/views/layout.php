<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three Guys - Fast Food</title>
    <base href="http://localhost/live/home">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body id="body">
    <div class="container-fluid p-0">
        <?php require_once "./mvc/views/blocks/header.php"; 
        ?>
        <div class="wrap">
            <div class="container-fluid p-0 slide">
            <?php require_once "./mvc/views/pages/".$data['Pages'].".php";
            ?>
            </div>
        </div>
        <?php require_once "./mvc/views/blocks/footer.php";
        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

<script src="./public/js/js.js"></script>
</html>