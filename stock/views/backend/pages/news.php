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
                        <th>Title</th>
                        <th>Body</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user_data as $row) {
                        echo "<tr>";
                        echo "<td>{$row->id}</td>";
                        echo "<td>{$row->username}</td>";
                        echo "<td>{$row->email}</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="mr-auto">
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/admin_lte">Admin_LTE</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/dashboard">dashboard</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/dashboardapi">dashboardapi</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/dashboardapi2">dashboardapi2</a>
            <a class="btn btn-success" href="<?php echo base_url(); ?>backend/logout">Logout</a>
        </div>
        
    </section>

</div>