$(document).ready(function () {
    $("button#confsub").click(function(){
        var nome = $("input#nome").val();
        var email = $("input#email").val();
        var login = $("input#login").val();
        var senha = $("input#senha").val();
        var telefone = $("input#telefone").val();
        var cidade = $("input#cidade").val();
        var escola = $("input#escola").val();
        var serie = $("input#serie").val();
        var tutor = $("input#ctutor").val();
        var id = $("input#id").val();
        var apelido = $("input#apelido").val();
        $.ajax({
            type: "POST",
            url: "/desafio/php/conf.php", 
            data:{
                nome: nome,
                apelido: apelido,
                login: login,
                email: email,
                senha: senha,
                telefone:telefone,
                cidade: cidade,
                escola: escola,
                serie: serie,
                tutor: tutor,
                id: id
            },
            success: function(msg){
                alertify.success(msg);
                $("#configuracoes").modal('hide'); //hide popup 
                if(apelido){
                $("a#nome").html('<i class="fa fa-user"></i> ' + apelido + '<b class="caret"></b>');
                };
                location.reload();
            },
            error: function(){
                alert("Erro AJAX ao editar conta!");
            }
        });
    });
});
$("li#atualtab").html('<i class="fa fa-user"></i> Estatísticas');
$(document).ready(function () {
        $("a#acontas").click(function(){
            $("li#atualtab").html('<i class="fa fa-user"></i> Contas');
        });
        $("a#aestatisticas").click(function(){
            $("li#atualtab").html('<i class="fa fa-user"></i> Estatísticas');
        });
        $("a#amissoes").click(function(){
            $("li#atualtab").html('<i class="fa fa-user"></i> Missões');
        });
});


$(document).ready(function () {
            $("button#ucriar").click(function(){
                var nome = $("input#unome").val();
                var apelido = $("input#uapelido").val();
                var telefone = $("input#utelefone").val();
                var nasc = $("input#unasc").val();
                var email = $("input#uemail").val();
                var escola = $("input#uescola").val();
                var cidade = $("input#ucidade").val();
                var serie = $("input#userie").val();
                var autoriza = $("input#uautoriza").val();
                var login = $("input#uflogin").val();
                var senha = $("input#upassword").val();
                var tipo = $("input#utipo").val();
                $.ajax({
                    type: "POST",
                    url: "/desafio/php/cria.php", 
                    data:{
                        nome:nome,
                        apelido:apelido,
                        telefone:telefone,
                        nasc:nasc,
                        email:email,
                        escola:escola,
                        cidade:cidade,
                        serie:serie,
                        autoriza:autoriza,
                        login:login,
                        senha:senha,
                        tipo:tipo
                    },
                    success: function(msg){
                    alertify.success(msg);
                        $("#modal-user").modal('hide'); //hide popup 
                        location.reload();
                    },
                    error: function(){
                        alertify.success("Form falhou");
                    }
                });
            });
        });
$(document).ready(function () {
            $("button#acriar").click(function(){
                var nome = $("input#anome").val();
                var apelido = $("input#aapelido").val();
                var telefone = $("input#atelefone").val();
                var nasc = $("input#anasc").val();
                var email = $("input#aemail").val();
                var escola = $("input#aescola").val();
                var cidade = $("input#acidade").val();
                var serie = $("input#aserie").val();
                var autoriza = $("input#aautoriza").val();
                var login = $("input#aflogin").val();
                var senha = $("input#apassword").val();
                var tipo = $("input#atipo").val();
                $.ajax({
                    type: "POST",
                    url: "/desafio/home/php/cria.php", 
                    data:{
                        nome:nome,
                        apelido:apelido,
                        telefone:telefone,
                        nasc:nasc,
                        email:email,
                        escola:escola,
                        cidade:cidade,
                        serie:serie,
                        autoriza:autoriza,
                        login:login,
                        senha:senha,
                        tipo:tipo
                    },
                    success: function(msg){
                    alertify.success(msg);
                        $("#modal-admin").modal('hide'); //hide popup 
                        location.reload();
                    },
                    error: function(){
                        alertify.success("Form falhou");
                    }
                });
            });
        });
$(document).ready(function () {
            $("button#tcriar").click(function(){
                var nome = $("input#tnome").val();
                var apelido = $("input#tapelido").val();
                var telefone = $("input#ttelefone").val();
                var nasc = $("input#tnasc").val();
                var email = $("input#temail").val();
                var escola = $("input#tescola").val();
                var cidade = $("input#tcidade").val();
                var serie = $("input#tserie").val();
                var autoriza = $("input#tautoriza").val();
                var login = $("input#tflogin").val();
                var senha = $("input#tpassword").val();
                var tipo = $("input#ttipo").val();
                $.ajax({
                    type: "POST",
                    url: "/desafio/home/php/cria.php", 
                    data:{
                        nome:nome,
                        apelido:apelido,
                        telefone:telefone,
                        nasc:nasc,
                        email:email,
                        escola:escola,
                        cidade:cidade,
                        serie:serie,
                        autoriza:autoriza,
                        login:login,
                        senha:senha,
                        tipo:tipo
                    },
                    success: function(msg){
                    alertify.success(msg);
                        $("#modal-tutor").modal('hide'); //hide popup
                        location.reload(); 
                    },
                    error: function(){
                        alertify.success("Form falhou");
                    }
                });
            });
        });

$(function() {
    $( "input[type='nasc']" ).datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        startView:'decade',
        autoclose:true
        });
});

            function alundel(aldel){ 
                    console.log(aldel);
                    swal({
                      title: "Você tem certeza?",
                      text: "Você nao consiguirá mais recuperar esse usuário!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Deletar",
                      cancelButtonText: "Cancelar",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm) {
                      if (isConfirm) {
                        var tipod = "users";
                        $.ajax({
                            type: "POST",
                            url: "/desafio/home/php/del.php", 
                            data:{
                                idd:aldel,
                                tipod:tipod
                            },
                            success: function(msg){
                                 swal("Deletado!", "O usuário foi deletado com sucesso.", "success");
                                 $('tr#' + aldel).hide();
                                 $("#alundetalhes").modal('hide');
                            },
                            error: function(){
                                swal("Cancelado", "O usuário não foi deletado, Erro no AJAX", "error");
                                $("#alundetalhes").modal('hide');
                            }
                        });
                      } else {
                        swal("Cancelado", "O usuário não foi deletado.", "error");
                      }
                });
            };


            function missdel(iddel){ 
                
                    console.log(iddel);
                    swal({
                      title: "Você tem certeza?",
                      text: "Você nao consiguirá mais recuperar essa missão!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Deletar",
                      cancelButtonText: "Cancelar",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm) {
                      if (isConfirm) {
                        var tipod = "missoes";
                        $.ajax({
                            type: "POST",
                            url: "/desafio/home/php/del.php", 
                            data:{
                                idd:iddel,
                                tipod:tipod
                            },
                            success: function(msg){
                                 swal("Deletada!", "A missão foi deletada com sucesso.", "success");
                                 $('tr#' + iddel).hide();
                            },
                            error: function(){
                                swal("Cancelado", "A missão não foi deletada, Erro no AJAX", "error");
                            }
                        });
                      } else {
                        swal("Cancelado", "A missão não foi deletada.", "error");
                      }
                });
            };
//del bug            
            function bugiddel(bugiddel){ 
                
                    console.log(bugiddel);
                    swal({
                      title: "Você tem certeza?",
                      text: "Você nao consiguirá mais recuperar esse bug!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Deletar",
                      cancelButtonText: "Cancelar",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm) {
                      if (isConfirm) {
                        var tipod = "bug";
                        $.ajax({
                            type: "POST",
                            url: "/desafio/home/php/del.php", 
                            data:{
                                idd:bugiddel,
                                tipod:tipod
                            },
                            success: function(msg){
                                 swal("Deletada!", "O bug foi deletado com sucesso.", "success");
                                 $('tr#' + bugiddel).hide();
                            },
                            error: function(){
                                swal("Cancelado", "O bug não foi deletado, Erro no AJAX", "error");
                            }
                        });
                      } else {
                        swal("Cancelado", "O bug não foi deletado.", "error");
                      }
                });
            };





//add missão
$(document).ready(function () {
    $("button#htmlbut").click(function(){
        var html = CKEDITOR.instances['htmlmiss'].getData();
        var nome = $("input#htmlnome").val();
        var max = $("input#htmlmax").val();
        $.ajax({
            type: "POST",
            url: "/desafio/php/ms.php", 
            data:{
                max: max,
                nome: nome,
                html: html
            },
            success: function(msg){
                alertify.success(msg);
                location.reload();
            },
            error: function(){
                alertify.error("Erro AJAX ao criar missão");
            }
        });
    });
});

$("li#tuttab").html('<i class="fa fa-user"></i> ID do Tutor');
$(document).ready(function () {
        $("a#aid").click(function(){
            $("li#tuttab").html('<i class="fa fa-user"></i> ID do Tutor');
        });
        $("a#aalun").click(function(){
            $("li#tuttab").html('<i class="fa fa-user"></i> Alunos');
        });
});

//criar pela conta do tut
$(document).ready(function () {
            $("button#mtutcriar").click(function(){
                var nome = $("input#mtutnome").val();
                var apelido = $("input#mtutapelido").val();
                var telefone = $("input#mtuttelefone").val();
                var nasc = $("input#mtutnasc").val();
                var email = $("input#mtutemail").val();
                var escola = $("input#mtutescola").val();
                var cidade = $("input#mtutcidade").val();
                var serie = $("input#mtutserie").val();
                var autoriza = $("input#mtutautoriza").val();
                var login = $("input#mtutflogin").val();
                var senha = $("input#mtutpassword").val();
                var tipo = $("input#mtuttipo").val();
                var tutor = $("input#mtuttutor").val();
                $.ajax({
                    type: "POST",
                    url: "/desafio/php/cria.php", 
                    data:{
                        nome:nome,
                        apelido:apelido,
                        telefone:telefone,
                        nasc:nasc,
                        email:email,
                        escola:escola,
                        cidade:cidade,
                        serie:serie,
                        autoriza:autoriza,
                        login:login,
                        senha:senha,
                        tipo:tipo,
                        tutor:tutor
                    },
                    success: function(msg){
                    alertify.success(msg);
                        $("#modal-tutor").modal('hide'); //hide popup 
                        location.reload();
                    },
                    error: function(){
                        alertify.success("Form falhou");
                    }
                });
            });
        });
$(document).ready(function () {
    $("button#submittutaddid").click(function(){
        var tutor = $("input#tutaddid").val();
        var id = $("input#id").val();
        $.ajax({
            type: "POST",
            url: "/desafio/php/conf.php", 
            data:{
                tutor: tutor,
                id: id
            },
            success: function(msg){
                alertify.success(msg);
                $("#addtutor").modal('hide'); //hide popup 
                location.reload();
            },
            error: function(){
                alert("Erro ao adicionar tutor: AJAX");
            }
        });
    });
});
$(document).ready(function () {
    $("button#deltut").click(function(){
        var id = $("input#id").val();
        var deletar = "1";
        $.ajax({
            type: "POST",
            url: "/desafio/php/conf.php", 
            data:{
                deletar: deletar,
                id: id
            },
            success: function(msg){
                alertify.success(msg);
                location.reload();
            },
            error: function(){
                alert("Tutor desvinculado sem sucesso: ERRO!");
            }
        });
    });
});

function detalhealuno(id){
    $('#alundetalhes').modal('show');
    var count = $('#bodytabela > TR').length;
    count = count + 1;
    var i = 1;
    var array;

                     $.ajax({
                            type: "POST",
                            url: "../home/php/pontmiss.php", 
                            data:{
                                id: id
                            },
                            success: function(msg){            
                               json = msg;
                            console.log(json);
                               arr = JSON.parse(json);
                             console.log("count: "+count);                  
                               while(i < count){   
                               if(arr[0][i] == ""){                                 
                                        $('#ponto'+i).html("-");
                                    }else{
                                        if(arr[0][i] == $('#maxim'+i).text()){
                                            $('#ponto'+i).html(arr[0][i]+'  <span class="label label-success">Maximo</span>');  
                                        }else{
                                            $('#ponto'+i).html(arr[0][i]);  
                                        }
                                    }
                                i++;
                               }
                            
                            },
                            error: function(){
                                alert("AJAX Error: Ao abrir detalhes do aluno.");
                            }
                        });


};



$(document).ready(function () {
    $("button#matarbug").click(function(){
        var id = $("input#id").val();
        var onde = $("input#onde").val();
        var oque = $("input#oque").val();
        var url = $("input#url").val();
        if(oque == "" || onde == ""){
            swal({
                      title: "Campo Vazio!",
                      text: "Assim não vamos entender o que você quer reportar, mandar mesmo assim?",
                      type: "error",
                      showCancelButton: true,
                      confirmButtonClass: "btn-success",
                      confirmButtonText: "Sim",
                      cancelButtonText: "Cancelar",
                      cancelButtonClass: "btn-danger",
                      closeOnConfirm: true,
                      closeOnCancel: true
                    },
                    function(isConfirm) {    
                    if(isConfirm){       
                        $.ajax({
                        type: "POST",
                        url: "/desafio/home/php/bug.php", 
                        data:{
                            url:url,
                            oque: oque,
                            onde: onde,
                            id: id
                        },
                        success: function(msg){
                            alertify.success(msg);
                            $("#erro").modal('hide'); //hide popup 
                        },
                        error: function(){
                            alertify.success("Ops! Bug ao enviar um bug!: AJAX");
                        }

                    });
                }
                });
        }else{
            $.ajax({
                        type: "POST",
                        url: "/desafio/home/php/bug.php", 
                        data:{
                            url:url,
                            oque: oque,
                            onde: onde,
                            id: id
                        },
                        success: function(msg){
                            alertify.success(msg);
                            $("#erro").modal('hide'); //hide popup 
                        },
                        error: function(){
                            alertify.success("Ops! Bug ao enviar um bug!: AJAX");
                        }

                    });
        }
       
    });
});

$(document).ready(function () {
    $("a#contdup").click(function(){
        $.ajax({
            url: "/desafio/php/dup.php", 
            beforeSend: function(){
                $("a#contdup").html('<i class="fa fa-cog fa-spin"></i> Carregando...');
            },
            success: function(msg){
                alertify.success(msg);
                $("a#contdup").html('Deletar contas duplicadas <i class="fa fa-chevron-circle-right"></i>');
                $("div#nomecontdup").html('Nenhuma conta duplicada!');
            },
            error: function(){
                alertify.success("Ops! Bug ao deletar contas duplicadas!: AJAX");
            },
            cache: false
        });
    });
});
