 var data = [];  
$(document).ready(function () {
    var jsonData;
    $.ajax({
        type: "POST",
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        async: false,
        data: {
            object: 'Session',
            function: 'getSessionPatient',
            idPatient: $('#idPatientNot').val()
        },
        statusCode: {
            200: function (response) {
                 jsonData = response;
                 $.each(jsonData, function (index, o) {
                 getExercisesBySession(o);
             });
           
              tabela();
            },
            500: function () {
                console.error('BD Error');
            }
        }
    });
});


function getExercisesBySession(lista){
    var jsonData;
     $.ajax({
        type: "POST",
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        async:false,
        data: {
            object: 'Session',
            function: 'getExercisesBySession',
            idSession: lista.idSession
        },
        statusCode: {
            200: function (response) {
                 jsonData = response;
                 $.each(jsonData, function(index,o){
                 countAnswers(lista.idSession, o, lista.name, lista.deadline);
               
                });
               
            },
            404: function () {
                console.error('BD Error');
            }
        }
    });   
 }
 

   function tabela(){
//   $.each(data2, function(index,o){
//         data.push({'session':name, 'name':'<a href="../Exercises/exercisesPage.php?id='+Session+'&gameChoosen='+o.idExercise+'&structure='+o.idStandardExercise+'">'+o.eName+'</a>', 
//             'structure': o.stdName, 'image':'<img src="'+o.picture+'" style: width=100px height=75px></img>', 'deadline': deadline});    
//            });
           $('#dg').datagrid({
                columns:[[
                {field:'session',width:80, hidden:true},
                {field:'name', title:'Nome Exercício',width:60},
                {field:'structure',width:60, title:'Estrutura'},
                {field:'image', width:60, title:'Imagem', align:'center'},
                {field:'deadline', width:35, title:'Data Limite'}
                ]],
                singleSelect:true,
                collapsible:true,
                rownumbers:true,
                fitColumns:true,
                data:data,
                view:groupview,
                groupField:'session',
                groupFormatter:function(value,rows){
                    return value + ' - ' + rows.length + ' Exercício(s)';
                }
            
           });
}

function countAnswers(session, o, name, deadline){
    var jsonData2;
     $.ajax({
        async:false,
        type: "POST",
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Answer',
            function: 'countAnswers',
            idSession: session,
            idExercise: o.idExercise
        },
        statusCode: {
            200: function (response) {
                 jsonData2 = response;
                 if(jsonData2.num < o.numTimes){
                 data.push({'session':name, 'name':'<a href="../Exercises/exercisesPage.php?id='+session+'&gameChoosen='+o.idExercise+'&structure='+o.idStandardExercise+'">'+o.eName+'</a>', 
                'structure': o.stdName, 'image':'<img src="'+o.picture+'" style: width=100px height=75px></img>', 'deadline': deadline});     
                 }
                 
            },
            404: function () {
                console.error('BD Error');
            }
        }
    });
}
