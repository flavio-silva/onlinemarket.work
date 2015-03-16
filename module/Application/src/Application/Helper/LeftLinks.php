<?php

namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{
	public function __invoke($values, $urlPrefix)
	{
		$output = '<ul>';
		
		foreach($values as $value) {
			$output .= '<li>';
			$output .= "<a href=\"{$urlPrefix}/{$value}\">{$value}</a>";
			$output .= '</li>';
		}
				
		$output .= '</ul>';
		
		return $output;
	}
}