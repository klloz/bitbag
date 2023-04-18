<?php

declare(strict_types=1);

namespace App\DataProvider\Order;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\DTO\Order\Output\ShopOrderDetails;
use Sylius\Component\Core\Model\Order;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShopOrderDetailsDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(private readonly OrderRepositoryInterface $orderRepository)
    {
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Order::class === $resourceClass && 'shop_get' === $operationName;
    }

    public function getItem(
        string $resourceClass,
        $id,
        string $operationName = null,
        array $context = []
    ): ShopOrderDetails {
        if (Order::class !== $resourceClass) {
            throw new BadRequestException();
        }

        $order = $this->orderRepository->findOneByTokenValue($id);
        if (!$order) {
            throw new NotFoundHttpException();
        }

        return new ShopOrderDetails(
            $order->getTotal(),
            $order->getItems(),
        );
    }
}
