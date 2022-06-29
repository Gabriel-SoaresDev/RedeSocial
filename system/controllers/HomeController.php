<?php
namespace DEV\Controllers;

use Rain\Tpl;

class HomeController
{
	private $tpl;

	function __construct()
	{
		$config = array(
			'base_url' => __DIR_PRINCIPAL__,
			'tpl_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
			'cache_dir' => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__.'/cache/',
			'tpl_ext' => 'php',
			'debug' => true
		);

		Tpl::configure($config);

		$this->tpl = new Tpl;

		//$this->setTpl("header");
		
	}

	function __destruct()
	{
		$this->tpl->draw("footer", false);
		//$this->setTpl("footer");
	}

	 public function setTpl($template, $data=array(), $returnHtml = false)
	 {
	 	$this->setData($data);

	 	return $this->tpl->draw($template, $returnHtml);
	 }

	public function setData($data= array())
	 {
	 	foreach ($data as $key => $value) {
	 		$this->tpl->assign($key, $value);
	 	}
	 }

	public function login()  //primeiro poe o title e depois o template/views.
	{
		$this->setTpl("header", array('title_pagina' => 'pagina de login'));
		$this->setTpl("login");
	}

	public function feed()  //primeiro poe o title e depois o template/views.
	{
		$this->setTpl("header", array('title_pagina' => 'Seu Feed'));
		$this->setTpl("feed");
	}

	public function feed_usuario($request, $response, $args)  //primeiro poe o title e depois o template/views.

	{
		$nome = $args['usuario'];
		$this->setTpl("header", array('title_pagina' => 'Feed de '.$nome));
		$this->setTpl('feed_usuario', array('nome_usuario' => $nome));
	}

	public function configuracao() //primeiro poe o title e depois o template/views.
	{
		$this->setTpl("header", array('title_pagina' => 'Configuracoes'));
		$this->setTpl("configuracao");
	}

	public function pesquisa()
	{
		$this->setTpl("header", array('title_pagina' => 'Pesquisa'));
		$this->setTpl("pesquisa");
	}

	public function mensagens()
	{
		$this->setTpl("header", array('title_pagina' => 'Minhas Mensagens'));
		$this->setTpl("mensagens");
	}

	public function fotos()
	{
		$this->setTpl("header", array('title_pagina' => 'Minhas Fotos'));
		$this->setTpl("fotos");
	}


}
?>