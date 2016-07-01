<h1>Users</h1>
<table cellspacing="2" border="1" cellpadding="5" >
    <thead>
    <tr>
        <td>id</td>
        <td>Name</td>
        <td>Last name</td>
        <td>Action</td>
    </tr>
    </thead>
    <?php
    foreach ($data as $user) {
    ?>
    <tr>
        <td><?php echo $user->id; ?></td>
        <td><?php echo $user->firstName; ?></td>
        <td><?php echo $user->lastName; ?></td>
        <td>
            <a href="index.php?route=/User/getUser/&id=<?php echo $user->id; ?>">view</a>
        </td>
    </tr>
    <?php } ?>
</table>
<ul>
    <li><a href="index.php">back</a></li>
    <li><a href="index.php?route=/User/AddUser">new</a></li>
</ul>
