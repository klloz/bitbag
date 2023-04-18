<?php

declare(strict_types=1);

namespace App\Entity\Order;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Order as BaseOrder;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_order')]
#[ORM\Index(['token_value'])]
#[ORM\Index(['state', 'updated_at'])]
class Order extends BaseOrder
{
}
