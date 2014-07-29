<?php
namespace DocDigital\Bundle\PdfBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PdfInsertType extends AbstractType
{
    const POSITION_END = 0;
    const POSITION_BEGINNING = 1;
    const POSITION_PAGE = 2;
    const POSITION_REPLACE = 3;
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('insertPosition', 'choice', array(
                'label'    => 'Posicition',
                'choices'  => array(
                    self::POSITION_END       => 'End', 
                    self::POSITION_BEGINNING => 'Beginning', 
                    self::POSITION_REPLACE   => 'Replace',
                    self::POSITION_PAGE      => 'Page', 
                ),
                'data'     => self::POSITION_END,
                'expanded' => true,
                'multiple' => false
            ))
            ->add('pageNumber', 'integer', array('data' => 0, 'attr' => array('disabled' => true)))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'docdigital_pdfinsert';
    }
}
