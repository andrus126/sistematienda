<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container"></div>
<script type="text/javascript">

Highcharts.chart('container', {

    title: {
        text: 'Estadistica de Ventas'
    },

    subtitle: {
        text: 'Ventas Generales'
    },

    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
	 xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },

    series: [{
        name: 'Ventas',
        data: [<?=$ventasmeses ;?>]
    }, {
        name: 'Compras',
        data: [10, 20, 30, 10, 20, 14, 16, 16]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>