<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['protocol']		= "smtp";	// mail/sendmail/smtp
$config['smtp_host']		= "mail.fpo.com";		// SMTP Server.  Example: mail.earthlink.net
$config['smtp_user']		= "admin@fpo.com";		// SMTP Username
$config['smtp_pass']		= "sssssss";		// SMTP Password
$config['smtp_port']		= "587";		// SMTP Port
$config['smtp_timeout']	= 7;		// SMTP Timeout in seconds
$config['wordwrap']		= TRUE;		// TRUE/FALSE  Turns word-wrap on/off
$config['wrapchars']		= "76";		// Number of characters to wrap at.
$config['mailtype']		= "html";	// text/html  Defines email formatting
$config['charset']		= "iso-8859-1";	// text/html  Defines email formatting
