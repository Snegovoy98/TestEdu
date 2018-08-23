<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\{TextType,
                                                PasswordType,
                                                BirthdayType,
                                                EmailType,
                                                ChoiceType,
                                                SubmitType
                                                    };

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $builder
            ->add('surname', TextType::class, [
             'attr' => ['class'       => 'user_data',
                        'name'        => 'surname',
                        'id'          =>  'surname',
                        'placeholder' =>   'Введите фамилию' ],
               'label' => 'Фамилия'
            ])
            ->add('name', TextType::class, [
              'attr' => ['class' => 'user_data',
                          'name' => 'name',
                          'id'   =>  'name',
                  'placeholder' =>   'Введите имя' ],
                'label' => 'Имя'
            ])
            ->add('fathername', TextType::class, [
               'attr' => ['class' => 'user_data',
                           'name' => 'fathername',
                            'id'  => 'fathername',
                   'placeholder' =>   'Введите отчество'],
                'label' => 'Отчество'
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'user_data',
                           'name'  => 'email',
                            'id'   => 'email',
                    'placeholder'  => 'Введите email'],
                'label' => 'Email'
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'user_data',
                           'name'  => 'password',
                           'id'    => 'password',
                    'placeholder' =>   'Введите пароль'],
                'label' => 'Пароль'

            ])
            ->add('password_conf', PasswordType::class, [
                'attr' => ['class' => 'user_data',
                            'name' => 'password_conf',
                            'id'   => 'password_conf',
                    'placeholder'  => 'Введите повторно пароль'],
                'label' => 'Повторите пароль'
            ])
            ->add('born', BirthdayType::class, [
                'attr' => ['class' => 'data_born',
                            'name' => 'born_date',
                            'id'   => 'born_date'],
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label' => 'Дата рождение'
            ])
            ->add('cities', ChoiceType::class, [
                'attr' => ['class' => 'city',
                           'name'  => 'city',
                            'id'   => 'city',
                            'placeholder' => 'Choose an option'],
                'label' => 'Город'
            ])
            ->add('school', ChoiceType::class, [
                'attr' => ['class' => 'school',
                    'name'  => 'school',
                    'id'   => 'school',
                    'placeholder' => 'Choose an option'],
                'label' => 'Школа'
            ])
            ->add('class', ChoiceType::class, [
                'attr' => ['class' => 'classes',
                    'name'  => 'classes',
                    'id'   => 'classes',
                    'placeholder' => 'Choose an option'],
                'label' => 'Класс'
            ])
            ->add('save', SubmitType::class)
            ;
    }
}