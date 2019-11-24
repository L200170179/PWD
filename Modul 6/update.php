<?php
	$conn= mysqli_connect('localhost', 'root', '','infor');
	
	$kodebuku=$_POST['Kode_buku'];
	$namabuku=$_POST['Nama_buku'];
	$submit=$_POST['submit'];
	$update="UPDATE buku set Kode_buku ='$kodebuku', Nama_buku ='$namabuku' WHERE Kode_buku ='$kodebuku' ";
	
	if($submit){
		mysqli_query($conn,$update);
		echo "
		<script>
		alert('data berhasil di update');
		document.location.href='form.php';
		</script>";
		}	
?>