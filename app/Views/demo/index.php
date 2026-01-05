<?php $ui = new \App\Libraries\UiComponents(); ?>

<div class="row">
    <div class="col-md-3">
        <?= $ui->kpiCard('Ingresos', '$54,000', 'bi-currency-dollar', 'success') ?>
    </div>
    <div class="col-md-3">
        <?= $ui->kpiCard('Usuarios', '1,250', 'bi-people', 'info') ?>
    </div>
</div>

<div class="col-md-3">
    <?= $ui->kpiCard()
           ->setTitle('Errores Críticos')
           ->setValue('12')
           ->setIcon('bi-bug-fill')
           ->setColor('danger')
           ->addClass('shadow-lg') // Método de BaseComponent
           ->render() 
    ?>
</div>