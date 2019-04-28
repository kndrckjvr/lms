    <!-- <form onsubmit="return false" method="post"> -->
    <form action="<?= base_url("loginapi/logincheck") ?>" method="post">
        Username
        <input type="text" name="username" id="username">
        Password
        <input type="password" name="password" id="password">
        <input type="submit" value="Login" id="login-button">
    </form>