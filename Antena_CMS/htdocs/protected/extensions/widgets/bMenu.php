<?php
class bMenu extends CWidget {
	/**
	 * @var $data
	 */
	public $data;

	public function run() {
		$str = '';
		$this->buildMenu($this->data,$str);
		$this -> render('bMenu', array('menustr' => $str));
	}

	public function buildMenu($items,&$str='') 
	{
		
		foreach($items as $item) {
			$str .= '<li class="';
			if (isset($item['items'])) {
				$str .= 'has-sub';
			} else {
				$str .= 'last';
			}
			$str .= '"><a href="' . $item['url'] . '"><span>' . $item['label'] . '</span></a>';
			
			if (isset($item['items'])) {
				$str .= '<ul>';
				$this->buildMenu($item['items'],$str);
				$str .= '</ul></li>';
			} else {
				$str .= '</li>';
			}
			
		}
	} 

}
?>
