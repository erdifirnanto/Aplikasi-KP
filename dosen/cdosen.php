<?php

include('koneksi.php');
$Dosen_Id               = "";
$Nama_dosen             = "";
$Nik                    = "";
$User_Id                = "";
$error                  = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $Dosen_Id         = $_GET['id'];
    $sql1       = "delete from Dosen where Dosen_Id = '$Dosen_Id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $Dosen_Id               = $_GET['id'];
    $sql1                   = "SELECT * FROM `Dosen` WHERE 1";
    $q1                     = mysqli_query($koneksi, $sql1);
    $r1                     = mysqli_fetch_array($q1);
    $Dosen_Id               = $r1['Dosen_Id'];
    $Nama_dosen             = $r1['Nama_dosen'];
    $Nik                    = $r1['Nik'];
    $User_Id                = $r1['User_Id'];


    if ($Id == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create

    $Dosen_Id               = $_POST['Dosen_Id'];
    $Nama_dosen             = $_POST['Nama_dosen'];
    $Nik                    = $_POST['Nik'];
    $User_Id                = $_POST['User_Id'];

    if ($Nama_dosen && $Nik && $User_Id) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update Dosen set Dosen_Id = '$Dosen_Id', Nama_dosen = '$Nama_dosen', Nik = '$Nik' User_Id = '$User_Id' where id = '$Dosen_Id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO `Dosen` (`Dosen_Id`, `Nama_dosen`, `Nik`, `User_Id`) VALUES (NULL, '$Nama_dosen', '$Nik', '$User_Id')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>



<div class="container">
    <a role="button" href="viewdosen.php" class="btn btn-primary">Kembali</a>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <?php
            if ($error) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php
                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=viewdosen.php">';
                exit;
            }
            ?>
            <?php
            if ($sukses) {
            ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
            <?php
                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=viewdosen.php">';
                exit;
            }
            ?>
            <!--Form Create Data-->

            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Dosen create Data</h1>
                </div>
                <form action="" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="Nama_dosen" name="Nama_dosen" type="text" class="form-control " placeholder="Nama Dosen" value="<?php echo $Nama_dosen ?>">
                        </div>
                        <div class="col-sm-6">
                            <input id="Nik" name="Nik" type="text" class="form-control " placeholder="NIP" value="<?php echo $Nik ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">

                            <select id="User_Id" name="User_Id" type="text" class="form-control " placeholder="User_Id" value="<?php echo $User_Id ?>">
                            <option>User Id</option>
                            <?php

                            require_once('koneksi.php');
                            $sqluser  = "SELECT * FROM User";
                            $d4 = mysqli_query($koneksi, $sqluser);
                            while ($datauser = mysqli_fetch_assoc($d4)) {
                            ?>
                                <option value=" <?= $datauser['Id'] ?>"><?= $datauser['Username'] ?></option>
                            <?php  } ?>
                            </select>
                        </div>
                        



                    <div class="form-group">
                        <input hidden id="Dosen_Id" name="Dosen_Id" type="text" class="form-control form-control-sm" placeholder="Id" value="<?php echo $Dosen_Id ?>">
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
            </div>
        </div>

    </div>