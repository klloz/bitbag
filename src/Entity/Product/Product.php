<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct
{
    const COLOR_BLUE = 'blue';
    const COLOR_GREEN = 'green';
    const COLOR_RED = 'red';
    const ALL_COLORS = [
        self::COLOR_BLUE,
        self::COLOR_GREEN,
        self::COLOR_RED,
    ];

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    #[ORM\Column(type: Types::STRING, length: 64, nullable: true)]
    private string $color;

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}
