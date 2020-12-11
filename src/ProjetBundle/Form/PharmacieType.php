<?php

namespace ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;





class PharmacieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user',EntityType::class,[
        'class' => 'AppBundle:User',
        'choice_label' => 'username'])
        ->add('nom',TextType::class)
        ->add('adresse',TextType::class)
        ->add('gouvernorat',ChoiceType::class, [
            'choices'  => [
                'Ariana' => 'Ariana',
                'Béja' => 'Béja',
                'Ben Arous' => 'Ben Arous',
                'Bizerte' => 'Bizerte',
                'Gabès' => 'Gabès',
                'Gafsa' => 'Gafsa',
                'Jendouba' => 'Jendouba',
                'Kairouan' => 'Kairouan',
                'Kasserine' => 'Kasserine',
                'Kébili' => 'Kébili',
                'Le Kef' => 'Le Kef',
                'Mahdia' => 'Mahdia',
                'La Manouba' => 'La Manouba',
                'Médenine' => 'Médenine',
                'Monastir' => 'Monastir',
                'Nabeul' => 'Nabeul',
                'Sfax' => 'Sfax',
                'Sidi Bouzid' => 'Sidi Bouzid',
                'Siliana' => 'Siliana',
                'Sousse' => 'Sousse',
                'Tataouine' => 'Tataouine',
                'Tozeur' => 'Tozeur',
                'Tunis' => 'Tunis',
                'Zaghouan' => 'Zaghouan',
            ],
        ])
        ->add('fixe',TelType::class)
        ->add('fax',TelType::class)
        ->add('mobile',TelType::class)
        ->add('email', EmailType::class)
        ->add('categorie',CollectionType::class, [ 
            'entry_type' => CategorieType::class,
            'entry_options' =>['label' => false],
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'by_reference' => false])
        ->add('Save',SubmitType::class,[
            'attr' => [
                'class' =>
                    'pull-right btn  btn-success btn-sm; fa  fa-check-circle']
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetBundle\Entity\Pharmacie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_pharmacie';
    }


}
