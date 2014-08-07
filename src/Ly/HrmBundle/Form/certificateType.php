<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class certificateType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
				'required' => true,
				'label' => 'Certificate Name',			
				))
            ->add('category','choice',array(
            	'required' => true,
            	'label' => 'Category',
        		'choices' => array(
        				'Bosiet' => 'Bosiet',
        				'Medical' => 'Medical',
        				'Passport' => 'Passport',
        				'Seaman Book' => 'Seaman Book',
        				'Bst' => 'Bst',
        				'Contract' => 'Contract',
        				'Other' => 'Other'
        			)
            	))
            ->add('startdate', 'date', array(
				'widget' => 'single_text',
				'label' => 'Issue Date',
				'required' => false,
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
				))
            ->add('enddate', 'date', array(
				'widget' => 'single_text',
				'label' => 'Expiry Date',
				
				'required' => false,
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
				))
            ->add('note', 'text', array(
				'required' => false,
				'label' => 'Notes',			
				))
			->add('path','file',array(
				'required' => false,
				'data_class' => null,
				'label' => 'Certificate Path',				
				))
			->add('pathsave','hidden',array(
				'required' => false,
				'label' => false,							
				))
			

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\certificate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_certificate';
    }
}
