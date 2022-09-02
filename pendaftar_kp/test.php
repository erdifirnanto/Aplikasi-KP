<?php
include 'koneksi.php';
?>

<h3> Data mahasiswa</h3>

<a href="input.php">Input Data</a>
<table border="1">
<tr> 
<th>No.</th>
            <th>ID</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Anggota Kelompok</th>

</tr>


<?php
 $no = 1;
 foreach($db->tampil_data() as $user_data){
  
   echo " <tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$user_data['nama_mahasiswa']."</td>";
    var_dump($user_data['nama_mahasiswa']);
    echo "<td>".$user_data['nim']."</td>";
    echo "<td>".$user_data['kelas']."</td>";
    echo "<td>".$user_data['alamat']."</td>";
    // echo "<td>".$user_data['email']."</td>";
    echo "<td>".$user_data['anggota_kelompok_id']."</td>";
?>
    <td>
        <a href="edit.php?id=<?php echo $user_data['id']; ?>&aksi=update">Edit</a>
        <a href="proses.php?id=<?php echo $user_data['id']; ?>&aksi=hapus"
            onclick="return confirm ('Hapus Data'):">Hapus</a>
    </td>
    </tr>
<?php
 }
 ?>
</table>