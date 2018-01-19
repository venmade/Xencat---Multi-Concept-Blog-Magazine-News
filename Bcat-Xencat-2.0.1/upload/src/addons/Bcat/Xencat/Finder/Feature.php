<?php

namespace Bcat\Xencat\Finder;

use XF\Mvc\Entity\Finder;

class Feature extends Finder
{
	public function searchTitle($match, $prefixMatch = false)
	{
		if ($match)
		{
			$this->whereOr(
				[
					$this->expression('CONVERT (%s USING utf8)', 'feature_title'),
					'LIKE',
					$this->escapeLike($match, $prefixMatch ? '?%' : '%?%')
				],
				[
					$this->expression('CONVERT (%s USING utf8)', 'Thread.title'),
					'LIKE',
					$this->escapeLike($match, $prefixMatch ? '?%' : '%?%')
				]
			);
		}

		return $this;
	}
}
