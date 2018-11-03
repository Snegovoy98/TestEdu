<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\{TextType,
                                                PasswordType,
                                                RepeatedType,
                                                BirthdayType,
                                                EmailType,
                                                ChoiceType,
                                                SubmitType
                                                    };
class RegistrationType extends AbstractType
{
    /** This Type use for rendering registration form
     * @param FormBuilderInterface $builder
     * @param array $option
     */
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['class'        => 'form-control',
                    'name'         => 'email',
                    'id'           => 'email',
                    'placeholder'  => 'Введите email'],
                'label' => 'Email'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'attr' => ['class'       => 'form-control',
                           'name'        => 'password',
                           'id'          => 'password',
                           'placeholder' =>   'Введите пароль'],
                'first_options'  => ['label' => 'Пароль'],
                'second_options' => ['label' => 'Повторите пароль']
            ])
            ->add('firstName', TextType::class, [
                'attr' => ['class'        => 'form-control',
                    'name'         => 'firstName',
                    'id'           => 'firstName',
                    'placeholder'  => 'Введите Имя'],
                'label' => 'Login'
            ])
            ->add('lastName', TextType::class, [
                'attr' => ['class'       => 'form-control',
                    'name'        => 'lastName',
                    'id'          => 'lastName',
                    'placeholder' =>   'Введите фамилию'],
                'label' => 'Имя пользователя'
            ])
            ->add('date_born', BirthdayType::class, [
                'attr' => ['class'  => 'custom-select d-block w-100',
                           'name'   => 'born_date',
                            'id'    => 'born_date'],
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label' => 'Дата рождение'
            ])
            ->add('gender', ChoiceType::class, [
                'attr' => ['class' => 'custom-select d-block w-100',
                           'name'  => 'gender',
                           'id'    => 'gender',
                           ],
                'choices' => [
                    'Choose an option' => 'placeholder',
                    'Мужской' => 'male',
                    'Женский' => 'female'
                ],
                'label' => 'Пол'
            ])
            ->add('registration', SubmitType::class, [
               'attr' => ['class' => 'btn btn-primary btn-lg btn-block',
                          'value' => 'Зарегистрироваться']
            ])
            ;
    }
}