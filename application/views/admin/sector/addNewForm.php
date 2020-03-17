<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sectors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/admin/dashboard');?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Sector</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Sector</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('/admin/sectors/addnew');?>">
                <?php if($this->session->flashdata('error') != ''){?>
                  <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
                <?php }?>
                <div class="card-body">
                <div class="form-group">
                    <label for="parent">Parent</label>
                    <select name="parent" class="form-control" id="parent">
                      <option value="">--</option>
                      <?php foreach($parent_categories as $rec){?>
                      <option value="<?php echo $rec->category_id;?>"><?php echo $rec->title;?></option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" id="desc" name="description" placeholder="Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->          
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  