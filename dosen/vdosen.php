<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dosen</h1>
    <p class="mb-4"> <a target="_blank" href="https://datatables.net"></a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 col-12">
            <a role="button" href="createdosen.php?op=tambahdata" value="Tambah Data" class="btn btn-primary">Tambah Data</a>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th hidden scope="col">ID</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">NIP</th>
                            <th scope="col">User ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('koneksi.php');
                        $sql2   = "SELECT * FROM `Dosen` WHERE 1 Order by dosen_id DESC";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        ?>
                        <?php while ($datakp = mysqli_fetch_array($q2)) { ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td hidden scope="row"><?= $datakp['Dosen_Id'] ?></td>
                                <td scope="row"><?= $datakp['Nama_dosen'] ?></td>
                                <td scope="row"><?= $datakp['Nik'] ?></td>

                                <td scope="row"><?= $datakp['User_Id'] ?></td>



                                <td scope="row">
                                    <a href="createdosen.php?op=edit&id=<?= $datakp['Dosen_Id'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="createdosen.php?op=delete&id=<?= $datakp['Dosen_Id'] ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
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