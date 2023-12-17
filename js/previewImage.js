document.getElementById("image").onchange = function () {

    var reader = new FileReader();

    reader.onload = function (e) {
        console.log(e.target.result);
        document.getElementById("preview").src = e.target.result;
    }

    reader.readAsDataURL(this.files[0]);
}

function chooseImage() {
    var input = document.getElementById('image');
    input.click();
}