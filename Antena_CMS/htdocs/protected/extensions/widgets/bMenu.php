<?php
class bMenu extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	
	
    public function run()
    {
    $str = '';
	
	foreach ($this->data as $level0) {
		
		$str.='<li class="';
		if (isset($level0['items'])) {
			$str.='has-sub';
		} else {
			$str.='last';
		}
		$str.='"><a href="'.$level0['url'].'"><span>'.$level0['label'].'</span></a>';

		if (isset($level0['items'])) {
			$str.='<ul>';
			
			foreach ($level0['items'] as $level1) {
				$str.='<li class="';
				if (isset($level1['items'])) {
					$str.='has-sub';
				} else {
					$str.='last';
				}
				$str.='"><a href="'.$level1['url'].'"><span>'.$level1['label'].'</span></a>';
				
				if (isset($level1['items'])) {
					$str.='<ul>';
					
					foreach ($level1['items'] as $level2) {
						$str.='<li class="';
						if (isset($level2['items'])) {
							$str.='has-sub';
						} else {
							$str.='last';
						}
						$str.='"><a href="'.$level2['url'].'"><span>'.$level2['label'].'</span></a></li>';
					}
					$str.='</ul></li>';
		
				} else {
					$str.='</li>';
				}
				
			}
			$str.='</ul></li>';

		} else {
			$str.='</li>';
		}

	}
		
    $this->render('bMenu',array('menustr'=>$str));
    }
}
?>
