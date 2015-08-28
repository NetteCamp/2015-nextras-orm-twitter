<?php


namespace App\Model;

use Nextras\Orm;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * @property string $email
 * @property string $nick
 * @property string $password
 * @property string|NULL $bio
 *
 * @property Tweet[]|OneHasMany $tweets {1:m Tweet::$user}
 */
class User extends Orm\Entity\Entity
{

}
