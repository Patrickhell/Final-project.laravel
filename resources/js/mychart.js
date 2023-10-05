import Chart from 'chart.js/auto';

const labels = [
    'Gennaio',
    'Febbraio',
    'Marzo',
    'Aprile',
    'Maggio',
    'Giugno',
    'Luglio' ,
    'Agosto',
    'Settembre',
    'Ottobre' ,
    'Novembre',
    'Dicembre',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'Media Voto',
        backgroundColor: '#00c3a5',
        borderColor: 'rgb(255, 99, 132)',
        data: [1 , 3 , 3.5 , 3.5 , 2.5 , 3 , 1.5 , 3.5 , 2 , 3, 3.5 , 4.5],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        scales: {
        y:{
            min: 0,
            max: 5,
        }},
    
    }
};

new Chart(
    document.getElementById('myChart'),
    config
);
