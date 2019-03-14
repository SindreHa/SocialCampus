var labelVal = document.getElementById("img-name");

document.getElementById("avatar").addEventListener( 'change', function( e )
{
    var fileName = this.value;
    // console.log(this.value);
    fileName = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
    document.getElementById("img-name").innerHTML = fileName;
});

function readURL(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#img-upload-result')
                            .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
    }
}

function postImg() {
    $( "#img-upload-post" ).submit();
}
