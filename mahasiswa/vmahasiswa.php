<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    <p class="mb-4"> <a target="_blank" href="https://datatables.net"></a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 col-12">
            <a role="button" href="indexmahasiswa.php?op=tambahdata" value="Tambah Data" class="btn btn-primary">Tambah Data</a>
            

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th hidden scope="col">ID</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>                            
                            <th scope="col">User Id</th>
                            <th scope="col">Anggota Kelompoks</th>                           
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('koneksi.php');
                        $sql2   = "SELECT * FROM `Mahasiswa` WHERE 1 order by Id Desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        ?>
                        <?php while ($datakp = mysqli_fetch_array($q2)) { ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td hidden scope="row"><?= $datakp['Id'] ?></td>
                                <td scope="row"><?= $datakp['Nama_mahasiswa'] ?></td>
                                <td scope="row"><?= $datakp['Nim'] ?></td>
                                <td scope="row"><?= $datakp['Kelas'] ?></td>
                                <td scope="row"><?= $datakp['Email'] ?></td>
                                <td scope="row"><?= $datakp['Alamat'] ?></td>                                
                                <td hidden scope="row"><?= $datakp['Dosen_Id'] ?></td>
                                <td hidden scope="row"><?= $datakp['Perusahaan_Id'] ?></td>
                                <td scope="row"><?= $datakp['User_Id'] ?></td>
                                <td scope="row"><?= $datakp['Anggota_Kelompok_Id'] ?></td>
                                
                            
                            <td scope="row">
                                <a href="indexmahasiswa.php?op=edit&id=<?= $datakp['Id'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="indexmahasiswa.php?op=delete&id=<?= $datakp['Id'] ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                            <?php
                            }

                            ?>
                            </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->