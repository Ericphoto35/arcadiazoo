<?php

namespace App\Controller\Admin;

use App\Entity\Habitats;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HabitatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Habitats::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('habitatsimg')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired('false')
        ];

        $habitatsnom = textField::new('habitatsnom');

        $habitatsdescription = TextEditorField::new('habitatsdescription');

        $fields[]= $habitatsnom;
        $fields[] = $habitatsdescription;

        return $fields;
    }
}
