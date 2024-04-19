<?php
	$hal = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
	$limit = 5; // Jumlah data per halamannya

					
	// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
	$limit_start = ($hal - 1) * $limit;

    if (isset($_POST['cari'])) {
        $hadits = (isset($_GET['hadits']))? $_GET['hadits'] : 'musnad_ahmad';
        $cari = $_POST['id'];
        $query = "SELECT * FROM ".$hadits." WHERE id = '$cari' LIMIT ".$limit_start.",".$limit;
        $sql = $pdoh->prepare($query);
        $sql->execute();
    } else {
        $hadits = (isset($_GET['hadits']))? $_GET['hadits'] : 'musnad_ahmad';
        $query = "SELECT * FROM ".$hadits." LIMIT ".$limit_start.",".$limit;
        $sql = $pdoh->prepare($query);
        $sql->execute();

        $querytotal = "SELECT * FROM ".$hadits."";
        $sqltotal = $pdoh->prepare($querytotal);
        $sqltotal->execute();
    }

    $jml = $sqltotal->rowCount();

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
                        <?php 
                            if (isset($_POST['cari'])) {
                            
                            } else {
                                echo "<p>Total Ayat : ".$jml;
                            }
                        ?>
					</table>	
				</div>
			</div>
		</div>
			
		<ul class="pagination pagination-sm m-0 float-right">
				<!-- LINK FIRST AND PREV -->
				<?php
				if($hal == 1){ // Jika hal adalah hal ke 1, maka disable link PREV
				?>
					<li class="page-item" class="disabled"><a class="page-link" href="#">First</a></li>
					<li class="page-item" class="disabled"><a class="page-link" href="#">&laquo;</a></li>
				<?php
				}else{ // Jika hal bukan hal ke 1
					$link_prev = ($hal > 1)? $hal - 1 : 1;
				?>
					<li class="page-item"><a class="page-link" href="?page=hadits&aksi=aktif&hadits=<?php echo $_GET['hadits'];?>&hal=1">First</a></li>
					<li class="page-item"><a class="page-link" href="?page=hadits&aksi=aktif&hadits=<?php echo $_GET['hadits'];?>&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
				<?php
				}
				?>
				
				<!-- LINK NUMBER -->
				<?php
				// Buat query untuk menghitung semua jumlah data
                if (isset($_POST['cari'])) {
                    $hadits = (isset($_GET['hadits']))? $_GET['hadits'] : 'musnad_ahmad';
                    $cari = $_POST['id'];
                    $query2 = "SELECT COUNT(*) AS jumlah FROM ".$hadits." WHERE id = '$cari'";
                    $sql2 = $pdoh->prepare($query2);
                    $sql2->execute();
                } else {
                    $hadits = (isset($_GET['hadits']))? $_GET['hadits'] : 'musnad_ahmad';
                    $query2 = "SELECT COUNT(*) AS jumlah FROM ".$hadits;
                    $sql2 = $pdoh->prepare($query2);
                    $sql2->execute();
                }
				$get_jumlah = $sql2->fetch();
				
				$jumlah_hal = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
				$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah hal yang aktif
				$start_number = ($hal > $jumlah_number)? $hal - $jumlah_number : 1; // Untuk awal link number
				$end_number = ($hal < ($jumlah_hal - $jumlah_number))? $hal + $jumlah_number : $jumlah_hal; // Untuk akhir link number
				
				for($i = $start_number; $i <= $end_number; $i++){
					$link_active = ($hal == $i)? ' class="active"' : '';
				?>
					<li class="page-item" <?php echo $link_active; ?>><a  class="page-link" href="?page=hadits&aksi=aktif&hadits=<?php echo $_GET['hadits'];?>&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php
				}
				?>
				
				<!-- LINK NEXT AND LAST -->
				<?php
				// Jika hal sama dengan jumlah hal, maka disable link NEXT nya
				// Artinya hal tersebut adalah hal terakhir 
				if($hal == $jumlah_hal){ // Jika hal terakhir
				?>
					<li class="disabled"><a class="page-link" href="#">&raquo;</a></li>
					<li class="disabled"><a class="page-link" href="#">Last</a></li>
				<?php
				}else{ // Jika Bukan hal terakhir
					$link_next = ($hal < $jumlah_hal)? $hal + 1 : $jumlah_hal;
				?>
					<li class="page-item"><a class="page-link" href="?page=hadits&aksi=aktif&hadits=<?php echo $_GET['hadits'];?>&hal=<?php echo $link_next; ?>">&raquo;</a></li>
					<li class="page-item"><a class="page-link" href="?page=hadits&aksi=aktif&hadits=<?php echo $_GET['hadits'];?>&hal=<?php echo $jumlah_hal; ?>">Last</a></li>
				<?php
				}
				?>
			</ul>
	</div>
</div>
</body>
</html>