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
            <h4 class="modal-title">Update Data Siswa Aktif</h4>            
          </div>
          <div class="modal-body">
            <?php
                include "../config/connection.php";
                $query = mysqli_query($connect,"SELECT id_siswa, no_pendaftar, nama, kelas_diterima, kode_kelas, kode_ta, status_siswa FROM siswa WHERE id_siswa='".$_GET['id']."'");
                $Data  = mysqli_fetch_array($query);
            ?>

            <form action="proses_siswa_edit.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data" method="post">
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
                        <input name="nama_kelas" readonly type="text" class="form-control" onkeypress="" value="<?php echo $Data['kelas_diterima'] ?> "/>
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
                            $querykelas = mysqli_query($connect,"SELECT * FROM kelas ORDER BY kode_kelas");
                            while ($datakelas = mysqli_fetch_array($querykelas)){
                                if($datakelas['kode_kelas']==$Data['kode_kelas']){
                                    echo "<option selected value=$datakelas[kode_kelas]>$datakelas[kelas]</option>";
                                }else{
                                    echo "<option value=$datakelas[kode_kelas]>$datakelas[kelas]</option>"; 
                                }
                            }
                        ?>
                            
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
                            $querythajaran = mysqli_query($connect,"SELECT * FROM tahun_ajaran ORDER BY kode_ta");
                            while ($datathajaran = mysqli_fetch_array($querythajaran)){
                                if($datathajaran['kode_ta']==$Data['kode_ta']){
                                    echo "<option selected value=$datathajaran[kode_ta]>$datathajaran[ta]</option>";
                                }else{
                                    echo "<option value=$datathajaran[kode_ta]>$datathajaran[ta]</option>"; 
                                }
                            }
                        ?>
                      </option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Status Siswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="statussiswa" class="form-control">
                      <option selected value="">-Pilih Status-</option>
                      <?php
                      if ($Data['status_siswa'] == "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
                        else echo "<option value='Aktif'>Aktif</option>";
                      if ($Data['status_siswa'] == "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
                        else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";
                      ?>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="btnedit" value="btnedit">
                  Update
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