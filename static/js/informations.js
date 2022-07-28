$(document).ready(function() {
    //valida as inputs
    let inp1 = false;
    let inp2 = false;
    let inp3 = false;
    let inp4 = true;
    let inp5 = true;

    $(".list-group-item").click(function() {
        let title = this.text
        $("#titleModalUsefulLinks").text(title)
        let line = ''
        if (title == "Traje") {
            line = `<p style="text-align: center;">Vista-se conforme se sentir à vontade.</p>
            <p style="text-align: center;">A sua presença é o mais importante para nós!</p>`
        } else if (title == "Hoteis") {
            line = "Hoteis"
        } else if (title == "Estacionamento") {
            line = `<p style="text-align: center;">O local conta com estacionamento durante o evento</p>`

        }
        $("#modalBodyUsefulLinks").html(line)
    })

    /*$("#email").keyup(function() {
         //testa se o email é válido
         let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
         let email = $("#email").val();
         let teste = emailReg.test(email);
         if (!teste) {
             $("#email").addClass("formErr")
             inp5 = false
         } else if (email == '') {
             $("#email").addClass("formErr")
             inp5 = false
         } else {
             $("#email").addClass("formOk")
             inp5 = true
         }
         testaInputs();
     });*/

    //cria mascara pro telefone
    $('#inputFone').mask('(00) 00000-0000');

    function corFone() {
        //muda a corda da input do telefone
        let tam = $('#inputFone').val().toString().length

        if ($('#inputFone').val() != "" && tam == 15) {
            inp1 = true
            $("#inputFone").addClass("formOk")
        } else {
            inp1 = false
            $("#inputFone").addClass("formErr")
        }
    }

    $('#inputFone').keyup(function() {
        //chama as funções sempre que sai da input telefone
        corFone();
        testaInputs();
    });

    $('#name').keyup(function() {
        if ($(this).val() != "") {
            inp2 = true
        } else {
            inp2 = false
        }
        testaInputs();
    });
    $('#lastname').keyup(function() {
        if ($(this).val() != "") {
            inp3 = true
        } else {
            inp3 = false
        }
        testaInputs();
    });
    /*$('#email').keyup(function() {
        if ($(this).val() != "") {
            inp4 = true
        } else {
            inp4 = false
        }
        testaInputs();
    });*/

    function testaInputs() {
        if (inp1 && inp2 && inp3 && inp4 && inp5) {
            $('#sendForm').attr('disabled', false)
        } else {
            $('#sendForm').attr('disabled', true)
        }
    }
    //enviar formulário via ajax


    $("#sendForm").click(function(e) {
        e.preventDefault();
        let line = ""
        let title = ""

        $.ajax({
            type: "post",
            data: {
                action: 'confirmation',
                name: $('#name').val(),
                lastName: $('#lastname').val(),
                fone: $('#inputFone').val(),
                mail: $('#email').val(),
                type: $('#type').val(),
                observation: $('#observation').val(),
            },
            url: "src/DB/DBInterfaceInsert.php",
            dataType: "json",
            success: function(response) {

                title = `<h7 class="modal-title" id="titleModalConfirmation">Agradecemos a sua confirmação ${$('#name').val()}!</h7>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`
                $('.modal-header').html(title)

                line = `<br><p class="h5" style="text-align: center;">${JSON.stringify(response['response']).toString().replace('"',"").replace('"',"")}</p><br>`
                $("#modalBodyConfirmation .container").html(line)
                atualizaAoClicar()
            },
            error: function(response) {
                line = `<br><p class="h5" style="text-align: center;">${JSON.stringify(response['response'])}</p><br>`
                $("#modalBodyConfirmation .container").html(line)
                console.log(JSON.stringify(response))
                atualizaAoClicar()
            }
        });

    });

    function atualizaAoClicar() {
        $('#modaConfirmation').click(function() {
            document.location.reload(true);
        })
    }
});