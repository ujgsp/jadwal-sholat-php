<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Sholat</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Jadwal Sholat</h1>
    <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="input-group mb-3">
                    <input type="text" name="kota" id="" class="form-control" placeholder="Bandung" value="<?php if(isset($_POST['kota'])) echo $_POST['kota']; ?>">
                    
                    <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['kota'])) {
        $kota = $_POST['kota'];
        $data = file_get_contents("https://api.banghasan.com/sholat/format/json/kota/nama/$kota");
        $result = json_decode($data, true);
        /* echo "<pre>";
        print_r($result);
        echo "</pre>"; */
    
    ?>
    <div class="row">
    <!-- <h1 >Datanya disini</h1> -->
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Kota</th>
            <th scope="col">Nama Kota</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            foreach($result['kota'] as $row) {
        ?>
            <tr>
                <th scope="row"><?php echo $no;?></th>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
            </tr>
        
        <?php
            $no++;
            }	
        }
        ?>
        </tbody>
    </table>
    </div>

</div>


</body>
</html>