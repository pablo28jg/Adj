<?php

namespace Pablo\AdjWebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OpcionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Descripcion')
            ->add('Src')
            ->add('moduloId','entity',array(
    			'class' => 'Pablo\\AdjWebBundle\\Entity\\Modulo',
    			'empty_value' => '',
    	))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pablo\AdjWebBundle\Entity\Opcion'
        ));
    }

    public function getName()
    {
        return 'pablo_adjwebbundle_opciontype';
    }
}
