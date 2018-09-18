<?php

namespace App\Form\Type;

use App\Entity\FeedbackContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FeedbackContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',null,['required'=>false,'label'=>'Имя*', 'attr'=>[
                'class'=>'form-control'
            ]])
            ->add('phone',null,['required'=>false,'label'=>'Телефон*','attr'=>[
                'class'=>'form-control'
            ]])
            ->add('comment',null,['required'=>false,'label'=>'Сообщение','attr'=>[
                'class'=>'form-control',
                'rows'=>6
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FeedbackContact::class,
        ]);
    }

}
