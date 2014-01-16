<?php
namespace SmartCore\Bundle\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleFormType extends AbstractType
{
    protected $class;

    /**
     * @param string $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @todo подумать как конфигурировать редактор... лучше будет создать файл темы для формы, в ней же и input-block-level указывать.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',  null,   ['attr' => ['class' => 'input-block-level']])
            ->add('slug',   null,   ['attr' => ['class' => 'input-block-level']])
            ->add('annotation', null, [
                'attr' => ['class' => 'input-block-level'],
                'required' => false,

            ])
            ->add('text',   null,   [
                'attr' => [
                    'class' => 'input-block-level wysiwyg',
                    'data-theme' => 'advanced',
                ],
            ])
            ->add('description', null, ['attr' => ['class' => 'input-block-level']])
            ->add('keywords', null, ['attr' => ['class' => 'input-block-level']])
        ;

        if (array_key_exists('SmartCore\Bundle\BlogBundle\Model\CategoryTrait', class_uses($this->class, false))) {
            $builder->add('category', null, ['attr' => ['class' => 'input-block-level']]); // @todo сделать отображение вложенных категорий.
        }

        if (array_key_exists('SmartCore\Bundle\BlogBundle\Model\TagTrait', class_uses($this->class, false))) {
            $builder->add('tags', null, [
                'expanded' => true,
                'required' => false,
            ]);
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }

    public function getName()
    {
        return 'smart_blog_article';
    }
}
