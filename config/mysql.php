<?php
/**
 * MySQL�����ļ�
 * ֧������ͬ��
 */
if(!defined("APP_NAME")){
	if(strtolower(APP_MODEL) == 'debug'){
		die('Not allowed');
	}else{
		exit;
	}
}

global $config;

$config['mysql'] = array(
	//'url·��'=>'ģ��·��:����'
	'enable' => true, //����״̬
	'prefix' => '', //��ǰ׺
	'master' => array(
		'host' => '172.17.0.3', //����
		'port' => '3221', //�˿�
		'username' => 'block_line', //�û���
		'password' => 'block_line', //����
		'database' => 'block_line', //��ݿ�
	),
	'slaver' => array(
		'host' => '172.17.0.3', //����
		'port' => '3221', //�˿�
		'username' => 'block_line', //�û���
		'password' => 'block_line', //����
		'database' => 'block_line', //��ݿ�
	),
);
