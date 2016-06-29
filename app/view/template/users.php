<table>
    <?php
    foreach ($data as $user) {
    ?>
    <tr>
        <td><?php echo $user['idUser']; ?></td>
        <td><?php echo $user['firstName']; ?></td>
        <td><?php echo $user['lastName']; ?></td>
    </tr>
    <?php } ?>
</table>
<a href="index.php">back</a>
