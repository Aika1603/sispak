<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header"><i class="fa fa-bug"></i> Data Hama</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <form method="post" action="<?=site_url('admin/hama/tambah_action')?>">
  <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Gambar Hama</label><br/>
          <div id="img-foto"  ></div><br/>
          <input type="file" class="form-control" name="file" id="file"  required>
          <input type="hidden" class="form-control" name="gambar_hama" id="gambar"  required value="">
          <?php echo form_error('file'); ?>
        </div>
      </div>
      <div class="col-lg-8">
          <div class="form-group">
            <label for="">Kode Hama</label>
            <input type="text" name="kode_hama" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Nama Hama</label>
            <input type="text" name="nama_hama" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Nama Latin</label>
            <input type="text" name="nama_latin" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="">Ordo</label>
            <input type="text" name="ordo" class="form-control" id="" placeholder="" required>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
          </div>
        </form>
      </div>
  </div>
  </div>
  <script  type="text/javascript">
  //===========================DOM ready document START================================

  		$(document).ready(function() {


  			var interval;
  			function applyAjaxFileUpload(element) {
  				$(element).AjaxFileUpload({
  					action: "<?=base_url()?>ajax/upload",
  					onChange: function(filename) {
  						// Create a span element to notify the user of an upload in progress
  						var $span = $("<span />")
  							.attr("class", $(this).attr("id"))
  							.text("Uploading")
  							.insertAfter($(this));

  						$(this).remove();

  						interval = window.setInterval(function() {
  							var text = $span.text();
  							if (text.length < 13) {
  								$span.text(text + ".");
  							} else {
  								$span.text("Uploading");
  							}
  						}, 200);
  					},
  					onSubmit: function(filename) {
  						return true;
  					},
  					onComplete: function(filename, response) {
  						window.clearInterval(interval);
  						var $span = $("span." + $(this).attr("id")).text(filename + " "),
  							$fileInput = $("<input />")
  								.attr({
                    type: "file",
  									required: "",
  									name: $(this).attr("name"),
  									id: $(this).attr("id")
  								});
              $('#gambar').val(response.name);
              $("#img-foto").replaceWith(
  							$("<img />").attr("id", "img-foto").attr("src", '<?php echo base_url()."assets/img/";?>'+response.name).attr("style", "max-height:300px;max-width:200px;border-radius:10px;border:2px solid #438EB9;")
  						);
  						if (typeof(response.error) === "string") {
  							$span.replaceWith($fileInput);

  							applyAjaxFileUpload($fileInput);
                $("#img-foto").replaceWith(
                  $("<div />").attr("id", "img-foto")
                );
                swal({
                  type: 'error',
                  title: response.error,
                });
  							return;
  						}

  						$("<a />")
  							.attr("href", "#")
  							.text("ganti foto (x)")
  							.bind("click", function(e) {
  								$span.replaceWith($fileInput);

                  applyAjaxFileUpload($fileInput);

                  $("#img-foto").replaceWith(
      							$("<div />").attr("id", "img-foto")
      						);

                  $('#gambar').val('');

  							})
  							.appendTo($span);
  					}
  				});
  			}

  			applyAjaxFileUpload("#file");
  		});

  //===========================DOM ready document END================================
  </script>
