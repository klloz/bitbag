<?php

declare(strict_types=1);

namespace App\Form\Extensions;

use App\Entity\Product\Color;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', EnumType::class, [
                'class' => Color::class,
                'label' => 'product.color',
                'required' => false,
                'choice_label' => function (?Color $color) {
                    return $color ? 'product.colors.' . $color->value : '';
                },
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
