<div class="container " >
<section class="multi_step_form " style="padding-bottom:150px;" >
  <form id="msform" action="<?=site_url('find/result');?>" method="post">

  <div class="tittle">
    <h2 class="">Diagnosis Hama <i class="fa fa-bug"></i></h2>
    <p class="lead">Silahkan Kamu jawab pertanyaan di bawah ini yang berisi gejala-gejala, <br/> agar Sistem Kami tahu Hama apa yang menyerang tanaman kedelai Kamu</p>
    <?php if($this->session->flashdata('error')):
      echo '
      <div class="alert alert-danger animated shake">
        <b>'.$this->session->flashdata('error').'</b>
      </div>
      ';
    endif;
      ?>
  </div>

  <ul id="progressbar">
    <li class="active">Daun </li>
    <li>Batang</li>
    <li>Polong</li>
  </ul>

<fieldset>
    <h3>Gejala-gejala pada Daun</h3>
    <p>Checklist sesuai dengan gejala yang ada pada tanaman kedelai Kamu.</p>
    <div class="form-row">
      <div class="form-group col-md-12 text-left">
        <?php
          foreach ($daun as $row) {
            echo '
            <input type="checkbox" name="gejala[]" value="'.$row['kode_gejala'].'"> '.$row['nama_gejala'].'  <br />
            ';
          }
         ?>
      </div>
    </div>

    <button type="button" class="action-button previous_button">Back</button>
    <button type="button" class="next action-button">Continue</button>
  </fieldset>


  <fieldset>
    <h3>Gejala-gejala pada Batang</h3>
    <p>Checklist sesuai dengan gejala yang ada pada tanaman kedelai Kamu.</p>
    <div class="form-row">
      <div class="form-group col-md-12 text-left">
        <?php
          foreach ($batang as $row) {
            echo '
            <input type="checkbox" name="gejala[]" value="'.$row['kode_gejala'].'"> '.$row['nama_gejala'].'  <br />
            ';
          }
         ?>
      </div>
    </div>
    <button type="button" class="action-button previous previous_button">Back</button>
    <button type="button" class="next action-button">Continue</button>
  </fieldset>

  <fieldset>
    <h3>Gejala-gejala pada Polong</h3>
    <p>Checklist sesuai dengan gejala yang ada pada tanaman kedelai Kamu.</p>
    <div class="form-row">
      <div class="form-group col-md-12 text-left">
        <?php
          foreach ($polong as $row) {
            echo '
            <input type="checkbox" name="gejala[]" value="'.$row['kode_gejala'].'"> '.$row['nama_gejala'].'  <br />
            ';
          }
         ?>
      </div>
    </div>
    <button type="button" class="action-button previous previous_button">Back</button>
    <button type="submit" class="action-button">Check Result</a>
  </fieldset>
  </form>
</section>
</div>
