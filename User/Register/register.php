<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Registrasi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Registrasi</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="container">
    <div class="row">

      <div class="col-md-11" style="padding:10px;">
        <form action="?page=register&aksi=simpan_register" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" autofocus="" required placeholder="Username"/>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" required placeholder="Nama Lengkap"/>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required placeholder="Email"/>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required placeholder="Password"/>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control" name="k_password" required placeholder="Konfirmasi Password"/>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jk" value="L">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki - Laki
                    </label>
                </div>

                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jk" value="P">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
			</div>

            <input type="submit" name="simpan" value="Daftar" class="btn btn-primary" style="margin-top:15px">
			<a class="btn btn-danger" href="index.php" style="margin-top:15px">Kembali</a>

        </form>
      </div>

    </div>
  </div>

</section><!-- /.content -->