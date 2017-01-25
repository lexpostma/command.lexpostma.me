<form action="/process_login.php" method="post" name="login_form" id="loginForm">
    <input type="text"      name="username" aria-required="true" required autocomplete="off" id="usernameField" autocorrect="off" autocapitalize="off" spellcheck="false" autofocus="" placeholder="Username" />
    <input type="password"  name="password" aria-required="true" required autocomplete="off" id="passwordField" placeholder="Password" />
    <button type="submit" onclick="formhash(this.form, this.form.password);">Log in
        <i class="fa fa-angle-right"></i>
    </button>
</form>