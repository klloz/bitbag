<?php

namespace App\DTO\Order\Output;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Order\Model\OrderItemInterface;

interface ShopOrderDetailsInterface
{
    /**
     * @return Collection<OrderItemInterface>
     */
    public function getItems(): Collection;

    public function getTotal(): int;
}
