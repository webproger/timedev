<?php

namespace SmartCore\Bundle\BlogBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;

class TagCreateFormType extends TagFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('create', 'submit', [
            'attr' => [
                'class' => 'btn btn-primary',
            ],
        ]);
    }

    public function getName()
    {
        return 'smart_blog_tag_create';
    }
}
