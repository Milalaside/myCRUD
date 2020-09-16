<?php 

include 'header_module.php';
include 'menu_module.php';
include 'control.php';

// MODULE USER \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Produk</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i>No</th>
                    <th><i class=\"\"></i>Nama Produk</th>
                    <th><i class=\"\"></i>Keterangan</th>
					<th><i class=\"\"></i>Harga</th>
					<th><i class=\"\"></i>Jumlah</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_produk = mysqli_query ($link, "SELECT * FROM produk ORDER BY id DESC");
while ($data_produk = mysqli_fetch_assoc($tampil_produk)) {
echo"
                  <tr>
					<td>$id_produk</td>
                    <td>$data_produk[nama_produk]</td>
                    <td>$data_produk[keterangan]</td>
					<td>$data_produk[harga]</td>
					<td>$data_produk[jumlah]</td>
                    <td>
                      <a href=\"aksi.php?aksi=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"aksi.php?aksi=edit&id=$data_produk[id]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"aksi.php?aksi=hapus&id=$data_produk[id]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                   $id_produk++;
}
				echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_produk; $i++){
                    echo"
                      <a href=\"index.php?pageconf=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
                  }
                  echo"  
                </div>";
        mysqli_close($link);                
               
               echo"
              </div><!-- /content-panel -->
          </div><!-- /col-md-12 -->
      </div><!-- /row -->
    </section>
    </section>";    



?>

