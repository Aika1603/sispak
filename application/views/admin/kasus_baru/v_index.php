<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header"><i class="fa fa-users"></i> Daftar Kasus Baru Pengguna</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Tabel Daftar Kasus Baru dari Pengguna
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kode Kasus</th>
                              <th>Nama Kasus</th>
                              <th>Kode Hama</th>
                              <th>Gejala</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_kasus as $row) {
                          echo '
                          <tr class="">
                            <td>'.$no.'</td>
                            <td>'.$row->kode_kasus.'</td>
                            <td>'.$row->nama_kasus.'</td>
                            <td>'.$row->kode_hama.'</td>
                            <td><a href="'.site_url('admin/kasus_baru/detail/'.$row->id_data).'" >Lihat Gejala </a></td>
                            <td>
                              <a href="'.site_url('admin/kasus_baru/hapus/'.$row->id_data).'" title="Hapus"><i class="fa fa-trash"></i> </a>
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
