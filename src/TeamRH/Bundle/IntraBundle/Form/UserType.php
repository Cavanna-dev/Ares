<?php

namespace TeamRH\Bundle\IntraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => false,
                'attr' => array(
                    'class' => 'form-control input-lg',
                    'placeholder' => 'Pseudo'
                )
            ))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Les mots de passes doivent correspondre',
                'label' => false,
                'options' => array(
                    'required' => 'true',
                ),
                'first_options' => array(
                    'label' => false,
                    'required' => 'true',
                    'attr' => array(
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Mot de passe'
                    ),
                ),
                'second_options' => array(
                    'label' => false,
                    'required' => 'true',
                    'attr' => array(
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Confirmation mot de passe'
                    ),
                ),
            ))
            ->add('email', 'email', array(
                'label' => false,
                'attr' => array(
                    'class' => 'form-control input-lg',
                    'placeholder' => 'Email'
                )
            ))
            ->add('groups', 'entity', array(
                'label' => false,
                'class' => 'TeamRHIntraBundle:Group',
                'property' => 'name',
                'multiple' => 'true',
                'attr' => array(
                    'class' => 'form-control'
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
            'data_class' => 'TeamRH\Bundle\IntraBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'teamrh_bundle_intrabundle_user';
    }
}
