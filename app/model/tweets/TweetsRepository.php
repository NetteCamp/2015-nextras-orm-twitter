<?php

namespace App\Model;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


/**
 * @method ICollection findBlackMagic()
 */
class TweetsRepository extends Repository
{
	public function findByText($text)
	{
		return $this->findBy(['text' => $text]);
	}


}
