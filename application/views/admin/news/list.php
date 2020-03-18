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
            <form method="post" name="listform" id="listform" action="<?php echo base_url('/admin/delete/categories');?>">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of all sectors</h3>
                <a href="<?php echo base_url('/admin/sectors/new');?>" class="btn btn-sm btn-primary float-right">Add New Sector</a>
                <button type="submit" class="btn btn-sm btn-danger float-right" style="margin:0 5px;">Delete Selected</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="align-center"><input type="checkbox" name="chkall" id="chkall"></th>
                      <th style="width: 20px" class="align-center">#</th>
                      <th style="width: 15%">Title</th>
                      <th>Image</th>
                      <th style="width: 15%">Parent</th>
                      <th>Order</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Last modified</th>
                      <th style="width: 18%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(count($sectors) > 0)  {?>
                        <?php $srno = 1;
                        foreach($sectors as $row) {?>
                        <tr>
                          <td class="align-center"><input type="checkbox" name="chk[]" value="<?php echo $row->category_id;?>"></td>
                          <td class="align-center"><?php echo $srno;?>.</td>
                          <td><?php echo $row->title;?></td>
                          <td><img src="<?php echo $row->image;?>" width="50"></td>
                          <td><?php echo $row->parent;?></td>
                          <td><?php echo $row->order_by;?></td>
                          <td><?php echo $row->category_status;?></td>
                          <td><?php echo $row->created;?></td>
                          <td><?php echo $row->last_modified;?></td>
                          <td>
                            <a href="<?php echo base_url('/admin/update/category/'.$row->category_id);?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url('/admin/delete/category/'.$row->category_id);?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                            <?php if($row->status == 0) {?>
                              <a href="<?php echo base_url('/admin/active/category/'.$row->category_id);?>" class="btn btn-sm btn-warning"><i class="far fa-plus-square"></i> Active</a>
                            <?php } else {?>
                              <a href="<?php echo base_url('/admin/deactive/category/'.$row->category_id);?>" class="btn btn-sm btn-default"><i class="far fa-minus-square"></i> Deactive</a>
                            <?php }?>
                          </td>
                        </tr>
                        <?php $srno++; }?>
                    <?php }else{?>
                        <tr><td colspan="100%">No sectors added yet...</td></tr>
                    <?php }?>
                  </tbody>
                </table>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->          
            </form>
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $('#chkall').on('click', function(e){
    $('#listform').find('input[name="chk[]"]').each(function(item){
      $(this).prop('checked', e.target.checked);
    });
  });
  </script>

  