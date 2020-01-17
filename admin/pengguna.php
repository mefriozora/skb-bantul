<?php include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='pengguna.php';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pengguna</li>
          </ol>
    <div class="page-header">
      <h4>
        Pengguna
      </h4>
    </div>
      <div class="">
        <div class="card">
          <div class="card-header">
          <a href="?&act=form_create" class="btn btn-primary" role="button">Tambah</a>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th class="w-4">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT user.id_user, user.level_id, level.level, user.nama, user.username, user.password FROM user LEFT JOIN level ON level.level_id=user.level_id");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['nama'];?></td>
                  <td><?php echo $h['username'];?></td>
                  <td><?php echo $h['level'];?></td>
                  <td class="text-right">
                    <a href='?&act=delete&id=<?php echo $h['id_user'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-secondary btn-sm"><i class="fe fe-trash"></i></a>
                  </td>
                </tr>
              <?php $no++; } ?>
              </tbody>
            </table>
            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
break;

case "form_create";
?>
    <div class="my-3 my-md-1">
    <div class="container">
    <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tambah Pengguna</li>
          </ol>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>         
          </div>
          <div class="modal-body">
            <form action="?&act=save" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label>Level</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="level" class="form-control">
                      <option selected value="">-Pilih-</option>
                      <?php
                            $querypengguna = mysqli_query($connect,"SELECT * FROM level ORDER BY level_id");
                            while ($datapengguna = mysqli_fetch_array($querypengguna)){
                                if($datapengguna['level_id']==$h['level_id']){
                                    echo "<option selected value=$datapengguna[level_id]>$datapengguna[level]</option>";
                                }else{
                                    echo "<option value=$datapengguna[level_id]>$datapengguna[level]</option>"; 
                                }
                            }
                        ?>  
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Nama</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="nama" type="text" class="form-control" onkeypress="" placeholder="Nama"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="username" type="text" class="form-control" onkeypress="" placeholder="Username"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="password" type="password" class="form-control" onkeypress="" placeholder="Password"/>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='pengguna.php';">
                Batal
                </button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>  

<?php
break;

case "save";
$nama = $_POST['nama'];
//var_dump($nama); exit();
$username = $_POST['username'];
//var_dump($username); exit();
$password= md5($_POST['password']);
$level = $_POST['level'];
//var_dump($level); exit();
//validasi 1
if (empty($nama)){ echo"<script>alert('Masukkan data nama');history.back(-1);</script>"; }
else if (empty($username)){ echo"<script>alert('Masukkan data username');history.back(-1);</script>"; }
else if (empty($password)){ echo"<script>alert('Masukkan data password');history.back(-1);</script>"; }
else if (empty($level)){ echo"<script>alert('Masukkan data level');history.back(-1);</script>"; }
else{  
  // validasi 2
  $cek_dulu=mysqli_query($connect,"select * from user where username='$username' AND password='$password'");
  $cek=mysqli_num_rows($cek_dulu);
   if($cek>0) {
   echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   }
   else {
   $input=mysqli_query($connect,"INSERT INTO `user`(`id_user`, `level_id`, `nama`, `username`, `password`) VALUES ('','$level','$nama','$username','$password')");
    //var_dump($input); exit();   
   if ($input){
        //echo "masuk";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  }
}

break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM user WHERE id_user='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

