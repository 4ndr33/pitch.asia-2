<?php
/*
  If you would like to edit this file, copy it to your current theme's directory and edit it there.
  WPUF will always look in your theme's directory first, before using this default template.
 */
?>
<div class="login" id="wpuf-login-form">
    <?php
    $message = apply_filters( 'login_message', '' );
    if ( ! empty( $message ) ) {
        echo $message . "\n";
    }
    ?>

    <?php WPUF_Login::init()->show_errors(); ?>
    <?php WPUF_Login::init()->show_messages(); ?>
</div>

<div class="ig-container">
    <div class="row">
                    <div class="col-md-6 no-padding">
                <div class="mm_login_form">
                    <div class="page-header">
                        <h3>Sign in</h3>
                    </div>
                    
		<form name="loginform" id="loginform" action="https://www.pitch.asia/login/" method="post">
			
			 <div class="form-group">
				<label for="user_login">Username</label>
				<input type="text" name="log" id="user_login" class="form-control" value="" size="20" />
			</div>
			<div class="form-group">
				<label for="user_pass">Password</label>
				<input type="password" name="pwd" id="user_pass" class="form-control" value="" size="20" />
			</div>
			
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
			<a class="pull-right" href="https://www.pitch.asia/login/?action=lostpassword">Forgot password?</a></p>
			<p class="login-submit">
				<button type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary">Sign In</button>
				<input type="hidden" name="redirect_to" value="https://www.pitch.asia/job/add-a-job/" />
			</p>
			
		</form>                </div>
            </div>
            <div class="col-md-6 no-padding">
                <div class="mm_sign_up">
                    <div class="page-header">
                        <h3>Sign Up</h3>
                    </div>
                    <p>Sign up to become a registered member of Pitch.Asia!</p>


<a href="https://www.pitch.asia/www.pitch.asia/register-expertsource/" class="button-green">&nbsp;&nbsp; Expert Register &nbsp;&nbsp;</a>&nbsp;&nbsp;<a href="https://www.pitch.asia/register-journalist/" class="button-blue">&nbsp;&nbsp; Journalist Register &nbsp;&nbsp;</a>



                </div>
            </div>
                <div class="clearfix"></div>
    </div>
</div>
