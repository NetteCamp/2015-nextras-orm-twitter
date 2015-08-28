<?php

namespace App\Model;

use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;

/**
 * @property string $name
 *
 * @property Tweet[]|ManyHasMany $tweets {m:n Tweet::$tags}
 */
class Tag extends Entity
{
	public function __construct($name)
	{
		parent::__construct();
		$this->name = $name;
	}
}
