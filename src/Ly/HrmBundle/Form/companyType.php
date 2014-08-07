<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class companyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company')
			->add('vessel', 'collection', array(
            			'type' => new vesselType(),
						'allow_add' => true,
						'label' => false,
						'by_reference' => false,
						'allow_delete' => true,
						))
			->add('submit','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_company';
    }
}
