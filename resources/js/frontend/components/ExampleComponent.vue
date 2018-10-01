<template>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-code"></i> Example Vue Component
        </div>
        <div class="card-body">
            I'm an example Vue component!
            <hr>
            <GChart
                :settings="{packages: ['bar']}"
                :data="chartData"
                :options="chartOptions"
                :createChart="(el, google) => new google.charts.Bar(el)"
                @ready="onChartReady"
            />
        </div>
    </div>
</template>

<script>
    import {GChart} from 'vue-google-charts'

    export default {
        data () {
            return {
                chartsLib: null,
                // Array will be automatically processed with visualization.arrayToDataTable function
                chartData: [
                    ['Year', 'Ventas', 'Gastos', 'Lucro'],
                    ['2014', 1000, 400, 200],
                    ['2015', 1170, 460, 250],
                    ['2016', 660, 1120, 300],
                    ['2017', 1030, 540, 350]
                ]
            }
        },
        components: {
            GChart
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            chartOptions () {
                if (!this.chartsLib) return null
                return this.chartsLib.charts.Bar.convertOptions({
                    chart: {
                        title: 'Rendimiento de la compañia',
                        subtitle: 'Ventas, Gastos y lucro: 2014 - 2017'
                    },
                    bars: 'vertical', // Required for Material Bar Charts.
                    hAxis: { format: 'decimal' },
                    height: 400,
                    colors: ['#1b9e77', '#d95f02', '#7570b3']
                })
            }
        },
        methods: {
            onChartReady (chart, google) {
                this.chartsLib = google
            }
        }
    }
</script>
