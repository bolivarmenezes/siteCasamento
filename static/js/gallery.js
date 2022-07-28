$(document).ready(function() {
    //busca todas as fotos do diretório album
    const pathAlbum = "album"
    const path = `${pathAlbum}/index.php`
    const pathThumbnails = `${pathAlbum}/thumbnails/`
    let line = ''
    const destination = $('.containerGallery')
    let typeOfFile = ''
        // imagens
    let fileExtension_img = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
    //videos         
    let fileExtension_vid = ['mp4', 'mpeg', 'wmv'];

    $.ajax({
        type: "get",
        url: path,
        success: function(data) {
            data.split('<br>').forEach(name => {
                typeOfFile = name.split('.').pop().toLowerCase().toString()
                line += '<div class="picture">'
                    //testa se é foto ou video
                if (fileExtension_img.includes(typeOfFile)) {
                    line += `<img src="${pathThumbnails}${name}" data-bs-toggle="modal" data-bs-target="#modalPictures" loading="lazy">`
                } else if (fileExtension_vid.includes(typeOfFile)) {
                    line += `<video controls><source src="${pathAlbum}${name}" type="video/${typeOfFile}" data-bs-toggle="modal" data-bs-target="#modalPictures"></video>`
                }
                line += '</div>'
            });

            destination.html(line)
            modalPic()

        }
    });

    function modalPic() {
        $(".picture img").click(function() {
            let picturePath = $(this).attr('src');
            let picture = picturePath.split('/')[0] + '/' + picturePath.split('/')[2]
                //$("#titleModalPictures").text(title)
            let img = `<img src="${picture}" class="pictureIntoModal">`
            $("#bodyModalPictures").html(img)
        })
    }

});