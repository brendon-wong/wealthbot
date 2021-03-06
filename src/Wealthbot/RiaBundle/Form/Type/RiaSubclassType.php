<?php
/**
 * Created by JetBrains PhpStorm.
 * User: amalyuhin
 * Date: 20.09.12
 * Time: 14:19
 * To change this template use File | Settings | File Templates.
 */

namespace Wealthbot\RiaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RiaSubclassType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('expected_performance', 'number', [
                'grouping' => true,
                'precision' => 2,
                'label' => 'Expected Performance (%)',
            ])
            ->add('accountType', 'entity', [
                'class' => 'Wealthbot\\RiaBundle\\Entity\\SubclassAccountType',
                'property' => 'name',
                'label' => 'Type',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Wealthbot\AdminBundle\Entity\Subclass',
            'cascade_validation' => true,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'wealthbot_riabundle_ria_subclass_type';
    }
}
