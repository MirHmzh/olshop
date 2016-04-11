<?php 
	$result = query("SELECT * FROM tblrating");

	$jumlah 	= mysqli_num_rows($result);
	$tampil 	= 5;
	$halaman 	= ceil($jumlah/$tampil);

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$hasil = ($page * $tampil) - $tampil;
	}else{
		$page = 0;
		$hasil = 0;
	}

	$result = query("SELECT * FROM tblrating LIMIT $hasil, $tampil");



	?>
	<div style="padding-top:20px;">
	<table border="1">
		<tr>
			<th>Id Rating</th>
			<th>Rating</th>
			<th>Id Barang</th>
			<th>E-Mail</th>
		</tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '</tr>';
	}
 ?>
 	</table>
 	</div>
 	<div class="paging">
<?php 
	if($page > 1){
		$b = $page - 1;
		echo '<a href="index.php?menu=7&page='.$b.'">Prev</a>';
	}

	for($a=1; $a<=$halaman; $a++){
		echo '<a href="index.php?menu=7&page='.$a.'">'.$a.'</a>&nbsp&nbsp&nbsp';
	}

	if($page < $halaman){
		$c = $page + 1;
		echo '<a href="index.php?menu=7&page='.$c.'">Next</a>';
	}
 ?>
 	</div>