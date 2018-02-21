function popup_erro(msg) {
	var titulo = "Erro";
	var corpo = "<p>" + msg + "</p>";
	var rodape = '<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>';
	popup(titulo,corpo,rodape);
}

function popup_excluir(arquivo,cod) {
	var titulo = "Confirma?";
	var corpo = "<p>Deseja realmente excluir?</p>";
	var rodape = ''
	+ '<button class="btn" data-dismiss="modal" aria-hidden="true">Não</button>'
	+ '<a href="' + arquivo + '?act=Excluir&cod=' + cod + '" class="btn btn-primary">Sim</a>';
	popup(titulo,corpo,rodape);
}

function popup_excluir2(arquivo,cod) {
        var titulo = "Confirma?";
        var corpo = "<p>Deseja realmente excluir?</p>";
        var rodape = ''
        + '<button class="btn" data-dismiss="modal" aria-hidden="true">Não</button>'
        + '<a href="' + arquivo + '?act=ExcluirUserList&cod=' + cod + '" class="btn btn-primary">Sim</a>';
        popup(titulo,corpo,rodape);
}

function popup(titulo,corpo,rodape) {
	$("#modal-title").html(titulo);
	$("#modal-body").html(corpo);
	$("#modal-footer").html(rodape);
	$("#germodal").modal('show');
}

$(function(){
	window.prettyPrint && prettyPrint();
	$('#dp1').datepicker({
		format: 'mm/dd/yyyy'
	});
	$('#dp2').datepicker();
	$('#dp3').datepicker();
	
	
	var startDate = new Date(2012,1,20);
	var endDate = new Date(2012,1,25);
	$('#dp4').datepicker()
		.on('changeDate', function(ev){
			if (ev.date.valueOf() > endDate.valueOf()){
				$('#alert').show().find('strong').text('The start date can not be greater then the end date');
			} else {
				$('#alert').hide();
				startDate = new Date(ev.date);
				$('#startDate').text($('#dp4').data('date'));
			}
			$('#dp4').datepicker('hide');
		});
	$('#dp5').datepicker()
		.on('changeDate', function(ev){
			if (ev.date.valueOf() < startDate.valueOf()){
				$('#alert').show().find('strong').text('The end date can not be less then the start date');
			} else {
				$('#alert').hide();
				endDate = new Date(ev.date);
				$('#endDate').text($('#dp5').data('date'));
			}
			$('#dp5').datepicker('hide');
		});
});


        var cnt_colab = 1;
        var contador = 0;       
        var itens_colab = new Array();
        function adicionarImagem(){
            if(contador < 5){
                var div = document.createElement("div");
                div.id = "div_colab"+cnt_colab;
                div.style.clear = "left";

                div.innerHTML = '<fieldset class="well form-horizontal"><div class="control-group" id="grp_galeria_upload" ><label class="control-label">Foto<\/label><div class="controls"><input type="file" title="Foto" name="foto[]" id="foto'+cnt_colab+'" \/><input type="hidden" name="Fotos_ID[]" value="" /><\/div><\/div><div><a href="javascript:if(confirm(\'Deseja cancelar o envio desta foto?\')) removeItem(\'div_colab'+cnt_colab+'\');" style="cursor:pointer; text-decoration: underline;" title="Cancelar envio">Cancelar foto<\/a><\/div><\/fieldset>';

                document.getElementById('itens_').appendChild(div);
                cnt_colab++;
                itens_colab[itens_colab.length] = div.id;
                contador++;
            }
        }

	function removeItem(id){            
            itens_colab_aux = new Array();
            for(i=0;i< itens_colab.length; i++){
                if(itens_colab[i] != id){ itens_colab_aux[itens_colab_aux.length] = itens_colab[i]; }   
            }
            itens_colab = itens_colab_aux;
            contador--;
            document.getElementById('itens_').removeChild(document.getElementById(id)); 
        }

	function geraeditor(local) {
	 	new nicEditor({
	 		buttonList	:	['fontSize','fontFormat','bold','italic','underline','strikethrough',
	 						'left','center','right','justify','forecolor','bgcolor',
	 						'removeformat','ol','ul','image','upload','link','unlink'],
	 		uploadURI	:	"envio_nic.php",
	 		iconsPath	:	"js/nicEditorIcons.gif"
			
	 	}).panelInstance(local);
	}

/*** funcoes login ***/
	function makeBox ( ele, msg, type ) {
		if (type == 0) {
			$("#"+ele).addClass("alert alert-block alert-error");
		} else if (type == 1) {
			$("#"+ele).addClass("alert alert-block alert-success");
		} else if (type == 2) {
			$("#"+ele).addClass("alert alert-block alert-info");
		}
		error_msg = "<a class='close' data-dismiss='alert' href='#'>×</a><p class='alert-heading'>" + msg + "</p>";
		$("#"+ele).html(error_msg);
	}
	function removeBox ( ele ) {
		$("#" + ele).removeClass("alert alert-block alert-error alert-success alert-info");
		$("#" + ele).html("");
	}

	jQuery(document).ready(function() {
      $("#telefone, #celular").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999", ],
        keepStatic: true
      });
    });


