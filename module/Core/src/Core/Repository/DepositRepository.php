<?php // Core/Repository/DepositRepository.php

namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class DepositRepository extends EntityRepository 
{

	public function getTotalByUser(\Core\Entity\User $user) 
	{
		return $user->getId();
	}


}