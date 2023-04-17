<?php

declare(strict_types=1);

namespace App\Form\Extensions;

use App\Entity\Product\Product;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', ChoiceType::class, [
                'choices' => Product::ALL_COLORS,
                'required' => false,
//                'label' => 'form.product.color',
                'label' => 'Color', // todo use translations, for choices as well
                'choice_label' => function ($key, $value) {
                    return $key;
                },
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
