<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mobgrouptorecordType extends AbstractType
{
	protected $vessel_choice_array;
	
	public function __construct($vessel_choice_array)
	{
	    $this->vessel_choice_array = $vessel_choice_array;
	}
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('record', 'text', array(
				'label' => 'Mob Record',
			))
            ->add('company', 'text', array(
				'label' => 'Company',
			))
            ->add('vessel', 'choice', array(
				'required' => false,
				'choices' => $this->vessel_choice_array,
			))
            ->add('mobdate', 'date', array(
				'label' => 'Mob Date',
				'widget' => 'single_text',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
				)
			))
			->add('project' ,'text', array(
				'label' =>'Project'
			))
            ->add('description','textarea', array(
				'label' =>'Description'	
			))
			->add('mobrecord', 'collection', array(
            			'type' => new mobrecordType(),
						'label' => false,
						'by_reference' => false
			))
			->add('submit', 'submit', array(
				'attr' => array(
					'class' => 'small button'
				),
				'label' => 'Update'
			))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\mobgroup'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_mobgroup';
    }
}
