<?php
class FileText{
	private $texts;
	private $default;

	public function __construct()
	{
		$this->texts = array();
	}

	public function setDefault($default = '')
	{
		$this->default = $default;
	}
	
	public function set($page,$key,$value)
	{
		$this->texts[$page][$page.'_'.$key] = $value;
		$this->texts[$page][$key] = $value;
	}
	public function get($page = "", $key = ""){
		if(!empty($page) && !empty($key)) return $this->texts[$page][$key];
		else return $this->texts;
	}
	
	public function makeTPL($TPL,$page){
		$pageKeys = array_keys($this->texts[$page]);
		
		if($this->default)
		{
			$defaults_keys = array_keys($this->texts[$this->default]);
			$pageKeys = array_merge($pageKeys,$defaults_keys);
		}
		
		for($a=0;$a<count($pageKeys);$a++)
		{
			if(isset($this->texts[$page][$pageKeys[$a]])) $tag = $this->texts[$page][$pageKeys[$a]];
			else $tag = $this->texts[$this->default][$pageKeys[$a]];
			
			$TPL->setTag($pageKeys[$a],$tag);
		}
		return $TPL;
	}
}
?>
