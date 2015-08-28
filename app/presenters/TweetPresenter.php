<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Utils\Strings;


class TweetPresenter extends BasePresenter
{

	/** @var  Model\UsersRepository @inject */
	public $users;

	/** @var  Model\TweetsRepository @inject */
	public $tweets;

	/** @var  Model\TagsRepository @inject */
	public $tags;

	/** @persistent */
	public $userId;


	public function renderList()
	{


		$user = $this->users->getById(1);

		$tweets = $this->tweets->findBy(['this->tags->name' => 'hello']);

//		$tweets = $this->tweets->findBlackMagic();
//		$tweets = $tweets->findBy(['this->tags->name' => 'hello'])->limitBy(2);

		$tweet = $tweets->getBy(['this->tags->name' => 'hello']);

		dump($tweet->toArray());

		$this->template->tweets = $tweets;
	}

	protected function createComponentTweetForm()
	{
		$form = new Nette\Application\UI\Form();
		$form->addText('tweet');

		$form->addSubmit('send');
		$form->onSuccess[] = [$this, 'proccessTweetForm'];

		return $form;
	}


	public function proccessTweetForm($form, array $values)
	{
		$text = $values['tweet'];

		$matches = Strings::matchAll($text, '~#([a-z0-9-]++)~');
		$tags = array_column($matches, 1);

		$user = $this->users->getById($this->userId);

		$tweet = new Model\Tweet();
		$tweet->user = $user;
		$tweet->text = $values['tweet'];

		$existingTags = $this->tags->findBy(['name' => $tags])->fetchPairs('name');
		$newTags = array_diff($tags, array_keys($existingTags));

		foreach ($newTags as $tag) {
			$tweet->tags->add(new Model\Tag($tag));
		}

		foreach ($existingTags as $tag) {
			$tweet->tags->add($tag);
		}

		$this->tweets->persist($tweet);
		$this->tweets->flush();

		$this->redirect('this');
	}

}
