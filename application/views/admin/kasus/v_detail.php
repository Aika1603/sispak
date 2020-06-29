<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header"><i class="fa fa-list"></i> Daftar Gejala Kasus <?=$kasus->nama_kasus;?> (<?=$kasus->kode_kasus;?>)</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
        <a href="<?=site_url('admin/kasus')?>" class="btn btn-danger"> Lihat Semua Kasus </a>
        <a href="<?=site_url('admin/kasus/detail_tambah/'.$id)?>" class="btn btn-primary"> Tambah Gejala </a>
        <br/><br/>
          <div class="panel panel-default">
              <div class="panel-heading">
                  Tabel Daftar Gejala dari Kode Kasus <?=$kasus->kode_kasus;?>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kode Gejala</th>
                              <th>Nama Gejala</th>
                              <th>Daerah Serangan</th>
                              <th>Bobot Gejala</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($basis_gejala as $row) {
                          echo '
                          <tr class="">
                            <td>'.$no.'</td>
                            <td>'.$row->kode_gejala.'</td>
                            <td>'.$row->nama_gejala.'</td>
                            <td>'.$row->daerah.'</td>
                            <td>'.$row->bobot.'</td>
                              <td>
                              <a href="'.site_url('admin/kasus/detail_hapus/'.$id.'/'.$row->id).'" title="Hapus"><i class="fa fa-trash"></i> </a>
                            </td>
                          </tr>
                          ';
                          $no++;
                        }
                        ?>
                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
</div>
<?php if($this->session->flashdata('error')):?>
        <script type="text/javascript">
        $(document).ready(function() {
                $.toast({
                    heading: 'Error',
                    text: "<?php  echo $this->session->flashdata('error');?>",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                  });
                });
        </script>

    <?php elseif($this->session->flashdata('success')):?>
        <script type="text/javascript">
        $(document).ready(function() {
                $.toast({
                    heading: 'Success',
                    text: "<?php echo $this->session->flashdata('success');?>",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
              });
        </script>
<?php endif;?>
