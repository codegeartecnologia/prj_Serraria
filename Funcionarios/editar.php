<?php 
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="nav-tabs2">
        <li class="active"> <a href="#dados_pessoais" data-toggle="tab"> DADOS PESSOAIS </a> </li>
        <li><a href="#dados_familiar" data-toggle="tab"> DADOS FAMILIAR </a> </li>
        <li><a href="#dados_profissionais" data-toggle="tab"> DADOS PROFISSIONAIS </a> </li>
        <li><a href="#dados_empresariais" data-toggle="tab"> DADOS EMPRESARIAIS </a> </li>
    </ul>

	<div class="dados">
		<form id="formcad" method="post" action="">
				<ul>
					<div class="tab-content">
				        <div class="tab-pane fade in active" id="dados_pessoais">
				        	
				            <li> 
								<label for="nome"> Nome: </label>
								<input type="text" size="40" name="nome" autofocus="autofocus" value="<?php if($resbd) echo $resbd->nome; ?>" /> 
							</li>
							<li> 
								<label for="rg"> RG: </label>
								<input type="text" size="12" id="rg" name="rd" value="<?php if($resbd) echo $resbd->rg; ?>" /> 
							</li>
							<li> 
								<label for="cpf"> CPF: </label>
								<input type="text" size="14" id="cpf" name="cpf" value="<?php if($resbd) echo $resbd->cpf; ?>" /> 
							</li>
							<li> 
								<label for="data_nasc"> Nascimeto: </label>
								<input type="text" size="12" id="data_nasc" name="data_nasc" value="<?php if($resbd) echo date("d/m/y", strtotime($resbd->data_nasc)); ?>" /> 
							</li>
				        </div> <!-- dados_pessoais -->
				        <div class="tab-pane fade" id="dados_familiar">
				        	
				           <li> 
								<label for="nome_pai"> Pai: </label>
								<input type="text" size="40" autofocus="autofocus" name="login" value="<?php if($resbd) echo $resbd->pai; ?>" /> 
							</li>
							<li> 
								<label for="nome_mae"> Mãe: </label>
								<input type="text" size="40" name="nome_mae" value="<?php if($resbd) echo $resbd->mae; ?>" /> 
							</li>
							<li id="img">
								<script language="Javascript"> 
									/*
									 * Faz aparecer um input ao selecionar um radio box*/
									 function aparece(){
										if(document.getElementById("sim").checked){
											/*
											 * Utilizado em input
											 * document.forms[0].motorista.style.visibility="visible";
											 */
											document.getElementById("cnh").style.visibility="visible"
										}
										else {
											//document.forms[0].motorista.style.visibility="hidden";
											document.getElementById("cnh").style.visibility="hidden";
										}
									}
									function abrir(URL) { 
									  var width = 750;
									  var height = 260;
									 
									  var left = 99;
									  var top = 99;
									 
									  window.open(URL,'janela','width='+width+', height='+height+', top='+top+', left='+left+',scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
									 
									}
									function moeda(z){  
										v = z.value;
										v=v.replace(/\D/g,"")  //permite digitar apenas números
										v=v.replace(/[0-9]{12}/,"inválido")   //limita pra máximo 999.999.999,99
										v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
										v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
										v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")	//coloca virgula antes dos últimos 2 digitos
										z.value = v;
									}
								</script>
								<label for="dependentes"> Dependentes?: </label>
								<a href="javascript:abrir('http://localhost/Github/prj_Serraria/Funcionarios/dependentes.php');"> 
									<img src="../images/icones/sim.ico"/>
								</a>
								<!-- HTML do código do javasquipt  
								<input type="radio" id="sim" onclick="aparece()" name="campo"> Sim
								<input type="radio" checked="checked" id="nao" onclick="aparece()" name="campo"> Não
								<input type="text" name="dependentes" style="visibility:hidden;"> -->
							</li>
				        </div> <!-- settings -->
				        <div class="tab-pane fade" id="dados_profissionais">
				            <li> 
								<label for="num_carteira"> N° Carteira: </label>
								<input type="text" size="15" name="num_carteira" autofocus="autofocus" value="<?php if($resbd) echo $resbd->num_carteira; ?>" /> 
							</li>
							<li> 
								<label for="pis"> P.I.S: </label>
								<input type="text" size="15" id="pis" name="pis" value="<?php if($resbd) echo $resbd->pis; ?>" /> 
							</li>
							<li id="img">
								<label for="motorista"> Motorista: </label>
								<input type="radio" id="sim" onclick="aparece()" name="campo"> Sim
								<input type="radio" checked="checked" id="nao" onclick="aparece()" name="campo"> Não
								<!-- <input type="text" name="dependentes" style="visibility:hidden;"> -->
								
							</li>
							<li id="cnh" style="visibility:hidden;"> 
								<label for="login"> CNH: </label>
								<input type="text" size="15" name="cnh" value="<?php if($resbd) echo $resbd->cnh; ?>" /> 
							</li>
				            
				        </div> <!-- dados_profissionais -->
				        <div class="tab-pane fade" id="dados_empresariais">
				           <li> 
								<label for="matricula"> Matrícula: </label>
								<input type="text" size="50" id="matricula" name="matricula" autofocus="autofocus" value="<?php if($resbd) echo $resbd->id; ?>" /> 
							</li>
							<div class="admissao_demissao">
								<li class="li_left">
									<label for="admissao" > Admissão: </label>
									<input type="text" size="12" id="admissao" name="admissao" value="<?php if($resbd) echo date("d/m/y", strtotime($resbd->admissao)); ?>" />
								</li>
								<li class="li_right">
									<label for="demissao" > Demissão: </label>
									<input type="text" size="12" id="demissao" disabled="disabled" name="demissao" value="<?php if($resbd) echo date("d/m/y", strtotime($resbd->demissao)); ?>" />
								</li>	
							</div>						
							<li> 
								<label for="setor"> Setor: </label>
								<input type="text" size="20" name="setor" value="<?php if($resbd) echo $resbd->setor; ?>" /> 
							</li>
							<li> 
								<label for="salario"> Salário: </label>
								<input type="text" size="10" name="salario" value="<?php if($resbd) echo $resbd->salario ?>" onKeyUp="moeda(this);" /> 
							</li>
							<li class="center">
								<input type="button" onclick="location.href='?m=funcionario&t=listar'" value="Cancelar" />
								<input type="submit" name="editar" value="Salvar Dados" /> 
						  	</li>				            
				        </div> <!-- dados_empresariais -->
				        
				    </div>
				</ul>
		</form> <!-- formcad -->
	</div>	<!-- dados -->
</div>
<!-- /.panel-body -->