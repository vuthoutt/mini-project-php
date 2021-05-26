<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        <a href="user/view_insert" class="btn btn-primary" style="margin-top: 10px;">add</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>stt</th>
                        <th>tên tài khoản</th>
                      
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
                       while ($user = mysqli_fetch_array($data["user"])) {
                       ?> <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $user["username"]; ?></td>
                           <td><a href="javascript:confirmDelete('user/delete/<?php echo $user["id"]; ?>')" class="btn btn-danger">delete</a></td>
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

<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
</script>
