var chart = Highcharts.chart('container', {
    
        chart: {
            type: 'column'
        },
    
        title: {
            text: '2017 Yearly Monitoring Report'
        },
    
        subtitle: {
            text: 'Communication Department of South-Cental Luzon Conference'
        },
    
        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical'
        },
    
        xAxis: {
            categories: [
                'members following the yearly bible reading plan', 
                'members following the 777 Program', 
                'church following the hour of worship format', 
                'members following the revive by his prophet initiative', 
                'church with directional signs',
                'cable head ends carrying hope channel'
            ],
            labels: {
                x: -10
            }
        },
    
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Amount'
            }
        },
    
        series: [{
            name: 'Last year',
            data: [1, 4, 3, 4 , 5, 6]
        }, {
            name: 'Current year',
            data: [6, 4, 2, 5, 2, 4]
        }],
    
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -5
                        },
                        title: {
                            text: null
                        }
                    },
                    subtitle: {
                        text: null
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        }
    });
    
    $('#small').click(function () {
        chart.setSize(400, 300);
    });
    
    $('#large').click(function () {
        chart.setSize(600, 300);
    });
    