
<script src="Master/vendors/Chart.js/dist/Chart.min.js"></script>
<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$( document ).ready(function() {
    build_chart();
});
function build_chart(data){
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['低年級', '中年級', '高年級'],
    datasets: [{
      backgroundColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1,
      label: '可信度',
      data: [{!!$accuracy[0]!!}, {!!$accuracy[1]!!}, {!!$accuracy[2]!!}]
    }]
  }
  });
}
</script>
<style>
  canvas {
    background-color: rgb(190, 203, 229);
}
</style>
