<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mobrecordType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startdate', 'datetime', array(
				'widget' =>'single_text',
				'input'  => 'datetime',
				'required' => false,
				'label' => false,
				'format' => 'dd/MM/yyyy HH:mm',
				'attr' => array(
					'class' => 'datetimepicker',
				)
			))
            ->add('enddate' ,'datetime', array(
				'widget' =>'single_text',
				'input'  => 'datetime',
				'required' => false,
				'label' =>false,
				'format' => 'dd/MM/yyyy HH:mm',
				'attr' => array(
					'class' => 'datetimepicker',
				)
			))
            ->add('rate', 'text', array(
            	'required' => false,
				'label' => false
			))
            ->add('remark', 'text', array(
            	'required' => false,
				'label' => false
			))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\mobrecord'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_mobrecord';
    }
}
