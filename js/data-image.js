document.addEventListener('DOMContentLoaded', () => {

    const inputImage = document.querySelector('#image');
    const editor = document.querySelector('#editor');
    const miCanvas = document.querySelector('#preview');
    const contexto = miCanvas.getContext('2d');
    let urlImage = undefined;
    inputImage.addEventListener('change', abrirEditor, false);

    function abrirEditor(e) {
        urlImage = URL.createObjectURL(e.target.files[0]);
        editor.innerHTML = '';
        let cropprImg = document.createElement('img');
        cropprImg.setAttribute('id', 'croppr');
        editor.appendChild(cropprImg);

        contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);

        document.querySelector('#croppr').setAttribute('src', urlImage);

        new Croppr('#croppr', {
            aspectRatio: 1,
            startSize: [20, 20],
            onCropEnd: recortarImagen
        })
    }


    function recortarImagen(data) {
        const inicioX = data.x;
        const inicioY = data.y;
        const nuevoAncho = data.width;
        const nuevaAltura = data.height;
        const zoom = 1;
        let imagenEn64 = '';
        miCanvas.width = nuevoAncho;
        miCanvas.height = nuevaAltura;
        let miNuevaImagenTemp = new Image();
        miNuevaImagenTemp.onload = function() {
            contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
            imagenEn64 = miCanvas.toDataURL("image/jpeg");
            document.querySelector('#base64').textContent = imagenEn64;
        }
        miNuevaImagenTemp.src = urlImage;
    }
});