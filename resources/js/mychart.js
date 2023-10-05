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
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0.5 , 2 , 2.5 , 1.5 , 3 , 2.5 , 3 , 3.5 , 2.5 , 2 , 3 , 2.5],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {
        scales:{
            y:{
                max: 5,
                min: 0,
            }
        }
    }
};

new Chart(
    document.getElementById('myChart'),
    config
);
