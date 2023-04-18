<?php

declare(strict_types=1);

namespace App\DTO\Order\Output;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Order\Model\OrderItemInterface;

class ShopOrderDetails implements ShopOrderDetailsInterface
{
    /**
     * @param int $total
     * @param Collection<OrderItemInterface> $items
     */
    public function __construct(
        private readonly int $total,
        private readonly Collection $items,
    ) {
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
