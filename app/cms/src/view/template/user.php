<h1>User</h1>

<table cellspacing="2" border="1" cellpadding="5" >
    <thead>
    <tr>
        <td>id</td>
        <td>Name</td>
        <td>Last name</td>
        <td>Action</td>
    </tr>
    </thead>
    <tr>
        <td><?php echo $data->getId(); ?></td>
        <td><?php echo $data->getFirstName(); ?></td>
        <td><?php echo $data->getLastName(); ?></td>
        <td>
            <a href="index.php?route=/User/delUser">delete</a>
        </td>
    </tr>
</table>
<?php