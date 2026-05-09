import * as echarts from 'echarts';

export function initDashboardChart() {

    const chartDom = document.getElementById('chart');

    if (!chartDom) return;

    const pemasukan = JSON.parse(
        chartDom.dataset.pemasukan
    );

    const pengeluaran = JSON.parse(
        chartDom.dataset.pengeluaran
    );

    const existingChart = echarts.getInstanceByDom(chartDom);

    if (existingChart) {
        existingChart.dispose();
    }

    const myChart = echarts.init(chartDom);

    const option = {
        tooltip: {
            trigger: 'axis',
        },

        legend: {
            top: 20,
        },

        grid: {
            top: 90,
            left: 50,
            right: 30,
            bottom: 50,
        },

        xAxis: {
            type: 'category',

            data: [
                'Jan', 'Feb', 'Mar', 'Apr',
                'Mei', 'Jun', 'Jul', 'Agu',
                'Sep', 'Okt', 'Nov', 'Des',
            ],
        },

        yAxis: {
            type: 'value',
        },

        series: [
            {
                name: 'Pemasukan',
                type: 'line',
                smooth: true,
                data: pemasukan,
            },

            {
                name: 'Pengeluaran',
                type: 'line',
                smooth: true,
                data: pengeluaran,
            },
        ],
    };

    myChart.setOption(option);
}