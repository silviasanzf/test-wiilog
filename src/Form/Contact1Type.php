<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Contact1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility')
            ->add('name')
            ->add('firstName')
            ->add('mobilPhone')
            ->add('officePhone')
            ->add('email')
            ->add('company')
            ->add(
                'roles',
            EntityType::class,
                [
                    'class' => Role::class,
                    'multiple' => true,
                    'expanded' => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

}
