<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<header>
    <div class="container">
        <div class="row">
            <div class="text-right">
                <b><br><br>
                    <?php
                    echo $this->request->Session()->read('loginstatus');
                    ?> &nbsp;&nbsp;&nbsp;
                </b>
                <?= $this->Html->link('<button class="btn btn-warning" >ออกจากระบบ</button>', '/accounts/logout/', ['escape' => false]); ?>
            </div>
            <div class="text-left">
                <ul class="side-nav">
                    <li class="page-header font-th-prompt400"><?= $this->Html->link(__('Home'), '/games/index/') ?></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<?= $this->Form->create('Post', array('url' => '/Scores/reportNameScore/')); ?>
<div class="row">
    <div class="container">
        <table class="table-invers" style="width: 30%">
            <tr>
                <td></td>
                
                <td></td>
            </tr>
        </table>
    </div>
</div>
<br><br>
<div class="row">
    <div class="container">
     <div id="myfirstchart" style="height: 250px;"></div>
    </div>    
</div>
<?php
    $chart_data="";
    //Receive data from controller.
    foreach($scores as $score):
        $chart_data .= "{ name: '".$score->name."', total_score: ".$score->total_score." }, ";
        //echo $chart_data;
    endforeach;
    $chart_data = substr($chart_data,0,-2);
    // echo "<br>" . $chart_data;
?>
<script>
    new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [<?php echo $chart_data; ?>],

    
  // The name of the data record attribute that contains x-values.
  xkey: 'name',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total_score'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Score']
});
</script>

