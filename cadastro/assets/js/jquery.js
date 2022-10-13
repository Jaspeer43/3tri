$('#form1').submit(function(e){
    e.preventDefault();
    var data = $('#ano').val();
    var id = $('#id').val();
    var campus = $('#campus_id').val();
    var processa2 = $('button').val(); 
    console.log(processa2);
    
    $.ajax({
        url:"processa2.php",
        method:"post",
        data:{data:data, id:id, campus:campus, processa2:processa2}, 
        dataType:"JSON",
    }).done(function(result){
        $('#ano').val("");
        $('#id').val("");
        $('#campus_id').val("");
        // console.log(result);
        var resposta = $('#resposta');
        resposta.prepend("<p>Edição criada com Sucesso!</p>");

    });
});