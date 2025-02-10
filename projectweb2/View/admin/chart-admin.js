// BIỂU ĐỒ 1(BIỂU ĐỒ ĐƯỜNG)

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Chi Phí',
            data: [12, 19, 3, 5, 2, 3,7,2,11,7,9,2,10],
            borderColor: 'red',
            borderWidth: 3,
            pointBackgroundColor: 'red',
            tension:0.5,
            
            
        },{
            label: 'Lợi Nhuận',
            data: [17, 20, 11, 55, 21, 33,21,24,16,7,12,24,18],
            borderColor: [
                '#0099FF'
            ],
            borderWidth: 3,
            borderRadius: 20,
            pointBackgroundColor: 'blue',
            tension:0.5,
            backdropColor: 'yellow'
            
        
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            }
        }
    }
});

// BIỂU ĐỒ 2(BIỂU ĐỒ TRÒN)
const duong_tron = document.getElementById('myChart-Circle').getContext('2d');
const myChart_2 = new Chart(duong_tron, {
    type: 'doughnut',
    data: {
        labels: ['Apple', 'Xiaomi', 'SamSung', 'Oppo', 'Vivo'],
        datasets: [{
            label: '# of Votes',
            data: [121,32,55,22,44],
            backgroundColor: [
                '#f53b57',
                '#0fbcf9',
                '#ffd32a',
                '#32ff7e',
                '#7d5fff',
            ],
            borderColor: '#0e1726',
            offset: 30

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

// BIỂU ĐỒ 3(BIỂU ĐỒ CỘT)
const cot = document.getElementById('myChart-cot').getContext('2d');
const myChart_3 = new Chart(cot, {
    type: 'bar',
    data: {
        labels: ['Apple', 'Xiaomi', 'SamSung', 'Oppo', 'Vivo'],
        datasets: [{
            label: 'Doanh Thu Ngày',
            data: [121,32,55,222,44,22,90],
            backgroundColor: [
                '#f53b57',
                '#0fbcf9',
                '#ffd32a',
                '#32ff7e',
                '#7d5fff',                
            ],
            borderColor: '#0e1726',
            borderWidth:2
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

