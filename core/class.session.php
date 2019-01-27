<?php

class Session
{
	public function __construct( $autostart = TRUE )
	{
		$this->started = ( isset( $_SESSION ) ? TRUE : FALSE );
		
		if ( $autostart == TRUE && $this->started == FALSE )
		{
			$this->start();
		}
	}
	
	
	public function start()
	{
		if ( !$this->started )
		{
			session_start();
			
			$this->started = TRUE;
		}
	}
	

	public function stop( $clear_cookie = TRUE, $clear_data = TRUE )
	{
		if ( $this->started )
		{
			if ( $clear_cookie == TRUE 
				&& ini_get( "session.use_cookies" ) == TRUE )
			{
				$params = session_get_cookie_params();
				
				setcookie( session_name(), '', time() - 42000, 
					$params["path"], $params["domain"], $params["secure"], $params["httponly"] );
			}
			
			if ( $clear_data == TRUE )
			{
				$_SESSION = array();
			}
			
			session_destroy();
			session_write_close();
			
			$this->started = FALSE;
		}
	}
	
	
	public function generate_sid( $chars = 100, $alpha = TRUE, $numeric = TRUE, $symbols = TRUE, $timestamp = TRUE )
	{
		if ( $chars <= 0 || !is_numeric( $chars ) )
		{
			return FALSE;
		}
		
		$salt = NULL;
		
		if ( $alpha == TRUE )
		{
			$salt .= "abcdefghijklmnopqrstuvwxyz";
		}
		
		if ( $numeric == TRUE )
		{
			$salt .= "1234567890";
		}
		
		if ( $symbols == TRUE )
		{
			$salt .= "-_";
		}
		
		$sid = NULL;
		for ( $c = 1; $c <= $chars; $c++ )
		{
			$sid .= $salt{mt_rand( 0, strlen( $salt ) - 1 )};
			
			if ( mt_rand( 0, 1 ) == 1 )
			{
				$sid{strlen( $sid ) - 1} = strtoupper( $sid{strlen( $sid ) - 1} );
			}
		}
		
		if ( $timestamp == TRUE )
		{
			$sid .= time();
		}
		
		return $sid;
	}
	
	public function set( $var, $val )
	{
		$_SESSION[$var] = $val;
	}
	
	public function clear( $var )
	{
		unset( $_SESSION[$var] );
	}
	
	public function get( $var )
	{
		return ( isset( $_SESSION[$var] ) ? $_SESSION[$var] : FALSE );
	}
	
	public function islogin(){
		
		return $this->get('email');
	
	}
	
	public function user_role(){
		
		
	
	}
}