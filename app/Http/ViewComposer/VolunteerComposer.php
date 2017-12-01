<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;

use App\Cause;
use App\Institution;

class VolunteerComposer 
{
	protected $institutions;
	protected $causes;
	
	public function __construct(Institution $institutions, Cause $causes)
	{
		$this->institutions = $institutions;
		$this->causes = $causes;
	}
	
	public function compose(View $view)
	{
		$view->with('institutions', $this->institutions->with('user')->get()->pluck('user.name', 'id'));
		$view->with('causes', $this->causes->pluck('cause', 'id'));
	}
}