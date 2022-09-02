<?php
include('koneksi.php');
$Id                     = "";
$Tempat_KP              = "";
$Alamat_KP              = "";
$Tanggal_mulai          = "";
$Tanggal_selesai        = "";
$Proposal               = "";
$Anggota_Kelompok_Id    = "";
$Dosen_Id               = "";
$Perusahaan_Id          = "";
$error                  = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $Id         = $_GET['id'];
    $sql1       = "delete from Disetujui where Id = '$Id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $Id                     = $_GET['id'];
    $sql1                   = "SELECT * FROM Pendaftaran_KP INNER JOIN Perusahaan ON Pendaftaran_KP.Perusahaan_Id = Perusahaan.Perusahaan_Id INNER JOIN Dosen ON Pendaftaran_KP.Dosen_Id = Dosen.Dosen_Id INNER JOIN Anggota_Kelompok On Pendaftaran_KP.Anggota_Kelompok_Id = Anggota_Kelompok.Anggota_Kelompok_Id ORDER BY Pendaftaran_KP.Id DESC";
    $q1                     = mysqli_query($koneksi, $sql1);
    $r1                     = mysqli_fetch_array($q1);
    $Id                     = $r1['Id'];
    $Tempat_KP              = $r1['Tempat_KP'];
    $Alamat_KP              = $r1['Alamat_KP'];
    $Tanggal_mulai          = $r1['Tanggal_mulai'];
    $Tanggal_selesai        = $r1['Tanggal_selesai'];
    $Proposal               = $r1['Proposal'];
    $Anggota_Kelompok_Id    = $r1['Anggota_Kelompok_Id'];
    $Dosen_Id               = $r1['Dosen_Id'];
    $Perusahaan_Id          = $r1['Perusahaan_Id'];

    if ($Id == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create

    $Id                     = $_POST['Id'];
    $Tempat_KP              = $_POST['Tempat_KP'];
    $Alamat_KP              = $_POST['Alamat_KP'];
    $Tanggal_mulai          = $_POST['Tanggal_mulai'];
    $Tanggal_selesai        = $_POST['Tanggal_selesai'];
    $Proposal               = $_POST['Proposal'];
    $Anggota_Kelompok_Id    = $_POST['Anggota_Kelompok_Id'];
    $Dosen_Id               = $_POST['Dosen_Id'];
    $Perusahaan_Id          = $_POST['Perusahaan_Id'];

    if ($Tempat_KP && $Alamat_KP && $Tanggal_mulai && $Tanggal_selesai && $Proposal && $Anggota_Kelompok_Id && $Dosen_Id && $Perusahaan_Id) {
        if ($op == 'edit') { //untuk update
            $sql1       = "INSERT INTO `Disetujui`(`Id`, `Tempat_KP`, `Alamat_KP`, `Tanggal_mulai`, `Tanggal_selesai`, `Proposal`, `Anggota_Kelompok_Id`, `Dosen_Id`, `Perusahaan_Id`) VALUES (NULL,'$Tempat_KP','$Alamat_KP','$Tanggal_mulai','$Tanggal_selesai','$Proposal','$Anggota_Kelompok_Id','$Dosen_Id','$Perusahaan_Id')";
            $q1         = mysqli_query($koneksi, $sql1);
            $sql99       = "delete from Pendaftaran_KP where Id = '$Id'";
            $q99         = mysqli_query($koneksi, $sql99);
            if ($q1 && $q99) {
                $sukses = "Data berhasil Di ACC";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $nama     = $_FILES['Proposal'];
            $file_tmp = $_FILES['Proposal'];
            move_uploaded_file($file_tmp, 'admin');
            $sql1   = "INSERT INTO `Disetujui`(`Id`, `Tempat_KP`, `Alamat_KP`, `Tanggal_mulai`, `Tanggal_selesai`, `Proposal`, `Anggota_Kelompok_Id`, `Dosen_Id`, `Perusahaan_Id`) VALUES (NULL,'$Tempat_KP','$Alamat_KP','$Tanggal_mulai','$Tanggal_selesai','$Proposal','$Anggota_Kelompok_Id','$Dosen_Id','$Perusahaan_Id')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil Disetujui";
            } else {
                $error      = "Gagal Disetujui";
            }
        }
    } else {
        $error = "Silakan Pilih Data di Pendaftar KP";
    }
}
?>



<div class="container">


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
                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=cdsetuju.php">';
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
                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=cdsetuju.php">';
                exit;
            }
            ?>
            <!--Form Create Data-->

            <div hidden class="p-5">
                
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Apakah Data Tersebut Benar?</h1>
                </div>
                <form action="" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="Proposal" name="Proposal" type="text" class="form-control " placeholder="Proposal" value="<?php echo $Proposal ?>" <?= $Proposal ?>>
                        </div>
                        <div class="col-sm-6">
                            <input id="Tempat_KP" name="Tempat_KP" type="text" class="form-control " placeholder="Tempat" value="<?php echo $Tempat_KP ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6 class="col-sm-7" aria-label="Default select example">Tanggal Mulai</h6>
                            <input id="Tanggal_mulai" name="Tanggal_mulai" type="datetime-local" class="form-control " placeholder="Tanggal Mulai" value="<?php echo $Tanggal_mulai ?>">
                        </div>
                        <div class="col-sm-6">
                            <h6 class="col-sm-7" aria-label="Default select example">Tanggal Selesai</h6>
                            <input id="Tanggal_selesai" name="Tanggal_selesai" type="datetime-local" class="form-control " placeholder="Tanggal Selesai" value="<?php echo $Tanggal_selesai ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input id="Alamat_KP" name="Alamat_KP" type="text" class="form-control " placeholder="Alamat" value="<?php echo $Alamat_KP ?>">
                        </div>

                        <div class="col-sm-6">
                            <select id="Anggota_Kelompok_Id" class="form-select form-control " aria-label="Default select example" name="Anggota_Kelompok_Id">
                                <option value="<?php echo $Anggota_Kelompok_Id ?>"><?php echo $Anggota_Kelompok_Id ?></option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select id="Dosen_Id" class="form-select form-control form-control-user" aria-label="Default select example" name="Dosen_Id">
                                <option selected-value="<?php echo $Dosen_Id ?>"><?php echo $Dosen_Id ?></option>-->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select id="Perusahaan_Id" class="form-select form-control form-control-user" aria-label="Default select example" name="Perusahaan_Id">
                                <option value="<?php echo $Perusahaan_Id ?>"><?php echo $Perusahaan_Id ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input hidden id="Id" name="Id" type="text" class="form-control form-control-sm" placeholder="Id" value="<?php echo $Id ?>">
                    </div>

                    <div class="col-12">
                    <input type="submit" name="simpan" value="Konfirmasi ACC" class="btn btn-primary" />
                    </div>
            </div>
        </div>
        </div>