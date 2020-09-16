
 <section id="container" >
      <!-- TOP BAR CONTENT & NOTIFICATIONS -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
           
            <a href="#" class="logo"><b>Website Sederhana | CRUD</b></a>
            
   
        </header>
      <!--header end-->

      <!-- MAIN SIDEBAR MENU -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
             
                  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php  echo "ADMINISTRATOR";?></h5>
				 
				 	<li class="sub-menu">
                      <?php
                      $moduleconf = @$_GET['tblconf'];
                     
                        if ($moduleconf=="produk"){
                            echo "<a class=\"active\" href=\"index.php?tblconf=produk\"><i class=\"fa fa-cogs\"></i><span>Tabel Produk</span></a>";
                           }else{
                            echo"<a href=\"index.php?tblconf=produk\"><i class=\"fa fa-cogs\"></i><span>Tabel Produk</span></a>";
                        }
					  ?>
                  </li>
				  <br>
				  <li><p align="center">Website ini dibuat dengan fungsi CRUD sederhana</p></li>
				  <li><p align="center">Dibuat Oleh Raey</p></li>

              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

					

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 - melialaraey
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

 </section>

  

  