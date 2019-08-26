<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AddCheckup extends Form
{
    public function buildForm()
    {
        $this
            ->add('id', 'number')
            ->add('date', 'date')
            ->add('team.name', 'text')
            ->add('sport.name', 'text')
            ->add('altezza', 'number')
            ->add('peso', 'number')
            ->add('tricipite_R', 'number')
            ->add('tricipite_L', 'number')
            ->add('petto_R', 'number')
            ->add('petto_L', 'number')
            ->add('ascella_R', 'number')
            ->add('ascella_L', 'number')
            ->add('iliaca_R', 'number')
            ->add('iliaca_L', 'number')
            ->add('addominale_R', 'number')
            ->add('addominale_L', 'number')
            ->add('coscia_R', 'number')
            ->add('coscia_L', 'number')
            ->add('spalle', 'number')
            ->add('petto', 'number')
            ->add('anche', 'number')
            ->add('braccio_R', 'number')
            ->add('braccio_L', 'number')
            ->add('gamba_R', 'number')
            ->add('gamba_L', 'number')
            ->add('spirometria', 'number')
            ->add('massa_grassa', 'number')
            ->add('bmi', 'number')
            ->add('frq_riposo', 'number')
            ->add('frq_stress', 'number')
            ->add('frq_1min', 'number')
            ->add('step1', 'number')
            ->add('step2', 'number')
            ->add('step3', 'number')
            ->add('submit', 'submit', ['label' => 'Save form']);
    }
}
