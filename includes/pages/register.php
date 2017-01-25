<?php
include_once '../includes/register.inc.php';
?>


        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form id="registerForm" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form">
            <input type='text' 	   name='firstname'  id='firstname'  placeholder="Firstname"/>
            <input type='text' 	   name='lastname'   id='lastname'   placeholder="Lastname"/>

            <input type='text' 	   name='twitter'    id='twitter'   placeholder="Twitter"/>
            <input type='text' 	   name='website'    id='website'   placeholder="Personal website"/>
            <input type='text' 	   name='linkedin'   id='linkedin'   placeholder="LinkedIn"/>

			<select>
				<option value="admin">Admin</option>
				<option value="writer">Writer</option>
				<option value="display">For display only</option>
			</select>

            <input type='text' 	   name='username'   id='username'   placeholder="Username"/>
            <input type="password" name="password"   id="password"	 placeholder="Password"/>
            <input type="password" name="confirmpwd" id="confirmpwd" placeholder="Confirm password"/>
                             
		    <button type="submit" onclick="return regformhash(this.form, this.form.username, this.form.password, this.form.confirmpwd);">Register
		        <i class="fa fa-angle-right"></i>
		    </button>

        </form>