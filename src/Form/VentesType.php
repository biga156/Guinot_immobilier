<?php

namespace App\Form;

use App\Entity\Ventes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt')
            ->add('titre')
            ->add('categorie')
            ->add('image')
            ->add('description')
            ->add('surface')
            ->add('type_maison')
            ->add('chambres')
            ->add('etage')
            ->add('cout')
            ->add('adresse')
            ->add('accesibility')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ventes::class,
        ]);
    }
}
