<?php
namespace Jimmy\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ArticleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->setMethod('POST')
            //->add('id', HiddenType::class)
            ->add('title', TextType::class)
            ->add('url', TextType::class)
            ->add('image_url', TextType::class)
            ->add('content', CKEditorType::class)
            ->add('save', SubmitType::class)
        ;
    }
}
?>