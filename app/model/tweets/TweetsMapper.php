<?php

namespace App\Model;

use Nextras\Orm\Entity\IEntity;
use Nextras\Orm\Mapper\Mapper;


class TweetsMapper extends Mapper
{
	public function findAll()
	{
		$builder = $this->builder();
		$builder->from('(SELECT * FROM tweets LEFT JOIN another_table .....)', $this->builder()->getFromAlias());

		return $this->toCollection($builder);
	}


	public function findBlackMagic()
	{
		$builder = $this->builder();
		$builder->addOrderBy('RAND()');

		return $builder;
	}


	protected function createStorageReflection()
	{
		$reflection = parent::createStorageReflection();
		$reflection->addMapping('text', 'tweet_text');

		return $reflection;
	}
}
