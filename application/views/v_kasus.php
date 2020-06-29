
    <div class="container marketing" style="margin-top:30px;">
      <h2 class="" ><i class=" fa fa-list"></i> Daftar Kasus </h2>
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
                 <p class="card-text text-left"> <?=$this->validasi->limit_words($row->deskripsi,30);?>...</p>
                 <a href="<?php echo site_url('find/solusi/'.$row->kode_kasus);?>" class="btn btn-primary">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
               </div>
             </div>
           </div>
           <?php
         }
          ?>
       </div>
       </p>
