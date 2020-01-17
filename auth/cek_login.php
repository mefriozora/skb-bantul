<?php

 include '../config/connection.php';

 if (isset($_POST['login'])) {
 	$varUsername 	= $_POST['username'];
 	$varPassword	= md5($_POST['password']);

 	//proses cek database
 	$varSql		= mysqli_query($connect,"SELECT * FROM user WHERE username ='$varUsername' AND password = '$varPassword'");
 	$varResult 	= mysqli_fetch_array($varSql);
 	$varCekPswd	= $varResult['password'];

   //cek nip
 	$varCekuser	= mysqli_query($connect,"SELECT username FROM user WHERE username ='$varUsername'");
	$varResultuser 	= mysqli_fetch_array($varCekuser);
 	
	//cek nip ada atau tidak
	//kondisi jika nip kosong
 	if (empty($varResultuser)) {
 		echo "<script>
		alert('Username Anda Tidak Terdaftar');
		window.location.href='login.php';
		</script>";
	//kondisi jika nip ada maka masuk proses cek password
	}else if (isset($varResultuser)){
		//cek apakah password inputan sama dengan password database
		//konidisi jika password tidak sama 
		if ($varPassword!=$varCekPswd) {
			echo "<script>
			alert('Password Anda Salah');
			window.location.href='login.php';
			</script>";
		//kondisi jika password sama bisa login
		}else{
			$level = $varResult['level_id'];
		 	$varNama	= $varResult['nama'];

		 	session_start();
		 	//membuat session
		 	$_SESSION['nama']=$varNama;
			 $_SESSION['level']=$level;
		 	
		 	if ($level =='1' ) {
		 		echo "<script>
				alert('Login Berhasil Sebagai Admin');
				window.location.href='../admin/index.php';
				</script>";
		 		//exit();
		 		//echo "Masuk admin";
		 	}else if ($level == '2') {
		 		echo "<script>
				alert('Login Berhasil Sebagai Tutor');
				window.location.href='../admin/index.php';
				</script>";
		 		
		 	}else if ($level == '3') {
		 		echo "<script>
				alert('Login Berhasil Sebagai Siswa');
				window.location.href='../siswa/index.php';
				</script>";
		
		 }else{
		 	header('location : logout.php');
		 }
		}
 	}

//ketika belum klik tombol
}else{
	
echo "<script>window.location.href='login.php';</script>";
}
?>
