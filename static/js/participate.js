$(document).ready(function() {
    /**
     * Controla as Divs
     */
    $("#message-for").click(function() {
        $(".participate-pictiure").hide();
        $(".participate-music").hide();
        $(".participate-initial").hide();
        $(".participate-message").show();
        $('#gif_loading').hide();
    })

    $("#pictiure-for").click(function() {
        $(".participate-message").hide();
        $(".participate-music").hide();
        $(".participate-initial").hide();
        $(".participate-pictiure").show();
        $('#gif_loading').hide();
        readImage()
    })
    $("#music-for").click(function() {
        $(".participate-message").hide();
        $(".participate-pictiure").hide();
        $(".participate-initial").hide();
        $(".participate-music").show();
        $('#gif_loading').hide();

    })

    /**
     * Envia a mensagem
     */

    $('#sendMsg').click(function(e) {
        $('#gif_loading').show();
        e.preventDefault()
        $.ajax({
            type: "post",
            url: "src/DB/DBInterfaceInsert.php",
            data: {
                action: 'message',
                name_msg: $('#messageName').val(),
                mensagem_msg: $('#messageText').val(),
            },
            dataType: "json",
            success: function(response) {
                /*console.log(JSON.stringify(response['response']))
                title = `<h7 class="modal-title" id="titleModalParticipateMsg">Agradecemos a sua mensagem ${$('#messageName').val()}!</h7>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`
                $('.modal-header').html(title)
                $('#gif_loading').hide();
                line = `<br><p class="h5" style="text-align: center;">${JSON.stringify(response['response']).toString().replace('"',"").replace('"',"")}</p><br>`
                $("#bodyModalParticipateMsg").html(line)
                atualizaAoClicarMsg()*/
                window.location.href = "/messagelist.html"

            },
            error: function(response) {
                $('#gif_loading').hide();
                console.log(JSON.stringify(response))

            }
        });
    });



    /**
     * envia imagem
     **/
    function readImage() {

        $('#inputFilePic').change(function() {
            let allFiles = $(this)[0].files
            let line = '';
            for (let i = 0; i < allFiles.length; i++) {
                const fileReader = new FileReader()
                fileReader.onloadend = function() {
                    line = `<img class="preview" src="${fileReader.result}"></img>`
                    $('.choosePicPreview').append(line);
                }
                fileReader.readAsDataURL(allFiles[i])
            }
            clearView()

        })
    }

    // Evento Submit do formulário
    $('#formPic').submit(function() {
        $('#gif_loading').show();
        // Captura os dados do formulário
        var formulario = document.getElementById('formPic');
        // Instância o FormData passando como parâmetro o formulário
        var formData = new FormData(formulario);
        // Envia O FormData através da requisição AJAX
        $.ajax({
            url: "src/DB/DBInterfaceInsert.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(retorno) {
                //console.log(retorno['response'])
                $('#bodyModalParticipatePicture').html(`<h4>${retorno['response']}</h4>`)
                $('#titleModalParticipatePicture').text('Enviado!')
                $('#gif_loading').hide();
                atualizaAoClicarPic()
            },
            error: function(err) {
                console.log(err)
                $('#bodyModalParticipatePicture').html(`<h4>${err.responseText}</h4>`)
                $('#titleModalParticipatePicture').text('Erro!')
                $('#gif_loading').hide();
                atualizaAoClicarPic()
            }
        });
        return false;
    });

    /**envia uma sugestão de musica */
    $('#sendMusic').click(function(e) {
        $('#gif_loading').show();
        e.preventDefault()
        $.ajax({
            type: "post",
            url: "src/DB/DBInterfaceInsert.php",
            data: {
                action: 'music',
                name_msc: $('#nameMsc').val(),
                music_msc: $('#musicMsc').val(),
            },
            dataType: "json",
            success: function(response) {
                //console.log(JSON.stringify(response['response']))
                title = `<h7 class="modal-title" id="titleModalParticipateMusic">Agradecemos a sua sugestão ${$('#nameMsc').val()}!</h7>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`
                $('.modal-header').html(title)
                $('#gif_loading').hide();
                line = `<br><p class="h5" style="text-align: center;">${JSON.stringify(response['response']).toString().replace('"',"").replace('"',"")}</p><br>`
                $("#bodyModalParticipateMusic").html(line)
                atualizaAoClicarMusic()
            },
            error: function(response) {
                $('#gif_loading').hide();
                console.log(JSON.stringify(response))

            }
        });
    });

    /**lista de músicas já sugeridas */
    $('#music-list').click(function(e) {
        $('#gif_loading').show();
        $.ajax({
            type: "post",
            url: "src/DB/DBInterfaceSelect.php",
            data: {
                action: 'listMusic',
                name_msc: $('#nameMsc').val(),
                music_msc: $('#musicMsc').val(),
            },
            dataType: "text",
            success: function(response) {
                $('#gif_loading').hide();
                title = `Músicas sugeridas até agora:`
                $('#titleModalParticipateList').text(title)
                $("#bodyModalParticipateList").html(response)
                atualizaAoClicarMusic()
            },
            error: function(response) {
                $('#gif_loading').hide();
                console.log(JSON.stringify(response))

            }
        });
    });

    function clearView() {
        $('#inputFilePic').change(function() {
            $('.choosePicPreview img').remove()
        })
    }

    function atualizaAoClicarPic() {
        $('#modalPicture').click(function() {
            document.location.reload(true);
        })
    }

    function atualizaAoClicarMsg() {
        $('#modalMessage').click(function() {
            document.location.reload(true);
        })
    }

    function atualizaAoClicarMusic() {
        $('#modalMusic').click(function() {
            document.location.reload(true);
        })
    }


});
