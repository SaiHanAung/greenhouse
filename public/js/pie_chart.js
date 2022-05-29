var pie_basic_element = document.getElementById('pie_basic');
if (pie_basic_element) {
    var pie_basic = echarts.init(pie_basic_element);
    pie_basic.setOption({
        color: [
            '#2ec7c9', '#b6a2de', '#5ab1ef', '#ffb980', '#d87a80',
            '#8d98b3', '#e5cf0d', '#97b552', '#95706d', '#dc69aa',
            '#07a2a4', '#9a7fd1', '#588dd5', '#f5994e', '#c05050',
            '#59678c', '#c9ab00', '#7eb00a', '#6f5553', '#c14089'
        ],

        textStyle: {
            fontFamily: 'Prompt, sans-serif',
            fontSize: 15
        },

        title: {
            text: '',
            left: 'center',
            textStyle: {
                fontSize: 17,
                fontWeight: 500,
            },
            subtextStyle: {
                fontSize: 12
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [10, 15],
            textStyle: {
                fontSize: 13,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} บาท ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',
            data: ['เมล็ด',
                'ปุ๋ย',
                'ค่าแรง',
                'ค่าอื่นๆ'
            ],
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'ค่าใช้จ่าย',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: [{
                    value: {
                        {
                            $seed
                        }
                    },
                    name: 'เมล็ด'
                },
                {
                    value: {
                        {
                            $fertilizer
                        }
                    },
                    name: 'ปุ๋ย'
                },
                {
                    value: {
                        {
                            $wage
                        }
                    },
                    name: 'ค่าแรง'
                },
                {
                    value: {
                        {
                            $etc
                        }
                    },
                    name: 'ค่าอื่นๆ'
                }
            ]
        }]
    });
}