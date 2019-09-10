"use strict"
$(document).ready(function() {
	$('.summernote').summernote({
		height: 200,	
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['fontsize', ['fontsize']],
			['para', ['ul', 'ol', 'paragraph', 'height']],
			['insert', ['picture', 'link', 'hr']],
			['misc', ['codeview']],
			
		]
	});
	$('.datetimepicker').datetimepicker({
		format: 'YYYY-MM-DD'
	});
});

// загрузка файла
function handleFileSelect(evt) {
	$('#files_a_del').val('0');
	var files = evt.target.files; 
	var f = files[0];	
	if (!f.type.match('image.*')) {
		alert("Файл не является изображением!");
		return;
	}
	var reader = new FileReader();
	reader.onload = (function(theFile) {
		return function(e) {
			var span ='<img class="thumb" src="' + e.target.result +
			'" title="' + escape(theFile.name) + '"/>';
			document.getElementById('img').innerHTML = span;
		};
	})(f);
	reader.readAsDataURL(f);
}
document.getElementById('files_a').addEventListener('change', handleFileSelect, false);

//показываем всплывающее окно
function showinfopopup(id_popup,popup_text,id_object)
{
	scrollToDiv($("#"+id_object),200);
	var offset=$("#"+id_object).offset();
	$("#"+id_popup).html(popup_text);
	$("#"+id_popup).css('top', (offset.top-32) + "px");
	$("#"+id_popup).css('left', (offset.left+$("#"+id_object).width()) + "px");
	$("#"+id_popup).fadeIn(400);
	setTimeout('$("#' + id_popup + '").fadeOut(500);', 2000);
	$("#"+id_object).css("border-color","#DD5F4D");
}

function scrollToDiv(element,navheight){
	var offset = element.offset();
	var offsetTop = offset.top;
	var totalScroll = offsetTop-navheight;
	
	$('body,html').animate({
		scrollTop: totalScroll
	}, 500);
}

// проверяем обязательные поля
function check_fields(ex)
{
	$("#cmd_ex").val(ex);
	$("#form_article").submit();
	return false;
}

function delete_article() 
{
	if ( confirm('Вы действително уверены, что хотите удалить эту статью?') ) {
		$('#cmd').val('del');
		$("#form_article").submit();
	} 
}

function delete_image() 
{
	if ( confirm('Вы действително уверены, что хотите удалить изображение?') ) {
		$('#files_a_del').val('1');
		$("#img").html('');
	} 
}

function make_seo(lang) 
{
	$.ajax(
	{
		async: false,
		type: "POST", 
		url: hname + "admin/_ajax.php?make_seo",
		data: "&name=" + $("#name_"+lang).val() + "&id=" + $("#id").val() + "&lang=" + lang + "&table=articles",
		success: function(msg){
			$("#seo_"+lang).val(msg);
		},
		error:  function(xhr, str)
		{
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	});
}