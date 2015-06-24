var answers = [];
function getSessionReport(idSession) {
    $(document).ready(function () {
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
                        answers = [];
                        $('#chartContent').append('<div id=chart' + index + ' style="min-width: 310px; height: 300px; margin: 0 auto"></div>');
               if (o.idStandardExercise == 2 || o.idStandardExercise == 1 || o.idStandardExercise == 6) {
                        answers.push(
                            {
                                name: o.idExercise,
                                data: [
                                ['Tentativas', parseInt(o.attempts)],
                                ['Erros', parseInt(o.wrongHits)],
                                ['Acertos', parseInt(o.rightHits)],
                                ['Tempo', parseInt(o.resolutionTime)]
                            ]
                            }
                        
                            );
                    } else if (o.idStandardExercise == 7 || o.idStandardExercise == 3) {
                    
                        answers.push(
                                {
                                name: o.idExercise,        
                                data: [
                                ['Tentativas', parseInt(o.attempts)],
                                ['Erros', parseInt(o.wrongHits)],
                                ['Acertos', parseInt(o.rightHits)],
                                ['Tempo', parseInt(o.resolutionTime)],
                                ['Numero máximo de quadrados', parseInt(o.numQuadrados)]
                                ]
                            }
                        );
                    } else {
                        if (o.correctOption == 1) {
                            answers.push({
                               name: o.idExercise,
                               data:[     
                                ['Tentativas', parseInt(o.resolutionTime)],
                                ['Certo', 50]
                               ]
                            }   
                            );
                        }else {
                            
                            answers.push({
                               name: o.idExercise,
                               data:[     
                                ['Tentativas', parseInt(o.resolutionTime)],
                                ['Certo', 0]
                               ]
                            }   
                        
                               );                            
                        }
                    }                        
                        generateChart(index, o);
                    });
                },
                404: function () {
                    alert('Erro a carregar gráfico');
                }
            }
        });
    });
}

function getDomainReport(idDomain, idPatient) {
    $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
  
            data: {
                object: 'Answer',
                function: 'getAnswersByDomain',
                idDomain: idDomain,
                idPatient: idPatient
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    $.each(jsonData, function (index, o) {
                        answers = [];
                    $('#chartContent').append('<div id=chart' + index + ' style="min-width: 310px; height: 300px; margin: 0 auto"></div>');

                    if (o.idStandardExercise == 2 || o.idStandardExercise == 1 || o.idStandardExercise == 6) {
                        answers.push(
                            {
                                name: o.idExercise,
                                data: [
                                ['Tentativas', parseInt(o.attempts)],
                                ['Erros', parseInt(o.wrongHits)],
                                ['Acertos', parseInt(o.rightHits)],
                                ['Tempo', parseInt(o.resolutionTime)]
                            ]
                            }
                        
                            );
                    } else if (o.idStandardExercise == 7 || o.idStandardExercise == 3) {
                    
                        answers.push(
                                {
                                name: o.idExercise,        
                                data: [
                                ['Tentativas', parseInt(o.attempts)],
                                ['Erros', parseInt(o.wrongHits)],
                                ['Acertos', parseInt(o.rightHits)],
                                ['Tempo', parseInt(o.resolutionTime)],
                                ['Numero máximo de quadrados', parseInt(o.numQuadrados)]
                                ]
                            }
                        );
                    } else {
                        if (o.correctOption == 1) {
                            answers.push({
                               name: o.idExercise,
                               data:[     
                                ['Tentativas', parseInt(o.resolutionTime)],
                                ['Certo', 50]
                               ]
                            }   
                            );
                        }else {
                            
                            answers.push({
                               name: o.idExercise,
                               data:[     
                                ['Tentativas', parseInt(o.resolutionTime)],
                                ['Certo', 0]
                               ]
                            }   
                        
                               );                            
                        }
                    }                        
//                      getAnswersHealthProfessional(idPatient, '1',o, index);
//                      answers = [];
                       generateChart(index, o);
                    });
                },
                404: function () {
                    alert('Erro a gerar relatório');
                }
            }
        });
    });
}

function getStatistics(){
        $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
  
            data: {
                object: 'Report',
                function: 'getStatistics',
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    $('#chartContent').append('<div id=chart' + 0 + ' style="min-width: 310px; height: 300px; margin: 3em 18em 0 0"></div>');                   
                    generateStatistics(jsonData);
                },
                404: function () {
                    alert('Erro a gerar relatório');
                }
            }
        });
    });
}

function generateStatistics(jsonData){
    $('#chart' + 0).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Estatisticas'
            },
            xAxis: {
                categories: ['Profissionais de Saúde', 'Profissionais de Desenvolvimento', 'Pacientes']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                name: 'Estatisticas',
                data: [
                    
                    ['Profissionais de Saúde', jsonData.healthProfessionals],
                    ['Profissionais de Desenvolvimento', jsonData.development],
                    ['Pacientes', jsonData.patients]
                ]
                    }] 
        });

}
//function getAnswersHealthProfessional(idPatient, idHP, lista, index1) {
//    var jsonData;
//    $.ajax({
//        type: "POST",
//        url: "http://localhost/nep-um-web/api/",
//        dataType: 'json',
//        async:false,
//        data: {
//            object: 'Answer',
//            function: 'getAnswersByDomain',
//            idHealthProfessional: idHP,
//            idPatient: idPatient,
//            idExercise: lista.idExercise
//        },
//        statusCode: {
//            200: function (response) {
//                jsonData = response;
//                $.each(jsonData, function (index, o) {                   
//                    if (lista.idStandardExercise == 2 || lista.idStandardExercise == 1 || lista.idStandardExercise == 6) {
//                        answers.push(
//                            {
//                                name: o.idExercise,
//                                data: [
//                                ['Tentativas', parseInt(o.attempts)],
//                                ['Erros', parseInt(o.wrongHits)],
//                                ['Acertos', parseInt(o.rightHits)],
//                                ['Tempo', parseInt(o.resolutionTime)]
//                            ]
//                            }
//                        
//                            );
//                    } else if (lista.idStandardExercise == 7 || lista.idStandardExercise == 3) {
//                        answers.push(
//                                {
//                                name: o.idExercise,        
//                                data: [
//                                ['Tentativas', parseInt(o.attempts)],
//                                ['Erros', parseInt(o.wrongHits)],
//                                ['Acertos', parseInt(o.rightHits)],
//                                ['Tempo', parseInt(o.resolutionTime)],
//                                ['Numero máximo de quadrados', parseInt(o.numQuadrados)]
//                                ]
//                            }
//                        );
//                    } else {
//                        if (o.correctOption == 1) {
//                            answers.push({
//                               name: o.idExercise,
//                               data:[     
//                                ['Tentativas', parseInt(o.resolutionTime)],
//                                ['Certo', 50]
//                               ]
//                            }   
//                            );
//                        }else {
//                            answers.push({
//                               name: o.idExercise,
//                               data:[     
//                                ['Tentativas', parseInt(o.resolutionTime)],
//                                ['Certo', 0]
//                               ]
//                            }   
//                            );                            
//                        }
//                    }
////                     generateChart(index1, lista);
//                     
//                });
//               
//                
//            },
//            404: function () {
//                alert('Erro a gerar relatório');
//            }
//        }
//    });
//}

//FUNCIONA PARA RELATORIOS POR DOMINIO
function generateChart(index, lista) {
    if (lista.idStandardExercise == 2 || lista.idStandardExercise == 1 || lista.idStandardExercise == 6) {
        $('#chart' + index).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: lista.nameStandard
            },
            xAxis: {
                categories: ['Tentativas', 'Erros', 'Acertos', 'Tempo']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: answers
        });
    } else if (lista.idStandardExercise == 7 || lista.idStandardExercise == 3) {
        $('#chart' + index).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: lista.name
            },
            xAxis: {
                categories: ['Tentativas', 'Erros', 'Acertos', 'Tempo', 'Numero máximo de quadrados']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },

              series: answers

        });
    } else {
        if (lista.correctAnswer == 1) {
            $('#chart' + index).highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: lista.name
                },
                xAxis: {
                    categories: ['Tempo', 'Certo']
                },
                yAxis: {
                    title: {
                        text: 'Certo'
                    }
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                            style: {
                                textShadow: '0 0 3px black'
                            }
                        }
                    }
                },
            series: answers

            });
        } else {
            $('#chart' + index).highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: lista.name
                },
                xAxis: {
                    categories: ['Tempo', 'Certo']
                },
                yAxis: {
                    title: {
                        text: 'Certo'
                    }
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                            style: {
                                textShadow: '0 0 3px black'
                            }
                        }
                    }
                },
            series: answers

            });
        }
    }
}

//function generateChart(index, data) {
//    if (data.idStandardExercise == 2 || data.idStandardExercise == 1 || data.idStandardExercise == 6) {
//        $('#chart' + index).highcharts({
//            chart: {
//                type: 'column'
//            },
//            title: {
//                text: data.nameStandard
//            },
//            xAxis: {
//                categories: ['Tentativas', 'Erros', 'Acertos', 'Tempo']
//            },
//            yAxis: {
//                title: {
//                    text: ''
//                }
//            },
//            plotOptions: {
//                column: {
//                    stacking: 'normal',
//                    dataLabels: {
//                        enabled: true,
//                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
//                        style: {
//                            textShadow: '0 0 3px black'
//                        }
//                    }
//                }
//            },
//            series: [{
//                    name: 'Exercícios',
//                    data: [
//                        ['Tentativas', parseInt(data.attempts)],
//                        ['Erros', parseInt(data.wrongHits)],
//                        ['Acertos', parseInt(data.rightHits)],
//                        ['Tempo', parseInt(data.resolutionTime)]
//                    ]
//                }]
//        });
//    } else if (data.idStandardExercise == 7 || data.idStandardExercise == 3 || data2.idStandardExercise == 7 || data2.idStandardExercise == 3) {
//        $('#chart' + index).highcharts({
//            chart: {
//                type: 'column'
//            },
//            title: {
//                text: data.name
//            },
//            xAxis: {
//                categories: ['Tentativas', 'Erros', 'Acertos', 'Tempo', 'Numero máximo de quadrados']
//            },
//            yAxis: {
//                title: {
//                    text: ''
//                }
//            },
//            plotOptions: {
//                column: {
//                    stacking: 'normal',
//                    dataLabels: {
//                        enabled: true,
//                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
//                        style: {
//                            textShadow: '0 0 3px black'
//                        }
//                    }
//                }
//            },
//            series: [{
//                    name: 'Exercícios',
//                    data: [
//                        ['Tentativas', parseInt(data.attempts)],
//                        ['Erros', parseInt(data.wrongHits)],
//                        ['Acertos', parseInt(data.rightHits)],
//                        ['Tempo', parseInt(data.resolutionTime)],
//                        ['Numero máximo de quadrados', parseInt(data.numQuadrados)]
//                    ]
//                }
//            ]
//
//        });
//    } else {
//        if (data.correctAnswer == 1) {
//            $('#chart' + index).highcharts({
//                chart: {
//                    type: 'column'
//                },
//                title: {
//                    text: data.name
//                },
//                xAxis: {
//                    categories: ['Tempo', 'Certo']
//                },
//                yAxis: {
//                    title: {
//                        text: 'Certo'
//                    }
//                },
//                plotOptions: {
//                    column: {
//                        stacking: 'normal',
//                        dataLabels: {
//                            enabled: true,
//                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
//                            style: {
//                                textShadow: '0 0 3px black'
//                            }
//                        }
//                    }
//                },
//                series: [{
//                        name: 'Exercícios',
//                        data: [
//                            ['Tentativas', parseInt(data.resolutionTime)],
//                            ['Certo', 50]
//                        ]
//                    }
//                ]
//
//            });
//        } else {
//            $('#chart' + index).highcharts({
//                chart: {
//                    type: 'column'
//                },
//                title: {
//                    text: data.name
//                },
//                xAxis: {
//                    categories: ['Tempo', 'Certo']
//                },
//                yAxis: {
//                    title: {
//                        text: 'Certo'
//                    }
//                },
//                plotOptions: {
//                    column: {
//                        stacking: 'normal',
//                        dataLabels: {
//                            enabled: true,
//                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
//                            style: {
//                                textShadow: '0 0 3px black'
//                            }
//                        }
//                    }
//                },
//                series: [{
//                        name: 'Exercícios',
//                        data: [
//                            ['Tentativas', parseInt(data.resolutionTime)],
//                            ['Certo', 0]
//                        ]
//                    }
//                ]
//
//            });
//        }
//    }
//}

