<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <form action="loai_tin/insert" method="POST">
            <div class="form-group">    
                <label for="">tên loại tin</label>
                <input type="text" name="loai_tin" class="form-control" placeholder="nhập tên loại tin">
            
            </div>
            <div class="form-group">    
                <input type="submit" name="submit" class="form-control btn btn-warning" value="Thêm">
                <a href="loai_tin" class="btn btn-primary form-control">back</a>
            </div>
          </form>
          <?php 
          if (isset($data["result"])) {
              if ($data["result"]==true) {
                  ?> 
                  <h3 class="alert alert-success">
                      <?php echo "thêm thành công"; ?>
                  </h3>
                  <?php
              }else{
                  ?> 
                  <h3 class="alert alert-warning">
                      <?php echo "thêm thất bại"; ?>
                  </h3>
                <?php
              }
          }
            ?>
        </div>
    </div>
</div>

</div>