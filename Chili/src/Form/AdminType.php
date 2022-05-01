<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TelType::class,["attr"=>["class"=>"form-control"]])
            ->add('prenom', TelType::class,["attr"=>["class"=>"form-control"]])
            ->add('Username', TelType::class,["attr"=>["class"=>"form-control"]])
            ->add('MotDePasse', PasswordType::class,["attr"=>["class"=>"form-control"]])
            ->add('email', EmailType::class,["attr"=>["class"=>"form-control"]])
            ->add('telephone', TelType::class,["attr"=>["class"=>"form-control"]])
            ->add('image', FileType::class, ['mapped'=>false,'attr'=>['name'=>'image','required'=>false]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
