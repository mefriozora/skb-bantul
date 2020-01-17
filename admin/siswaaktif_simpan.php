<?php
    include "../config/connection.php";
    if(isset($_POST['btntambah'])){
        $nopendaftar    = $_POST['no_pendaftar'];
        $siswa          = $_POST['nama_siswa'];
        $kelasditerima  = $_POST['nama_kelas'];
        $kelassekarang  = $_POST['kelas'];
        $tahunajaran    = $_POST['thnajaran'];
        $statussiswa    = $_POST['statussiswa'];

        $querysiswa = mysqli_query($connect,"INSERT INTO siswa(id_siswa,no_pendaftar,nama,kelas_diterima,kode_kelas,kode_ta,status_siswa) VALUES ('','$nopendaftar','$siswa','$kelasditerima','$kelassekarang','$tahunajaran','$statussiswa')");

        if($querysiswa){
            echo"<script>alert('Siswa Aktif Berhasil ditambahkan');document.location.href='siswaaktif.php'</script>";
        }else{
            echo"<script>alert('Siswa Aktif Gagal ditambahkan');document.location.href='siswaaktif_tambah.php'</script>";
        }
    }
?>