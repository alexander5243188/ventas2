<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('livewire:load', function() {
        //-------------------------------------------------------------------------------------//
        //                        SALES BY MONTH
        // ------------------------------------------------------------------------------------//
        

        //-------------------------------------------------------------------------------------//
        //                        TOP 5 PRODUCTS
        // ------------------------------------------------------------------------------------//
        var optionsTop = {
            series: [
                parseFloat(@this.top5Data[0]['total']),
                parseFloat(@this.top5Data[1]['total']),
                parseFloat(@this.top5Data[2]['total']),
                parseFloat(@this.top5Data[3]['total']),
                parseFloat(@this.top5Data[4]['total']),
                parseFloat(@this.top5Data[5]['total']),
                parseFloat(@this.top5Data[6]['total']),
                parseFloat(@this.top5Data[7]['total']),
                parseFloat(@this.top5Data[8]['total']),
                parseFloat(@this.top5Data[9]['total'])
            ],
            chart: {
                height: 392,
                type: 'donut',
            },
            labels: [@this.top5Data[0]['product'],
                @this.top5Data[1]['product'],
                @this.top5Data[2]['product'],
                @this.top5Data[3]['product'],
                @this.top5Data[4]['product'],
                @this.top5Data[5]['product'],
                @this.top5Data[6]['product'],
                @this.top5Data[7]['product'],
                @this.top5Data[8]['product'],
                @this.top5Data[9]['product']
            ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chartTop5"), optionsTop);
        chart.render();
    })



</script>