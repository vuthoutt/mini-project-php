     <div class="container-fluid">

         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        
         <!-- DataTales Example -->
         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                 <a href="loai_tin/view_insert" class="btn btn-primary" style="margin-top: 10px;">add</a>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>stt</th>
                                 <th>tên tin</th>
                                 <th>sửa</th>
                                 <th>xóa</th>
                             </tr>
                         </thead>
                         <?php 
          if (isset($data["result"])) {
              if ($data["result"]==true) {
                  ?> 
                  <h3 class="alert alert-success">
                      <?php echo "xóa thành công"; ?>
                  </h3>
                  <?php
              }else{
                  ?> 
                  <h3 class="alert alert-warning">
                      <?php echo "xóa thất bại"; ?>
                  </h3>
                <?php
              }
          }
            ?>
                         <tbody>
                             <?php
                                $i = 1;
                                while ($loai_tin = mysqli_fetch_array($data["loai_tin"])) {
                                ?> <tr>
                                     <td><?php echo $i; ?></td>
                                     <td><?php echo $loai_tin["ten_loai"]; ?></td>
                                     
                                    <td><a href="loai_tin/edit/<?php echo $loai_tin["id"]; ?>" class="btn btn-primary">edit</a></td>
                                    <td><a href="loai_tin/delete/<?php echo $loai_tin["id"]; ?>" class="btn btn-danger">delete</a></td>
                                 </tr> <?php
                                        $i++;
                                    }
                                        ?>


                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

     </div>