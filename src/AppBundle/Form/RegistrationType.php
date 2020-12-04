<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;





class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mobile',TelType::class);
        $builder->add('sexe',ChoiceType::class,[
            'choices' => [
                'Femme' => false,
                'Homme' => false,
            ],
            'expanded' => true,
            'multiple' => false
        ]);
        $builder->add('date_de_naissance',BirthdayType::class, [
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd'
        ]);
        $builder->add('adresse',TextType::class);
        $builder->add('ville',TextType::class);
        $builder->add('gouvernorat',ChoiceType::class, [
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
        ]);
        $builder->add('CodePostal', IntegerType::class);
        $builder->add('roles', ChoiceType::class, array(
          
            'choices' =>
                array
                (       
                    'ADMIN' => 'ROLE_SUPER_ADMIN',
                    'Pharmacie'       => 'ROLE_ADMIN',
                    'Client'   => 'ROLE_User',
                    
                ) ,
            'expanded' => false,
            'multiple' => true,
            'required' => false,
        ) 
    );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }


}
