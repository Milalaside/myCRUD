<?php 

include 'header_module.php';
include 'menu_module.php';
include 'control.php';

$module   = @$_GET['aksi'];

if ($module == "add"){
    $nama_produk = @$_POST['nama_produk'];
    $keterangan = @$_POST['keterangan'];
	$harga = @$_POST['harga'];
	$jumlah = @$_POST['jumlah'];
	
    $tambah     = "INSERT INTO produk (nama_produk, keterangan, harga, jumlah)
                  VALUES ('$nama_produk', '$keterangan', '$harga', '$jumlah')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Produk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"aksi.php?aksi=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Produk</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"nama_produk\" oninvalid=\"alert('Nama Produk harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Keterangan</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"keterangan\" oninvalid=\"alert('Keterangan harus di isi !');\"required>
                          </div>
						  
                          <label class=\"col-sm-2 col-sm-2 control-label\">Harga</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"harga\" oninvalid=\"alert('Harga Produk harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Jumlah</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"jumlah\" oninvalid=\"alert('Jumlah harus di isi !');\"required>
                          </div>

                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"aksi.php?aksi=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Tambah</button></a>
                     </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                echo "<script language=\"javascript\">
                         alert (\"Berhasil Menambah Data Baru !!\")
                         document.location=\"index.php?tblconf=produk\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?aksi=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id = @$_GET['id'];
    $edit           = mysqli_query($link, "SELECT * FROM produk WHERE id='$id'");
    $showData  = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Produk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"aksi.php?aksi=update&id=$showData[id]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id\" value=\"$showData[id]\">

						  <label class=\"col-sm-2 col-sm-2 control-label\">Nama Produk</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"nama_produk\" value=\"$showData[nama_produk]\" oninvalid=\"alert('Nama Produk harus di isi !');\"required>
                          </div>
						  
                          <label class=\"col-sm-2 col-sm-2 control-label\">Keterangan</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"keterangan\" value=\"$showData[keterangan]\" oninvalid=\"alert('Keterangan harus di isi !');\"required>
                          </div>
						  
                          <label class=\"col-sm-2 col-sm-2 control-label\">Harga</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"harga\" value=\"$showData[harga]\" oninvalid=\"alert('Harga Produk harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Jumlah</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"jumlah\" value=\"$showData[jumlah]\" oninvalid=\"alert('Jumlah harus di isi !');\"required>
                          </div>

                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"aksi.php?aksi=edit&id=$showData[id]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
}

if ($module == "update"){
    $id  = @$_GET['id'];
    $nama_produk = @$_POST['nama_produk'];
    $keterangan = @$_POST['keterangan'];
	$harga = @$_POST['harga'];
	$jumlah = @$_POST['jumlah'];

    $update       = "UPDATE produk SET nama_produk='$nama_produk',
					 keterangan='$keterangan', harga='$harga', jumlah='$jumlah' where id='$id'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                  echo "<script language=\"javascript\">
                           alert (\"Data Produk Berhasil Diperbarui !!\")
                           document.location=\"index.php?tblconf=produk\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"aksi.php?aksi=edit&id=$showData[id]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id   = @$_GET['id'];
    $tampil        = mysqli_query($link, "SELECT * FROM produk WHERE id='$id'");
    $showData  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM produk WHERE id='$id'";
    if (mysqli_query ($link, $hapus)) {
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"index.php?tblconf=produk\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"aksi.php?aksi=edit&id=$data_produk[id]\";
              </script>";
    }
     mysqli_close($link);
}


?>


