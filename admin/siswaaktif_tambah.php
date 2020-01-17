<?php include_once "views/main.php";?>
<?php 
  include '../config/connection.php';
?>
<div class="my-md-1">
          <div class="container">
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Siswa Aktif</li>
          </ol>
<div class="">
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Siswa Aktif</h4>            
          </div>
          <div class="modal-body">
            <?php
                include "../config/connection.php";
                $query = mysqli_query($connect,"SELECT no_pendaftar, nama, setara_kelas FROM pendaftar WHERE no_pendaftar='".$_GET['id']."'");
                $Data  = mysqli_fetch_array($query);
            ?>

            <form action="siswaaktif_simpan.php" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>No. Pendaftar</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="no_pendaftar" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['no_pendaftar'] ?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama_siswa" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['nama'] ?> "/>
                  </div>
              </div>
              <div class="form-group">
                <label>Diterima Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                        <input name="nama_kelas" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['setara_kelas'] ?> "/>
                    </div>
              </div>
              <div class="form-group">
                <label>Kelas Sekarang</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="kelas" class="form-control">
                      <option selected value="">-Pilih Kelas-</option>
                        <?php
                        //include "../config/connection.php"; 
                            $querykelas = mysqli_query($connect,"SELECT * FROM kelas");
                            while ($datakelas = mysqli_fetch_array($querykelas)){
                        ?>
                      <option value="<?php echo $datakelas['kode_kelas'] ?>"><?php echo $datakelas['kelas'] ?>
                            <?php } ?>
                      </option>
                      
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Tahun Ajaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="thnajaran" class="form-control">
                      <option selected value="">-Pilih Tahun Ajaran-</option>
                      <?php
                        //include "../config/connection.php"; 
                            $querythnajaran = mysqli_query($connect,"SELECT * FROM tahun_ajaran");
                            while ($datathnajaran = mysqli_fetch_array($querythnajaran)){
                        ?>
                      <option value="<?php echo $datathnajaran['kode_ta'] ?>"><?php echo $datathnajaran['ta'] ?>
                            <?php } ?>
                      </option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Status</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="statussiswa" class="form-control">
                      <option selected value="">-Pilih Status-</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="btntambah" value="btntambah">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger">
                Batal
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  
    
  </body>
</html>