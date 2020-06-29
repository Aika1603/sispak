    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default " >
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo site_url('login/validasi');?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" value="<?php echo set_value('username'); ?>" autofocus>
                                    <label class=""><?php echo form_error('username'); ?></label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo set_value('password'); ?>">
                                    <label class=""><?php echo form_error('password'); ?></label>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn  btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>

                    <div class="panel-footer">
                      <a href="<?php echo site_url();?>" class=""><i class="fa fa-home"></i> Kembali Ke Home </a>
                    </div>
                </div>
                <?php if($this->session->flashdata('message')):
                  echo '
                  <div class="alert alert-danger animated shake">
                    <b>'.$this->session->flashdata('message').'</b>
                  </div>
                  ';
                endif;
                  ?>
            </div>

        </div>
    </div>
