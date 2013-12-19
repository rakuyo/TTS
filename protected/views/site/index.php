    <?php $this->beginWidget(
      'bootstrap.widgets.TbHeroUnit',
      array(
        'heading' => 'MPITTS',
       )
    ); ?>
     
    <p>(Matnog Port Integrated Terminal Ticketing System)</p>
    <span class='label label-info'><i class='icon-calendar icon-5x pull-left'></i><h1 class='pull-left'><?=date('Y-m-d')?></h1></span>
    <span class='label label-important'><i class='icon-group icon-5x pull-left'></i><h1 class='pull-left'><?=$dr['cnt']?></h1></span>
    <span class='label label-success'><i class='icon-money icon-5x pull-left'></i><h1 class='pull-left'><?=number_format($dr['rev'],2)?></h1></span>
    <?php $this->endWidget(); ?>
