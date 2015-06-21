
function getSessionReport(idSession) {
    $(document).ready(function () {
        var jsonData;
        var jsonData2;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Answer',
                function: 'getSessionAnswers',
                idSession: idSession
            },
            statusCode: {
                200: function (response) {
                    jsonData2 = response;
                    $.each(jsonData2, function (index, o) {

                        $('#chartContent').append('<div id=chart' + index + ' style="min-width: 310px; height: 300px; margin: 0 auto"></div>');
                        generateChart(o, index);
                    });
                },
                404: function () {
                    alert('Erro a criar o Domínio');
                }
            }
        });
    });
}


function generateChart(data, index) {
    if (data.idStandardExercise == 2 || data.idStandardExercise == 1 || data.idStandardExercise == 6) {

        $('#chart' + index).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: data.name
            },
            xAxis: {
                categories: ['Tentativas', 'Erros', 'Acertos', 'Tempo']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                    name: 'Exercícios',
                    data: [
                        ['Tentativas', parseInt(data.attempts)],
                        ['Erros', parseInt(data.wrongHits)],
                        ['Acertos', parseInt(data.rightHits)],
                        ['Tempo', parseInt(data.resolutionTime)]
                    ]
                }]
        });
    } else if (data.idStandardExercise == 7 || data.idStandardExercise == 3) {
        $('#chart' + index).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: data.name
            },
            xAxis: {
                categories: ['Tentativas', 'Erros', 'Acertos', 'Tempo', 'Numero máximo de quadrados']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                    name: 'Exercícios',
                    data: [
                        ['Tentativas', parseInt(data.attempts)],
                        ['Erros', parseInt(data.wrongHits)],
                        ['Acertos', parseInt(data.rightHits)],
                        ['Tempo', parseInt(data.resolutionTime)],
                        ['Numero máximo de quadrados', parseInt(data.numQuadrados)] 
                    ]
                }
            ]

        });
    } else {
            if(data.correctAnswer ==1){
            $('#chart' + index).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: data.name
            },
            xAxis: {
                categories: ['Tempo', 'Certo']
            },
            yAxis: {
                title: {
                    text: 'Certo'
                }
            },
            series: [{
                    name: 'Exercícios',
                    data: [
                        ['Tentativas', parseInt(data.resolutionTime)],
                        ['Certo', 50]
                    ]
                }
            ]

        });
       }else {
            $('#chart' + index).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: data.name
            },
            xAxis: {
                categories: ['Tempo', 'Certo', 'Errado']
            },
            yAxis: {
                title: {
                    text: 'Certo'
                }
            },
            series: [{
                    name: 'Exercícios',
                    data: [
                        ['Tentativas', parseInt(data.resolutionTime)],
                        ['Certo', 50],
                        ['Errado', 0] 
                    ]
                }
            ]

        }); 
       }
    }
}

