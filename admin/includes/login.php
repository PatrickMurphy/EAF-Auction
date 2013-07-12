<?php
$this->user->login('');
?>
<div class="formPanel column">
    <div class="formPanelHeader">Login</div>
    <form action="index.php?page=login" method="post" style="width: 400px; margin:auto;">
        <label for="username">Username:</label><br />
        <input style="width:100%" name="username" id="username" type="text" placeholder="Username" /><br />
        <label for="password">Password:</label><br />
        <input style="width:100%" name="username" id="password" type="password" placeholder="Password" /><br />
        <input type="submit" value="Login" name="submit" class="button right" style="font-size:12pt;" />
    </form>
</div>