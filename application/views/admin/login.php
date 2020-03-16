<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator Control Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title text-info">Administrator Login</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                    <div class="container">
                        <div id="login-row" class="row">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form id="login-form" class="form" action="<?php echo base_url('/admin/postLogin');?>" method="post">
                                        <?php if($this->session->flashdata('error') != ''){?>
                                          <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                                        <?php }?>
                                        <div class="form-group">
                                            <label for="username" class="text-info">Username:</label><br>
                                            <input type="text" name="username" id="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-info">Password:</label><br>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                        </div>
                                        <div id="register-link">
                                            <a href="#" class="text-warning font-italic">forgot password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="login-column" class="col-md-6 d-flex justify-content-center align-items-center"><i class="fas fa-user-lock text-info" style="font-size: 190px; margin-top: -60px;"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  