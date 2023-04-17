<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct
{
    #[ORM\Column(type: Types::STRING, length: 64, nullable: true, enumType: Color::class)]
    private ?Color $color;

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): void
    {
        $this->color = $color;
    }
}
