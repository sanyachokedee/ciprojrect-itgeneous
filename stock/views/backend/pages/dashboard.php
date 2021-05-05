<div class="container">
<h1>User Table</h1>
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
    foreach($users_data as $row){
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

<a href="<?php echo base_url();?>backend/logout">Logout</a>
</div>