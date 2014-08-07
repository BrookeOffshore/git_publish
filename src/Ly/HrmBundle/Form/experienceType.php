<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class experienceType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', 'text', array(
				'required' => true,
				'label' => 'Company',
			
			))
            ->add('location', 'text', array(
				'required' => true,
				'label' => 'Location',
			
			))
            ->add('project', 'text', array(
				'required' => true,
				'label' => 'Project',
		
			))
			->add('position', 'text', array(
				'required' => true,
				'label' => 'Position Held',
		
			))
            ->add('startdate', 'date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'Start Date',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
            ->add('enddate', 'date', array(
				'widget' => 'single_text',
				'label' => 'End date',
				'empty_value' => '',
				'required' => false,
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
            ->add('description','textarea')
			
			;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\experience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_experience';
    }
}
