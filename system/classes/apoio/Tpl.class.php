<?php
class Tpl{
	private $tplContent = null;
	private $tplTags = array();
	private $tplDir = null;
	private $tplHeader = null;
	private $tplFooter = null;
	private $extension = '.tpl.php';
	
	public function __construct(){
		$this->tplDir = ''.PAGES_TPL.'/';
	}
	public function setTag($tag,$value){
		$this->tplTags[$tag] = $value;
	}
	public function open($file){
		$file = $this->tplDir.$file.$this->extension;
		if(is_file($file)){
			$this->tplContent = file_get_contents($file);
		}
	}
	public function readContent($file){
		$file = $this->tplDir.$file.$this->extension;
		if(is_file($file)){
			$aux = file_get_contents($file);
			
			foreach($this->tplTags as $key => $value){
				$aux = strtr($aux,array('<tag{'.$key.'}>' => $value));
			}
			
			return $aux;
		}
	}
	public function show(){
		$this->tplHeader = $this->readContent('header');
		$this->tplFooter = $this->readContent('footer');
		
		if($this->tplContent){
			foreach($this->tplTags as $key => $value){
				$this->tplContent = strtr($this->tplContent,array('<tag{'.$key.'}>' => $value));
			}

			$this->tplContent = $this->tplHeader . $this->tplContent . $this->tplFooter;
		}
		eval('?>'.$this->tplContent.'');
	}
}
?>