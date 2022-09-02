<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proposal Disetujui</h1>
    <p class="mb-4"> <a target="_blank" href="https://datatables.net"></a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 col-12">
            <a role="button" href="pendaftarkp.php" class="btn btn-primary">Kembali</a>
            <input type="submit" name="simpan" value="Konfirmasi ACC" class="btn btn-primary" />
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th hidden scope="col">ID</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal mulai</th>
                            <th scope="col">Tanggal selesai</th>
                            <th scope="col">Proposal</th>
                            <th scope="col">Anggota Kelompok</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('koneksi.php');
                        $sql9   = "SELECT * FROM Disetujui INNER JOIN Perusahaan ON Disetujui.Perusahaan_Id = Perusahaan.Perusahaan_Id INNER JOIN Dosen ON Disetujui.Dosen_Id = Dosen.Dosen_Id INNER JOIN Anggota_Kelompok On Disetujui.Anggota_Kelompok_Id = Anggota_Kelompok.Anggota_Kelompok_Id ORDER BY Disetujui.Id DESC";
                        $q9     = mysqli_query($koneksi, $sql9);
                        $urut   = 1;
                        ?>
                        <?php while ($datakp = mysqli_fetch_array($q9)) { ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td hidden scope="row"><?= $datakp['Id'] ?></td>
                                <td scope="row"><?= $datakp['Tempat_KP'] ?></td>
                                <td scope="row"><?= $datakp['Alamat_KP'] ?></td>
                                <td scope="row"><?= $datakp['Tanggal_mulai'] ?></td>
                                <td scope="row"><?= $datakp['Tanggal_selesai'] ?></td>
                                <td scope="row"><?= $datakp['Proposal'] ?></td>
                                <td hidden scope="row"><?= $datakp['Anggota_Kelompok_Id'] ?></td>
                                <td hidden scope="row"><?= $datakp['Dosen_Id'] ?></td>
                                <td hidden scope="row"><?= $datakp['Perusahaan_Id'] ?></td>
                                <td scope="row"><?= $datakp['Nama_anggota'] ?></td>
                                <td scope="row"><?= $datakp['Nama_dosen'] ?></td>
                                <td scope="row"><?=$datakp['Nama_Perusahaan']?></td>
                            
                            <td scope="row">                                
                            <a><button type="button" class="btn btn-success">Disetujui</button></a>
                            <a href="cdsetuju.php?op=delete&id=<?= $datakp['Id'] ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                            
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