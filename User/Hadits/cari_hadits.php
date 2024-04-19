<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya

					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

	$hadits = (isset($_GET['hadits']))? $_GET['hadits'] : 'musnad_ahmad';
	$cari = $_POST['id'];
	$query = "SELECT * FROM ".$hadits." WHERE id = '$cari' LIMIT ".$limit_start.",".$limit;
	$sql = $pdoh->prepare($query);
	$sql->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Hadits</title>
</head>
<body>
<div class="panel panel-default">
	<div class="panel-heading">
				<h3>
					<strong>Data Hadits</strong>
					<div class="pull-right">
						<form action="?page=hadits&aksi=cari_hadits&hadits=<?php echo $hadits;?>" method="POST">
							<div class="input-group input-group-sm">
							<input type="search" name="id" required placeholder="Cari Ayat Riwayat" style="height:30px; width:200px; box-sizing: border-box; border-radius: 4px;">
							<span class="input-group-append">
								<input type="submit" name="cari" value="Cari" class="btn btn-info btn-flat">
							</span>
							</div>
						</form>
					</div>
				</h3>
                <hr>
			</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-md-12" >
							<div class="table-responsive">
							<table id="cari" class="table table-bordered table-striped">

						<?php
							while($data = $sql->fetch()){
								?>
								<tbody>
									<tr>
										<?php echo "<p>".$data['kitab']." : ".$data['id'];?>
										<?php echo "<div align='right'><h3>".$data['arab']."</h3></div>";?>
                                        <p>Artinya : </p>
										<?php echo "<p style='text-align: justify;'>".$data['terjemah']."</div>";?>
									<hr>
									</tr>
								</tbody>
								<?php
							}
						?>	
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>