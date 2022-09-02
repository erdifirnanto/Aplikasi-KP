<?php

include('koneksi.php');
$Id                     = "";
$Alamat                 = "";
$Email                  =  "";
$Kelas                  = "";
$Nama_mahasiswa         = "";
$Nim                    = "";
$Anggota_Kelompok_Id    = "";
$User_Id                = "";
$error                  = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $Id         = $_GET['id'];
    $sql1       = "delete from Mahasiswa where Id = '$Id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $Id                     = $_GET['id'];
    $sql1                   = "SELECT * FROM `Mahasiswa` WHERE 1";
    $q1                     = mysqli_query($koneksi, $sql1);
    $r1                     = mysqli_fetch_array($q1);
    $Id                     = $r1['Id'];
    $Nama_mahasiswa         = $r1['Nama_mahasiswa'];
    $Nim                    = $r1['Nim'];
    $Kelas                  = $r1['Kelas'];
    $Email                  = $r1['Email'];
    $Alamat                 = $r1['Alamat'];
    $User_Id                = $r1['User_Id'];
    $Anggota_Kelompok_Id    = $r1['Anggota_Kelompok_Id'];


    if ($Id == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create

    $Id                     = $_POST['Id'];
    $Nama_mahasiswa         = $_POST['Nama_mahasiswa'];
    $Nim                    = $_POST['Nim'];
    $Kelas                  = $_POST['Kelas'];
    $Email                  = $_POST['Email'];
    $Alamat                 = $_POST['Alamat'];
    $User_Id                = $_POST['User_Id'];
    $Anggota_Kelompok_Id    = $_POST['Anggota_Kelompok_Id'];

    if ($Nama_mahasiswa && $Nim && $Kelas && $Email && $Alamat && $User_Id && $Anggota_Kelompok_Id) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update Mahasiswa set Id = '$Id', Nama_mahasiswa = '$Nama_mahasiswa', Nim = '$Nim' , Kelas = '$Kelas', Email = '$Email', Alamat = '$Alamat', User_Id = '$User_Id' , Anggota_Kelompok_Id = '$Anggota_Kelompok_Id' where id = '$Id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO `Mahasiswa` (`Id`, `Nama_mahasiswa`, `Nim`, `Kelas`, `Email`, `Alamat`, `User_Id`, `Anggota_Kelompok_Id`) VALUES (NULL, '$Nama_mahasiswa', '$Nim', '$Kelas', '$Email', '$Alamat', '$User_Id', '$Anggota_Kelompok_Id')";
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
    <a role="button" href="viewmahasiswa.php" class="btn btn-primary">Kembali</a>

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
                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=viewmahasiswa.php">';
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
                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=viewmahasiswa.php">';
                exit;
            }
            ?>
            <!--Form Create Data-->

            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Mahasiswa Create Data</h1>
                </div>
                <form action="" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="Nama_mahasiswa" name="Nama_mahasiswa" type="text" class="form-control " placeholder="Nama Mahasiswa" value="<?php echo $Nama_mahasiswa ?>">
                        </div>
                        <div class="col-sm-6">
                            <input id="Nim" name="Nim" type="text" class="form-control " placeholder="Nim" value="<?php echo $Nim ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">

                            <input id="Kelas" name="Kelas" type="text" class="form-control " placeholder="Kelas" value="<?php echo $Kelas ?>">
                        </div>
                        <div class="col-sm-6">

                            <input id="Email" name="Email" type="text" class="form-control " placeholder="Email" value="<?php echo $Email ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="Alamat" name="Alamat" type="text" class="form-control " placeholder="Alamat" value="<?php echo $Alamat ?>">
                        </div>

                        <div class="col-sm-6">
                            <select id="Anggota_Kelompok_Id" class="form-select form-control " aria-label="Default select example" name="Anggota_Kelompok_Id">
                            <!--<option value="<?= $r1['Anggota_Kelompok_Id'] ?>">Anggota Kelompok <?= $r1['Nama_anggota'] ?></option>-->
                            <option>Anggota Kelompok</option>
                            <?php

                            require_once('koneksi.php');
                            $sqlkelompok  = "SELECT * FROM Anggota_Kelompok";
                            $d3 = mysqli_query($koneksi, $sqlkelompok);
                            while ($datakelompok = mysqli_fetch_assoc($d3)) {
                            ?>
                                <option value=" <?= $datakelompok['Anggota_Kelompok_Id'] ?>"><?= $datakelompok['Nama_anggota'] ?></option>
                            <?php  } ?>



                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select id="User_Id" name="User_Id" class="form-select form-control " aria-label="Default select example">
                            <?php

                            require_once('koneksi.php');
                            $sqluser  = "SELECT * FROM `User`";
                            $a3 = mysqli_query($koneksi, $sqluser);
                            while ($datauser = mysqli_fetch_assoc($a3)) {
                            ?>
                                <option value=" <?= $datauser['Id'] ?>"><?= $datauser['Username'] ?></option>
                            <?php  } ?>
                            </select>
                        </div>

                    </div>



                    <div class="form-group">
                        <input hidden id="Id" name="Id" type="text" class="form-control form-control-sm" placeholder="Id" value="<?php echo $Id ?>">
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
            </div>
        </div>

    </div>