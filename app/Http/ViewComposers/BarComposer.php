<?php 


namespace  APISELL\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use APISELL\Box;

class BarComposer{


	public function compose(View $view)
	{
		$box = Box::all();
		$view->with('boxes',$box);
	}
}
?>