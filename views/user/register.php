<?php
/**
 * Description of register
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
?>
<?php
if (isset($this->errors)) {
    foreach ($this->errors as $error) {
        echo $error . '<BR/>';
    }
}
?>

<form action = "<?php echo URL; ?>user/registration" method="post">
    <div class="field">
        <label for = "username"> Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
    </div>

    <div class="field">
        <label for = "password"> Password</label>
        <input type="password" name="password" id="password" value="" >
    </div>

    <div class="field">
        <label for = "password_again"> Re Password </label>
        <input type="password" name="password_again" id="password_again" value="">
    </div>

    <div class="field">
        <label for = "name"> Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>">
    </div>

    <div class="field">
        <label for = "email"> Email</label>
        <input type="email" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>" >
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value ="Register">

</form>
