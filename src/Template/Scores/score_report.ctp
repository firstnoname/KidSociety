<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    $(document).ready(function () {
        
        $('#graphform').change(function () {
            
            var graphNum = $('#graphform').val();
            
            if (graphNum === '1') {
                //alert(graphNum);
                $('#ac_code').focus();
                return false;
            }else if(graphNum === '2'){
                //do something.
                //alert(graphNum);

            }else{
                //alert(graphNum);
            }
            
        });
    });
</script>


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
<?= $this->Form->create('Post', array('url' => '/Scores/scoreReport/')); ?>
<div class="row">
    <div class="container">
        <table class="table-invers" style="width: 30%">
            <tr>
                <td><?= $this->Form->select('graphform', $graph, ['class' => 'form-control', 'id' => 'graphform']); ?></td>
                
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $this->Form->button('ค้นหา', ['class' => 'btn btn-primary', 'id' => 'checkblank']) ?></td>
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

<script>
    new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 },
    { year: '2013', value: 4 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>