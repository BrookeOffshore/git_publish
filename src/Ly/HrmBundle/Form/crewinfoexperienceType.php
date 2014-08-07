<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class crewinfoexperienceType extends AbstractType
{


	/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
            $builder->add('experience', 'collection', array(
            			'type' => new experienceType(),
						'allow_add' => true,
						'label' => false,
						'by_reference' => false,
						'allow_delete' => true,
						))
					->add('submit', 'submit', array(
						'attr' => array(
							'class' => 'small button'
						)
					))
					;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\crewinfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_crewinfo';
    }
}
