<div id="dropdown">
	<ul>
		<li class='ativo'>			
				<a class="profile_visit" href="#"> <img class="profile" src="../images/icones/profile.ico" /> </a>			
			<ul>
				<li id="detalhes">
					<button class="buttom_user" onclick="location.href='<?php echo BASEURLUSER.'?m=usuario&t=incluir'; ?>'">
						<img src="../images/icones/add.png" /> Cadastrar 
					</buttom>
			 	</li>
			 	<li id="detalhes">
			 		<button class="buttom_user" onclick="location.href='<?php echo BASEURLUSER.'?m=usuario&t=listar'; ?>'">
						<img src="../images/icones/exibir.ico" /> Exbir
					</buttom>
			 	</li>
			 	<li id="detalhes">
			 		<?php
						$sessao = new sessao();
						$meuid = $sessao->getVar('iduser');
					?>
					<button class="buttom_user" onclick="location.href='<?php echo BASEURLUSER.'?m=usuario&t=senha&id='.$meuid; ?>'">
						<img src="../images/icones/password.ico" /> Mudar Senha 
					</buttom>	 		
			 	</li>
			 	<li id="detalhes" class='last'>
			 		<button class="buttom_user" onclick="location.href='<?php echo BASEURLUSER.'?logoff=TRUE'; ?>'">
						<img  src="../images/icones/logout2.ico" /> Sair  
					</buttom>
			 	</li>
			</ul>
		</li>
	</ul>
</div> <!-- fecha div dropdown-->