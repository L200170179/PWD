
<html>
    <head>
        <title>Data Buku</title>
    </head>
    
	<?php
        $conn=mysqli_connect('localhost','root','','infor');
    ?>
    
	<body>
        <center>
            <h3>Masukan Data Buku :</h3>
            <table border='0' width='30%'>
                <form method='post' action='form.php'>
                    <tr>
                        <td width='25%'>Kode Buku</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type='text' name='Kode_buku' size='10'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama Buku</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type='text' name='Nama_buku' size='30'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Kode Jenis</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type="radio" value='A' name='Kode_jenis' checked>A
                        <td width='65%'><input type="radio" value='B' name='Kode_jenis'>B                        
                    </td>
                    </tr>
            </table>
                    <input type='submit' value='Masukan' name='submit'>
                </form>
               
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $kodebuku = $_POST['Kode_buku'];
        $namabuku = $_POST['Nama_buku'];
        $kodejenis = $_POST['Kode_jenis'];
        $submit = $_POST['submit'];
        $input = "insert into buku(Kode_buku, Nama_buku, Kode_jenis) values ('$kodebuku', '$namabuku', '$kodejenis')";
        if($submit){
            mysqli_query($conn, $input);
            echo "Data Berhasil dimasukkan";
        }
    ?>

    <hr>
    <h3>Data Buku</h3>
        <table border='1' width='50%'>
            <tr>
                <td align='center' width='20%'><b>Kode Buku</b></td>
                <td align='center' width='30%'><b>Nama Buku</b></td>
                <td align='center' width='10%'><b>Nama Jenis</b></td>
                <td align='center' width='30%'><b>Keterangan Jenis</b></td>
                <td colspan= 2 align='center' width='30%'><b>Keterangan</b></td>
            </tr>
           
    <?php
        $cari = "select buku.Kode_buku, buku.Nama_buku, Jenis_buku.Nama_jenis, Jenis_buku.Keterangan_jenis 
		from buku join Jenis_buku on buku.Kode_jenis = Jenis_buku.Kode_jenis";
        $hasil_cari = mysqli_query($conn,$cari);
        while ($data = mysqli_fetch_row($hasil_cari)){
        echo"
            <tr>
                <td width='20%'>$data[0]</td>
                <td width='30%'>$data[1]</td>
                <td width='10%'>$data[2]</td>
                <td width='30%'>$data[3]</td>
                <td><a href='update_form.php?Kode_buku=$data[0]'>Ubah</a></td>
                <td><a href='delete.php?Kode_buku=$data[0]'>Hapus</a></td>
            </tr>";
        }
    ?>
     
        </table>
        </center>
    </body>
</html>