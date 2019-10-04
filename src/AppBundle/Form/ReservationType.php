<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numeroSemaine')
                ->add('formateur', EntityType::class, ['class' => 'AppBundle:Formateur', 'choice_label' => 'nomComplet'])
                ->add('promo',EntityType::class, ['class'=> 'AppBundle:Promo','choice_label'=>'nomPromo'])
                ->add('salle', EntityType::class,['class'=>'AppBundle:Salle','choice_label'=>'numero'])
                ->add('etage', EntityType::class, ['class' => 'AppBundle:Salle', 'choice_label' => 'etage'])
                ->add('horaire', EntityType::class, ['class' => 'AppBundle:Horaire', 'choice_label' => 'demi_journee'])
                ->add('semaine', EntityType::class, ['class' => 'AppBundle:Semaine', 'choice_label' => 'jour']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reservation';
    }


}
