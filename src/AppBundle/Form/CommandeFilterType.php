<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;


class CommandeFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateachat', Filters\DateFilterType::class)
            ->add('id', Filters\NumberFilterType::class)
        
            ->add('idproduit', Filters\EntityFilterType::class, array(
                    'class' => 'AppBundle\Entity\Produit',
                    'choice_label' => 'id',
            )) 
            ->add('idutilisateur', Filters\EntityFilterType::class, array(
                    'class' => 'AppBundle\Entity\User',
                    'choice_label' => 'id',
            )) 
        ;
        $builder->setMethod("GET");


    }

    public function getBlockPrefix()
    {
        return null;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'allow_extra_fields' => true,
            'csrf_protection' => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}
