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
    $sql1       = "delete from Pendaftaran_KP where Id = '$Id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $Id                     = $_GET['id'];
    $sql1                   = "SELECT * FROM `Pendaftaran_KP` WHERE Id = '$Id'";
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

    if ($Id && $Tempat_KP && $Alamat_KP && $Tanggal_mulai && $Tanggal_selesai && $Proposal && $Anggota_Kelompok_Id && $Dosen_Id && $Perusahaan_Id) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update Pendaftaran_KP set Id = '$Id',Tempat_KP = '$Tempat_KP', Alamat_KP = '$Alamat_KP',Tanggal_mulai = '$Tanggal_mulai' , Tanggal_selesai = '$Tanggal_selesai', Proposal = '$Proposal', Anggota_Kelompok_Id = '$Anggota_Kelompok_Id', Dosen_Id = '$Dosen_Id', Perusahaan_Id = '$Perusahaan_Id' where id = '$Id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT INTO `Pendaftaran_KP`(`Id`, `Tempat_KP`, `Alamat_KP`, `Tanggal_mulai`, `Tanggal_selesai`, `Proposal`, `Anggota_Kelompok_Id`, `Dosen_Id`, `Perusahaan_Id`) VALUES ('$Id','$Tempat_KP','$Alamat_KP','$Tanggal_mulai','$Tanggal_selesai','$Proposal','$Anggota_Kelompok_Id','$Dosen_Id','$Perusahaan_Id')";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="Id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" id="Id" name="Id" value="<?php echo $Id ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Tempat_KP" class="col-sm-2 col-form-label">Tempat_KP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Tempat_KP" name="Tempat_KP" value="<?php echo $Tempat_KP ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Alamat_KP" class="col-sm-2 col-form-label">Alamat_KP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Alamat_KP" name="Alamat_KP" value="<?php echo $Alamat_KP ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Tanggal_mulai" class="col-sm-2 col-form-label">Tanggal_mulai</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="Tanggal_mulai" name="Tanggal_mulai" value="<?php echo $Tanggal_mulai ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Tanggal_selesai" class="col-sm-2 col-form-label">Tanggal_selesai</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="Tanggal_selesai" name="Tanggal_selesai" value="<?php echo $Tanggal_selesai ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Proposal" class="col-sm-2 col-form-label">Proposal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Proposal" name="Proposal" value="<?php echo $Proposal ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Anggota_Kelompok_Id" class="col-sm-2 col-form-label">Id Anggota Kelompok</label>
                        <select class="form-select" aria-label="Default select example" id="Anggota_Kelompok_Id" name="Anggota_Kelompok_Id">
                            <option value="">.....</option>
                            <option value="1" <?php if ($Anggota_Kelompok_Id == "1") echo "selected" ?>>1</option>

                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="Dosen_Idl" class="col-sm-2 col-form-label">Id Dosen</label>
                        <select class="form-select" aria-label="Default select example" id="Dosen_Id" name="Dosen_Id">
                        
                            <option value="">.....</option>
                            <option value="1" <?php if ($Dosen_Id == "1") echo "selected" ?>>1</option>
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="Perusahaan_Id" class="col-sm-2 col-form-label">Id Perusahaan</label>
                        <select class="form-select" aria-label="Default select example" id="Perusahaan_Id" name="Perusahaan_Id">
                            <option value="">.....</option>
                            <option value="1" <?php if ($Perusahaan_Id == "1") echo "selected" ?>>1</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tempat KP</th>
                            <th scope="col">Alamat KP</th>
                            <th scope="col">Tanggal mulai</th>
                            <th scope="col">Tanggal selesai</th>
                            <th scope="col">Proposal</th>
                            <th scope="col">ID Anggota Kelompok</th>
                            <th scope="col">ID Dosen</th>
                            <th scope="col">ID Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from Pendaftaran_KP order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $Id                     = $r2['Id'];
                            $Tempat_KP              = $r2['Tempat_KP'];
                            $Alamat_KP              = $r2['Alamat_KP'];
                            $Tanggal_mulai          = $r2['Tanggal_mulai'];
                            $Tanggal_selesai        = $r2['Tanggal_selesai'];
                            $Proposal               = $r2['Proposal'];
                            $Anggota_Kelompok_Id    = $r2['Anggota_Kelompok_Id'];
                            $Dosen_Id               = $r2['Dosen_Id'];
                            $Perusahaan_Id          = $r2['Perusahaan_Id'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $Id ?></td>
                                <td scope="row"><?php echo $Tempat_KP ?></td>
                                <td scope="row"><?php echo $Alamat_KP ?></td>
                                <td scope="row"><?php echo $Tanggal_mulai ?></td>
                                <td scope="row"><?php echo $Tanggal_selesai ?></td>
                                <td scope="row"><?php echo $Proposal ?></td>
                                <td scope="row"><?php echo $Anggota_Kelompok_Id ?></td>
                                <td scope="row"><?php echo $Dosen_Id ?></td>
                                <td scope="row"><?php echo $Perusahaan_Id ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $Id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $Id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>