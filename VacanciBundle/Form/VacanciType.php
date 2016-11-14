<?php

namespace VacanciBundle\Form;

use AppBundle\Form\Type\AppCollectionType;
use VacanciBundle\Entity\Vacanci;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class VacanciType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('vac', TextType::class, [
                'label' => false,
                'attr' =>  array(
                    'class' => 'hidden',
                ),
                'required' => false
            ])
            ->add('name', TextType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'ФИО',
                ),
            ])
            ->add('date', DateType::class, array(
                'label' => false,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr' =>  array(
                    'placeholder' => 'Дата рождения',
                ),
                'required' => false
            ))
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Email',
                    'data-help' => 'text.partners.form.email',
                ),
                'required' => true
            ])
            ->add('mobilePhone', TextType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Мобильный телефон',
                    'data-help' => 'text.partners.form.phone',
                    'class' => 'phone'
                ),
            ])
            ->add('shcool', TextareaType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Образование',
                    'rows' => 4
                ),
                'required' => true
            ])
            ->add('jobs', TextareaType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Опыт работы',
                    'rows' => 4
                ),
                'required' => true
            ])
            ->add('question', TextareaType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Почему я хочу работать в киноаренде',
                    'rows' => 4
                ),
                'required' => true
            ])
            ->add('socion', UrlType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Социальная сеть',
                    'data-help' => 'Введите адрес в формате http://kino.rent'
                ),
                'required' => true
            ])
            ->add('portfolio', UrlType::class, [
                'label' => false,
                'attr' =>  array(
                    'placeholder' => 'Портфолио',
                    'data-help' => 'Введите адрес в формате http://kino.rent'
                ),
                'required' => false
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => false,
                'attr' =>  array(
                    'data-help' => 'Загрузите Вашу фотографию (jpg, png)',
                ),
                'required' => true
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VacanciBundle\Entity\Vacanci',
        ));
    }

    public function getBlockPrefix()
    {
        return 'client_vacanci_form';
    }
}
