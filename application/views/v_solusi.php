<div class="container marketing " style="margin-top:30px;">
<section class="" >

  <div class="tittle text-center">
    <h2 class="">Diagnosis Hama <i class="fa fa-bug"></i></h2>
  </div>

  <!-- Three columns of text below the carousel -->
     <div class="row " style="padding:30px;">
      <div class="col-lg-7  " >
        <div class="card" >
          <div class="card-body">
            <h4 class="card-title"><?=$kasus['nama_kasus'];?></h4>
            <p> Deskripsi : <br/>
            <?=$kasus['deskripsi'];?></p>
            <p> Solusi : <br/>
            <?=$kasus['solusi'];?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-5  " >
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$kasus['nama_hama'];?></h4>
          </div>
          <img  style="max-width:420px" class="card-img-bottom" src="<?php echo  $kasus['gambar_hama'] == "" ? "" : base_url('assets/img/'.$kasus['gambar_hama']) ;?>" alt="Gambar Hama">
        </div>
      </div>
    </div>



</section>
</div>
