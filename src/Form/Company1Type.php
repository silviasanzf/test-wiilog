<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Company1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('codePost')
            ->add('city')
            ->add('siret')
            ->add('phone')
            ->add('email')
            ->add('french')
            ->add('type',
                EntityType::class,
                [
                    'class' => Type::class,
                    'multiple' => false,
                    'expanded' => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
