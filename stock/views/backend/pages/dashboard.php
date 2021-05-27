<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Table</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Table</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>email</th>
                        <th>fullname</th>
                        <th>mobile</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users_data as $row) {
                        echo "<tr>";
                        echo "<td>{$row->id}</td>";
                        echo "<td>{$row->username}</td>";
                        echo "<td>{$row->email}</td>";
                        echo "<td>{$row->fullname}</td>";
                        echo "<td>{$row->mobile}</td>";
                        echo "<td>{$row->status}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="ml-auto" style="width: 200px;">
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/admin_lte">Admin_LTE</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/logout">Logout</a>
        </div>
        
    </section>

</div>