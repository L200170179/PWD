<?php
	$conn= mysqli_connect('localhost', 'root', '','infor');
	
	$kodebuku = $_GET['Kode_buku'];
	$hapus="delete from buku where Kode_buku = '$Kode_buku'";
	$data=mysqli_query($conn,$hapus);
	
	if($data > 0){
		echo "
		<script>
		alert('data berhasil di hapus');
		document.location.href='form.php';
		</script>";
	}else{
		echo "
		<script>
		alert('data gagal di hapus');
		document.location.href='form.php';
        </script>";
    }
?>