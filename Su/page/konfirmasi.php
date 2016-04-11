<?php 
	if(isset($_GET['transfer'])){
		$transfer = $_GET['transfer'];
		$nomer_order = $_GET['faktur'];
		echo '<p style="text-align:center;">No. Order : <b>'.$nomer_order.'</b><br>';
		echo 'Jumlah transfer : <b>Rp. '.number_format($transfer,0,",",".").'</b><p>';
		echo '<div id="frm">';
		echo '<form method="post">';
		echo '<label>Bank</label>';
		echo '<select name="bank" required>';
		echo '<option selected disabled>--Pilih Bank--</option>';
		echo '<option>BCA</option>';
		echo '<option>Mandiri</option>';
		echo '<option>BRI</option>';
		echo '<option>BNI</option>';
		echo '<option>Bank Jatim</option>';
		echo '</select>';
		echo '<label>Jumlah Uang</label>';
		echo '<input type="number" name="uang" placeholder="Jumlah yang di transfer" min="'.$transfer.'" required>';
		echo '<input type="submit" name="button" value="Konfirmasi">';
		echo '</form>';
		echo '</div>';
	}

	if(isset($_POST['button'])){
		$transfer = $_POST['uang'];
		$bank = $_POST['bank'];
		$faktur = $_GET['faktur'];
		$sql = "UPDATE tblbeli SET total = $transfer, metodepembayaran = '$bank', status = 1 WHERE faktur = '$faktur'";
		query($sql);
		echo '<script>';
		echo 'alert("Terimakasih sudah melakukan pembayaran, pembayaran akan kami konfirmasi")';
		echo '</script>';
		echo '<script>window.location.href="index.php"</script>';

	}
	
 ?>