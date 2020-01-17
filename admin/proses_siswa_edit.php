<?php
    include "../config/connection.php";

    if(isset($_POST['btnedit'])){
        $kelassekarang = $_POST['kelas'];
        $tahunajaran   = $_POST['thnajaran'];
        $statussiswa   = $_POST['statussiswa'];

        $updatesiswa = mysqli_query($connect,"UPDATE siswa SET kode_kelas='$kelassekarang', kode_ta='$tahunajaran', status_siswa='$statussiswa' WHERE id_siswa='".$_GET['id']."'");

        if($updatesiswa){
            echo "<script>alert('Data berhasil di update');document.location.href='siswaaktif.php'</script>";
        }else{
            echo "<script>alert('Data gagal di update');document.location.href='siswa_edit.php'</script>";
        }
    }
?>