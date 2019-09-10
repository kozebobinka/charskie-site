"use strict"
// загрузка файла
function handleFileSelect(evt) {
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
document.getElementById('files').addEventListener('change', handleFileSelect, false);

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
	if ( ($("#cmd").val() == 'add') && (! $("img").is(".thumb")) ) {
		showinfopopup("my_popup","Загрузите изображение!", "files");
		return false;
	}
	
	if ( $("#author").val() == 0 ) {
		showinfopopup("my_popup","Укажите автора!", "author");
		return false;
	}
/*	
	if ( ! $("#sizex").val().match('^[0-9]+$')) {
		showinfopopup("my_popup","Укажите ширину!", "sizex");
		return false;
	}
	
	if ( ! $("#sizey").val().match('^[0-9]+$')) {
		showinfopopup("my_popup","Укажите высоту!", "sizey");
		return false;
	}
	
	if ( ($("#year").val().trim() != '') && (!$("#year").val().match('^[0-9]{4}$')) ) {
		showinfopopup("my_popup","Укажите год корректно!", "year");
		return false;
	}
	
	
	if ( $("#period").val() == 0 ) {
		showinfopopup("my_popup","Укажите период!", "period");
		return false;
	}
	
	if ( $("#type").val() == 0 ) {
		showinfopopup("my_popup","Укажите вид!", "type");
		return false;
	}
	
	if ( $("#genre").val() == 0 ) {
		showinfopopup("my_popup","Укажите жанр!", "genre");
		return false;
	}
	
	if ( $("#tech").val() == null ) {
		showinfopopup("my_popup","Укажите технику!", "tech");
		return false;
	}
	
	if ( $("#status").val() == 0 ) {
		showinfopopup("my_popup","Укажите статус работы!", "status");
		return false;
	}
	
	if ( ! $("#price").val().match('^[0-9]*$')) {
		showinfopopup("my_popup","Укажите корректно цену!", "price");
		return false;
	}
*/
	$("#techs").val($("#tech").val());
	$("#depicts").val($("#depict").val());
	$("#genres").val($("#genre").val());
	
	$("#cmd_ex").val(ex);
	
	$("#form_item").submit();
	return false;
}

function delete_work() 
{
	if ( confirm('Вы действително уверены, что хотите удалить эту работу?') ) {
		$('#cmd').val('del');
		$("#form_item").submit();
	} 
}

function duplicate_work() 
{
	if ( confirm('Дублировать эту работу?') ) {
		$('#cmd').val('dupl');
		$("#form_item").submit();
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
		data: "&name=" + $("#name_"+lang).val() + "&id=" + $("#id").val() + "&lang=" + lang + "&table=items",
		success: function(msg){
			$("#seo_"+lang).val(msg);
		},
		error:  function(xhr, str)
		{
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	});
}
