
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
                 getExercisesBySession(o.idSession, o.name, o.deadline);
             });
            },
            500: function () {
                console.error('BD Error');
            }
        }
    });
});


function getExercisesBySession(Session, name, deadline){
    var jsonData;
     $.ajax({
        type: "POST",
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Session',
            function: 'getExercisesBySession',
            idSession: Session
        },
        statusCode: {
            200: function (response) {
                 jsonData = response;
                 tabela(jsonData, name, deadline);
            },
            404: function () {
                console.error('BD Error');
            }
        }
    });   
 }
 
//function getBlockBySession(session){
//     var jsonData;
//     $.ajax({
//        type: "POST",
//        url: "http://localhost/nep-um-web/api/",
//        dataType: 'json',
//        data: {
//            object: 'Block',
//            function: 'getBlockBySession',
//            idSession: session
//        },
//        statusCode: {
//            200: function (response) {
//                 jsonData = response;
//                 var select = $('#supportThings');
//                 var input = $('<input type="hidden" value="'+jsonData.name+'" id="nameBlock"/>');
//                 select.append(input);
//            },
//            404: function () {
//                console.error('BD Error');
//            }
//        }
//    });    
// }
 
   var data = [];  
   function tabela(data2, name, deadline){
   $.each(data2, function(index,o){
         data.push({'session':name, 'name':'<a href="../Exercises/exercisesPage.php?gameChoosen='+o.idExercise+'&structure='+o.idStandardExercise+'">'+o.eName+'</a>', 
             'structure': o.stdName, 'image':'<img src="'+o.picture+'" style: width=100px height=75px></img>', 'deadline': deadline});    
            });
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
