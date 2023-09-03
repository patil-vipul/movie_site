<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<div class="container pt-4">
   
    <h1 class="pb-2 border-bottom">Analytics</h1>
   <div class="mt-4">
    <h3>Page Count</h3>
    <?php
    $data = '[';
    $label = '[';
    foreach($views as $view){
        $label .= "'".$view['page_name']."',";
        $data .= $view['view_count'].",";
    }
    $data = rtrim($data,",") . "]";
    $label = rtrim($label,",") . "]";
?>
    <canvas id="myChart" width="400" height="120"></canvas>
       
   </div>

</div>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= esc($label,'raw')?>,
        datasets: [{
            label: '# of Views',
            data: <?= esc($data)?>,
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>