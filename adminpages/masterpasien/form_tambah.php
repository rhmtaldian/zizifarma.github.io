<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$query= mysqli_query($koneksi, "select id_pasien from pasien order by id_pasien desc");

$kodePasien=mysqli_fetch_array($query);
if($kodePasien ){
  $nilai=substr($kodePasien[0], 1);
  $kode = (int) $nilai;

  $kode=$kode + 1;
  $auto_kode= "P".str_pad($kode, 3,"0", STR_PAD_LEFT);
}else{
  $auto_kode="P001";
}



include "../templates/header.php"; ?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MASTER PASIEN</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Pasien</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Pasien<span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="id_pasien" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $auto_kode;?>" readonly="readonly">
                        </div>
						
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Pasien<span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="nama_pasien" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat Pasien<span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="alamat_pasien" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">No Telfon<span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="no_telp" required="required" class="form-control col-md-7 col-xs-12">
                        </div>

                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Keluhan<span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="keluhan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
					
                        </div>
                      </div>
             
               
           
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                         <button type="submit" class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>







          </div>
        </div>
		<?php include "../templates/footer.php";

}		?>