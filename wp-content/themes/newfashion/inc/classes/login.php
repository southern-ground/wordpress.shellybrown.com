<?php 
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
class Newfashion_UserLogin{

	/**
	 * @var boolean $ispopup 
	 */
	private $ispopup = true; 

	/**
	 * Constructor 
	 */
	public function __construct(){
 
		add_action('init', array($this,'setup'), 1000);
		add_action( 'wp_ajax_nopriv_wpoajaxlogin',  array($this,'ajaxDoLogin') );
		add_action( 'wp_ajax_nopriv_wpoajaxlostpass',  array($this,'doForgotPassword') );

	}


	/**
	 * process login function with ajax request
	 *
 	 * ouput Json Data with messsage and login status
	 */
	public function ajaxDoLogin(){
		// First check the nonce, if it fails the function will break
   		check_ajax_referer( 'ajax-wpo-login-nonce', 'security-li' );
   		$result = $this->doLogin($_POST['wpo_username'], $_POST['wpo_password'],  isset($_POST['remember']) ); 
   		
   		echo trim($result);
   		die();
	}


	/**
	 * process user login with username/password
	 *
	 * return Json Data with messsage and login status
	 */
	public function doLogin( $username, $password, $remember=false ){
		$info = array();
   		
   		$info['user_login'] = $username;
	    $info['user_password'] = $password;
	    $info['remember'] = $remember;
		
		$user_signon = wp_signon( $info, false );
	    if ( is_wp_error($user_signon) ){
			return json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password. Please try again!!!', 'newfashion')));
	    } else {
			wp_set_current_user($user_signon->ID); 
	        return json_encode(array('loggedin'=>true, 'message'=>__('Signin successful, redirecting...', 'newfashion')));
	    }
	}


	/**
	 * process user doForgotPassword with username/password
	 *
	 * return Json Data with messsage and login status
	 */	
	public function doForgotPassword(){
	 
		// First check the nonce, if it fails the function will break
	    check_ajax_referer( 'ajax-wpo-lostpassword-nonce', 'security-fwp' );
		
		global $wpdb;
		
		$account = $_POST['user_login'];
		
		if( empty( $account ) ) {
			$error = __( 'Enter an username or e-mail address.', 'newfashion' );
		} else {
			if(is_email( $account )) {
				if( email_exists($account) ) 
					$get_by = 'email';
				else	
					$error = __( 'There is no user registered with that email address.', 'newfashion' );			
			}
			else if (validate_username( $account )) {
				if( username_exists($account) ) 
					$get_by = 'login';
				else	
					$error = __( 'There is no user registered with that username.', 'newfashion' );				
			}
			else
				$error = __(  'Invalid username or e-mail address.', 'newfashion' );		
		}	
		
		if(empty ($error)) {
			$random_password = wp_generate_password();

			$user = get_user_by( $get_by, $account );
				
			$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
				
			if( $update_user ) {
				
				$from = get_option('admin_email'); // Set whatever you want like mail@yourdomain.com
				
				if(!(isset($from) && is_email($from))) {		
					$sitename = strtolower( $_SERVER['SERVER_NAME'] );
					if ( substr( $sitename, 0, 4 ) == 'www.' ) {
						$sitename = substr( $sitename, 4 );					
					}
					$from = 'do-not-reply@'.$sitename; 
				}
				
				$to = $user->user_email;
				$subject = __( 'Your new password', 'newfashion' );
				$sender = 'From: '.get_option('name').' <'.$from.'>' . "\r\n";
				
				$message = __( 'Your new password is: ', 'newfashion' ) .$random_password;
					
				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers[] = "X-Mailer: PHP \r\n";
				$headers[] = $sender;
					
				$mail = wp_mail( $to, $subject, $message, $headers );
				if( $mail ) 
					$success = __( 'Check your email address for you new password.', 'newfashion' );
				else
					$error = __( 'System is unable to send you mail containg your new password.', 'newfashion' );						
			} else {
				$error =  __( 'Oops! Something went wrong while updating your account.', 'newfashion' );
			}
		}
	
		if( ! empty( $error ) )
			echo json_encode(array('loggedin'=>false, 'message'=>($error)));
				
		if( ! empty( $success ) )
			echo json_encode(array('loggedin'=>false, 'message'=>($success)));	
		die();
	}


	/**
	 * add all actions will be called when user login.
	 */
	public function setup(){
		if ( !is_user_logged_in() ) {
			add_action('wp_footer', array( $this,'signin') );
		}
		add_action( 'wpo-login-button', array( $this, 'button' ) );

	}

	/**
	 * render link login or show greeting when user logined in
	 *
	 * @return String.
	 */
	public function button(){
		if ( !is_user_logged_in() ) {
			echo '<a href="#"  data-toggle="modal" data-target="#modalLoginForm" class="wpo-user-login">'.__( 'Login','newfashion' ).'</a>';
		}else {
			return $this->greetingContext();
		}
	}

	/**
	 * check if user not login that showing the form
	 */
	public function signin(){
		if ( !is_user_logged_in() ) {
 			return $this->form();
		}	
	}

	/**
	 * Display greeting words
	 */
	public function greeting(){
		$current_user = wp_get_current_user();
		$link = esc_url(wp_logout_url( home_url() ));
		printf('Greeting %s (%s)', $current_user->user_nicename, '<a href="'.$link.'" title="'.__( 'Logout', 'newfashion' ).'">'.__( 'Logout', 'newfashion' ).'</a>' );
	}

	/**
	 *
	 */
	public function greetingContext(){
		$current_user = wp_get_current_user();
		$link = esc_url(wp_logout_url( home_url() ));

		echo ' <div class="account-links dropdown">
				  <a href="#" class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    '.__( 'Howdy', 'newfashion').', '.$current_user->user_nicename.'
				    <span class="caret"></span>
				  </a>
				 <a class="signout" href="'.$link.'" title="'.__( 'Logout', 'newfashion' ).'">'.__( 'Logout', 'newfashion' ).'</a>
				<div class="dropdown-menu">';
				    $args = array(
                        'theme_location'  => 'accountmenu',
                        'container_class' => '',
                        'menu_class'      => 'myaccount-menu'
                    );
                    wp_nav_menu($args);
	 	     
		echo		  '</div>
				</div>';

	}

	/**
	 * render login form
	 */
	public function form(){
		    echo '
			    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="modalLoginForm">
				      <div class="modal-dialog" role="document">
						<div class="modal-content"><div class="modal-body">';
			
			echo 		'<div class="inner account-login">
					    		
						   <div id="wpologinform" class="form-wrapper"> <form class="login-form " action="' . $_SERVER['REQUEST_URI'] . '" method="post">
						     
						    	<h2 class="heading-v2">'.__("Login", 'newfashion').'</h2>
								
									<div class="form-group">
										<input autocomplete="off" type="text" name="wpo_username" class="required form-control"  placeholder="'.__("Username",'newfashion').'" />
									</div>
									<div class="form-group">
										<input autocomplete="off" type="password" class="password required form-control" placeholder="'.__("Password",'newfashion').'" name="wpo_password" >
									</div>
									
									<div class="a-center">
										<input type="submit" class="btn btn-primary" name="submit" value="'.__("Log In",'newfashion').'"/>
										<input type="button" class="btn btn-default btn-cancel" name="cancel" value="'.__("Cancel",'newfashion').'"/>
									</div>
									<div class="form-group a-center">
										<label for="wpo-user-remember" ><input type="checkbox" name="remember" id="wpo-user-remember" value="true"> '.__("Remember Me",'newfashion').'</label>
									</div>
								
					';
					    echo '<p class="a-center"><a href="#wpolostpasswordform" class="toggle-links" title="'.__("Forgot Password",'newfashion').'">'.__("Lost Your Password?",'newfashion').'</a></p>';	
					    if(get_option('register_page_id')){ 
					    	echo "<p>".__('Dont not have an account?', 'newfashion' )." <a href='".esc_url(get_permalink( get_option('register_page_id') ))."' title='".__('Sign Up','themeum')."'>".__('Sign Up', 'newfashion')."</a></p>";	
					    }
						    do_action('login_form');
						    wp_nonce_field('ajax-wpo-login-nonce', 'security-li');
						echo '</form></div>';
		    echo '<div id="wpolostpasswordform" class="form-wrapper">';
		    echo trim( $this->resetForm() );
		   	echo '</div>';
		    echo '		</div></div></div>
					</div>
				</div>';


	}
 	
 	public function resetForm() {
		$output = sprintf('
				<form name="lostpasswordform" id="lostpasswordform" class="lostpassword-form" action="%s" method="post">
					<h2 class="heading-v2">%s</h2>
					<div class="lostpassword-fields">
					<p class="form-group">						
						<input type="text" placeholder="%s" name="user_login" class="user_login form-control" value="" size="20" tabindex="10" />
					</p>',
							site_url('wp-login.php?action=lostpassword', 'login_post'),
							__('Reset Password', 'newfashion'),
							__('Username or E-mail:', 'newfashion')
						);

						ob_start();
						do_action('lostpassword_form');

						wp_nonce_field('ajax-wpo-lostpassword-nonce', 'security-fwp');
						$output .= ob_get_clean();

						$output .= sprintf('
					<p class="submit a-center">
						<input type="submit" class="btn btn-primary" name="wp-submit" value="%s" tabindex="100" />
						<input type="button" class="btn btn-default btn-cancel" value="%s" tabindex="101" />
					</p>
					<p class="nav">
						',
							__('Get New Password', 'newfashion'),
							__('Cancel', 'newfashion')
							 
							
						);
						$output .= '
					</p>
					</div>
 					<div class="lostpassword-link a-center"><a href="#wpologinform" class="toggle-links">'.__('Back To Login', 'newfashion').'</a></div>
				</form>';

		return $output;
	}



}

new Newfashion_UserLogin();
?>