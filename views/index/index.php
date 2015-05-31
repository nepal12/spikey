<?php
/**
 * Description of index
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
?>

<?php
if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

if ($this->loggedIn) {
    ?>


    <ul>
        <li><a href="<?php echo URL;?>user/logout.php">Log Out</a></li>
        <li><a href="update.php">Update Information</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
    </ul>
    <?php
    if ($user->hasPermission('admin')) {
        echo '<p>You are the admin</p>';
    }
} else {
    echo '<p>You need to <a href="' . URL . 'user/login">login</a> or <a href="' . URL . 'user/register">register</a>';
}



