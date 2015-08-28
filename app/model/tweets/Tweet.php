<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;

/**
 * @property  User $user {m:1 User::$tweets}
 * @property  string $text
 * @property  DateTime $sentAt  {default now}
 *
 * @property-read int $age {virtual}
 *
 * @property  Tag[]|ManyHasMany $tags {m:n Tag::$tweets primary}
 */
class Tweet extends Entity
{

	const STATE_PUBLISHED = 'published';
	const STATE_DRAFT = 'draft';


	protected function getterAge()
	{
		return $this->sentAt->format('U') - date('U');
	}


	public function getFoo()
	{

	}

}
