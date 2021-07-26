$(function(){
    $('#list-like a').on("click", function(){
        var jenis = $(this).attr('id');

        if(jenis == "tombol-like"){
            if($('#tombol-like').attr('status') == "1"){
                $('#icon-like').attr('class', 'bi bi-hand-thumbs-up');
                $('#tombol-like').attr('status', '0');
                $('#like').val(-1);
            }
            else{
                $('#icon-like').attr('class', 'bi bi-hand-thumbs-up-fill');
                $('#tombol-like').attr('status', '1');
                $('#icon-dislike').attr('class', 'bi bi-hand-thumbs-down');
                $('#tombol-dislike').attr('status', '0');
                $('#like').val(1);
            }
        }
        else if(jenis == 'tombol-dislike'){
            if($('#tombol-dislike').attr('status') == "1"){
                $('#icon-dislike').attr('class', 'bi bi-hand-thumbs-down');
                $('#tombol-dislike').attr('status', '0');
                $('#like').val(-1);
            }
            else{
                $('#icon-dislike').attr('class', 'bi bi-hand-thumbs-down-fill');
                $('#tombol-dislike').attr('status', '1');
                $('#icon-like').attr('class', 'bi bi-hand-thumbs-up');
                $('#tombol-like').attr('status', '0');
                $('#like').val(0);
            }
        }

        $('#form-like').submit();
    });
})