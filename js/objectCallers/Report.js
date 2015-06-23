
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
var answers = [];
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
                        $('#chartContent').append('<div id=chart' + index + ' style="min-width: 310px; height: 300px; margin: 0 auto"></div>');
                         answers = [];
                    if (o.idStandardExercise == 2 || o.idStandardExercise == 1 || o.idStandardExercise == 6) {
                        answers.push(
                                ['Tentativas', parseInt(o.attempts)],
                                ['Erros', parseInt(o.wrongHits)],
                                ['Acertos', parseInt(o.rightHits)],
                                ['Tempo', parseInt(o.resolutionTime)]
                            
                            );
                    } else if (o.idStandardExercise == 7 || o.idStandardExercise == 3) {
                    
                        answers.push(
                   
                                ['Tentativas', parseInt(o.attempts)],
                                ['Erros', parseInt(o.wrongHits)],
                                ['Acertos', parseInt(o.rightHits)],
                                ['Tempo', parseInt(o.resolutionTime)],
                                ['Numero máximo de quadrados', parseInt(o.numQuadrados)]
                            
                        );
                    } else {
                        if (o.correctOption == 1) {
                            answers.push(
                                ['Tentativas', parseInt(o.resolutionTime)],
                                ['Certo', 50]                       
//                                
                            );
                        }else {
                            
                            answers.push(
                                                           
                                ['Tentativas', parseInt(o.resolutionTime)],
                                ['Certo', 0]
                        
                               );                            
                        }
                    }                        
//                      getAnswersHealthProfessional(idPatient, '2',o, index);
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

//function getAnswersHealthProfessional(idPatient, idHP, lista, index1) {
//    var jsonData;
//    $.ajax({
//        type: "POST",
//        url: "http://localhost/nep-um-web/api/",
//        dataType: 'json',
//        data: {
//            object: 'Answer',
//            function: 'getAnswersByDomain',
//            idHealthProfessional: idHP,
//            idPatient: idPatient,
//            idExercise: lista.idExercise,
//            async:false
//        },
//        statusCode: {
//            200: function (response) {
//                jsonData = response;
//                 answers = [];
//                $.each(jsonData, function (index, o) {
//                   
//                    if (o.idStandardExercise == 2 || o.idStandardExercise == 1 || o.idStandardExercise == 6) {
//                        answers.push({
//                            data:[
//                                ['Tentativas', parseInt(o.attempts)],
//                                ['Erros', parseInt(o.wrongHits)],
//                                ['Acertos', parseInt(o.rightHits)],
//                                ['Tempo', parseInt(o.resolutionTime)]
//                        ]
//                        }
//                        );
//                    } else if (o.idStandardExercise == 7 || o.idStandardExercise == 3) {
//                        answers.push({
//                                data:[  
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
//                                data: [
//                                ['Tentativas', parseInt(o.resolutionTime)],
//                                ['Certo', 50]
//                                ],
//                                
//                            });
//                        }else {
//                            answers.push(
//                                    {
//                                  data: [
//                                ['Tentativas', parseInt(o.resolutionTime)],
//                                ['Certo', 0]
//                                  ],
//                                
//                                    });                            
//                        }
//                    }
//                });
//                generateChart(index1, lista);
//            },
//            404: function () {
//                alert('Erro a gerar relatório');
//            }
//        }
//    });
//}

function generateChart(index, lista) {
    alert(lista.idStandardExercise);
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
            series: [{
                    name: 'Exercícios',
                    data: answers
                }]
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

              series: [{
                    name: 'Exercícios',
                    data: answers
                }]

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
            series: [{
                    name: 'Exercícios',
                    data: answers
                }]

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
            series: [{
                    name: 'Exercícios',
                    data: answers
                }]

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

