<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session','user_agent','upload');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','form','file','html','string','date','text','custom');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('m_account','m_filetype');

$autoload['time_zone'] = date_default_timezone_set('Asia/Jakarta');
