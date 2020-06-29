

    <main role="main">
      <section id="banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <!-- <div class="carousel-item active">
              <img class="first-slide" src="<?php echo base_url();?>assets/img/person4.jpg" alt="First slide">
              <div class="container">
                <div class="carousel-caption text-left">
                  <h1><i class="fa fa-users"></i> About Us</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg  " style="color:#fff;" href="#aboutus" role="button">Check Us <i class="fa fa-external-link-alt"></i> </a></p>
                </div>
              </div>
            </div> -->
            <div class="carousel-item active">
              <img class="second-slide" src="<?php echo base_url();?>assets/img/person3.jpg" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1><i class="fa fa-list"></i> Daftar Kasus</h1>
                  <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
                  <p><a class="btn btn-lg  " style="color:#fff;" href="#list" role="button">Check Detail <i class="fa fa-external-link-alt"></i> </a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="third-slide" src="<?php echo base_url();?>assets/img/person2.jpg" alt="Third slide">
              <div class="container">
                <div class="carousel-caption text-right">
                  <h1> Diagnosis Hama <i class="fa fa-bug"></i></h1>
                  <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
                  <p><a class="btn btn-lg  " style="color:#fff;" href="#find" role="button">Temukan Sekarang <i class="fa fa-external-link-alt"></i> </a></p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>

      <div class="container marketing">
      <!-- <section id="aboutus">
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading">Hi <i class="fa fa-smile-beam"></i>. <br/><span class="text-muted">We Are Here For You.</span></h2>
              <p class="lead">Sebut saja kami <strong>SISMA</strong>SOYA. Sekelompok mahasiswa yang senang membantu Anda dan para Petani dalam merawat Tanaman Kedelai dari Serangan Hama <i class="fa fa-bug"></i>.</p>
              <p><a class="btn btn-lg btn-primary"  href="<?php echo site_url('team');?>" role="button">See Our Team <i class="fa fa-external-link-alt"></i> </a></p>
            </div>
            <div class="col-md-5">
              <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
          </div>
        </section> -->

        <section id="find">
        <hr class="featurette-divider">
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading">Diagnosis Hama. <br/>
                <small><span class="text-muted">Temukan Hama Penyerang & Selamatkan Tanaman Kedelai Anda Sekarang.</span></small></h2>
                <p><a class="btn btn-lg btn-info"  href="<?php echo site_url('find');?>" role="button">Temukan Hama <i class="fa fa-search"></i> </a></p>
            </div>
            <div class="col-md-5 order-md-1">
              <img class="featurette-image img-fluid mx-auto" style="min-height:400px;" data-src="" src="<?php echo site_url('assets/img/kedelai sehat.jpg')?>" alt="Generic placeholder image">
            </div>
          </div>
        </section>

        <section id="list">
        <hr class="featurette-divider">
          <h2 class="featurette-heading"><i class="fa fa-list"></i> Daftar Kasus <br/></h2>
          <!-- Three columns of text below the carousel -->
          <p style="margin-top:40px;">
          <div class="row">
          <?php
          foreach ($kasus as $row) {
            ?>
            <div class="col-lg-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo  $row->gambar_hama == "" ? "" : base_url('assets/img/'.$row->gambar_hama) ;?>" alt="Gambar Hama">
                <div class="card-body">
                  <h5 class="card-title"><?=$row->nama_kasus;?></h5>
                  <p class="card-text text-left"><?=$this->validasi->limit_words($row->deskripsi,30);?>...</p>
                  <a href="<?php echo site_url('find/solusi/'.$row->kode_kasus);?>" class="btn btn-primary">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <?php
          }
           ?>

          </div><!-- /.row -->
          <p class="text-center"><a class="btn btn-lg btn-info"  href="<?php echo site_url('kasus');?>" role="button">Check All Case <i class="fa fa-external-link-alt"></i> </a></p>
          </p>
        </section>
        <hr class="featurette-divider">


        <section id="help">
          <div class="row featurette">
            <div class="col-md-7" >
              <h2 class="featurette-heading">Butuh Bantuan <i class="fa fa-question"></i> <span class="text-muted"></span></h2>
              <p class="lead">Hubungi Kami, Kami akan membantu Anda sekarang juga. Dapatkan bantuan terbaik dari para mahasiswa super asik</p>
              <p class="lead">
                <i class="fa fa-mobile-alt"></i> WhatsApp  <br/>
                <a href="" style="margin-left:20px;">089648338115 </a> <br/>
                <i class="fa fa-envelope"></i> Email  <br/>
                <a href="" style="margin-left:20px;">sismasoya@gmail.com </a> <br/>
                <i class="fa fa-map-marker-alt"></i>  Address <br/>
                <a href="" style="margin-left:20px;">  Jl. HS.Ronggo Waluyo, </a> <br/>
                <a href="" style="margin-left:20px;">  Puseurjaya, Telukjambe Timur, </a> <br/>
                <a href="" style="margin-left:20px;">  Kabupaten Karawang, Jawa Barat 41361 </a> <br/>
              </p>
            </div>
            <div class="col-md-5 order-md-1">
              <iframe style="width:1400px;width:100%;height:600px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.7702383462745!2d107.3064260122553!3d-6.323923286831092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6c4c7c12678610e0!2sUniversitas+Singaperbangsa+Karawang!5e0!3m2!1sid!2sid!4v1503283864864"  frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </section>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
