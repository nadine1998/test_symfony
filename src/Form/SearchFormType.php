<?php
namespace App\Form;

use App\Data\SearchData;
use App\Entity\Categorie;
use App\Entity\SocieteDeGestion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType extends AbstractType{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('societe_de_gestion',EntityType::class,[
                'label'=>'Sociétés de Gestion',
                'required'=>false,
                'class' => SocieteDeGestion::class,
                'expanded' =>false,
                'multiple' =>false,
            ])
            ->add('categorie',EntityType::class,[
                'label'=>'Catégories',
                'required'=>false,
                'class' => Categorie::class,
                'expanded' =>true,
                'multiple' =>false,
            ])
            ->add('assurance_vie',CheckboxType::class,[
                'label'=>'Assurance vie',
                'required'=>false,
                 
            ])
          
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}