<div class="container ">
<section class="multi_step_form " >
  <form id="msform" action="" method="post">

  <div class="tittle">
    <h2 class="">Diagnosis Hama <i class="fa fa-bug"></i></h2>
    <p class="lead">Proses Diagnosis Selesai <a href="#" class="done_text"><i class="ion-android-done"></i></a>.
      <br/><small>Silahkan lihat hasil diagnosis Sistem Pakar Kami terhadap Hama yang menyerang tanaman kedelai Kamu </small></p>
  </div>

  <div class="container " >
  <!-- Three columns of text below the carousel -->
     <div class="row " >
      <div class="col-lg-12  " >
        <?php
          for($a=0;$a < $i; $a++){
            ?>

        <div class="card" style="margin-bottom:20px;">
          <div class="row">
            <div class="col-lg-3 align-middle" style="padding:100px 0px;background:
            <?php
            if($hasil[$a]['result'] >= 80){
              echo "#2196f3";
            }else if($hasil[$a]['result'] >= 60){
              echo "#009688";
            }else{
              echo "#808080";
            }
            ?>
            ;color:#fff;">
                <h2 style=""> Kemungkinan  : <br/><?=$hasil[$a]['result'];?> %</h2>
            </div>
            <div class="col-lg-9" style="padding:30px 40px;" >
              <h2><?=$hasil[$a]['nama_kasus'];?></h2>
              <p class="text-left">
                <?=$hasil[$a]['deskripsi'];?>
              </p>
              <div class="card-body"  >
                <a href="<?=site_url('find/solusi/'.$hasil[$a]['kode_kasus'])?>" class=" text-center action-button">Lihat Solusi <i class="fa fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php
      ;}
      ?>



      </div>
    </div>
  </div>



</section>
</div>
