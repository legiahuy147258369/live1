<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    header,footer{
        background-color: red;
        width: 200px;
        height: 100px;
    }
    main{
        background-color: green;
        width: 100px;
        height: 100px;
    }
</style>
<body>
    <header>

    </header>
    <main><?php require_once "./mvc/views/pages/".$data['Pages'].".php"; ?></main>
    <?=$data['Number'];?>
    <?php foreach($data['SinhVien'] as $key){
        echo $key['hoTen'];
    } ?>
    <footer>

    </footer>
</body>
</html>