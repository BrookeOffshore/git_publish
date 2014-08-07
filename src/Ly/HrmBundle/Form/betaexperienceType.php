<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class betaexperienceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company')
            ->add('location')
            ->add('project')
            ->add('position')
            ->add('startdate')
            ->add('enddate')
            ->add('description')
            ->add('fromid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\betaexperience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_betaexperience';
    }
}
