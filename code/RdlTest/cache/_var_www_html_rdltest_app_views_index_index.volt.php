<!--
<div class="page-header">
    <h1>Congratulations!</h1>
</div>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

<p>This page is located at <code>views/index/index.volt</code></p>
-->
<html>

	<head>
		<code>
			<center>
				<h1>PHP - Servicios REST</h1>
			</center>
		</code>
	</head>

	<body>
		<?php
        function writeMsg() {
            echo "<hr>";
            echo "<center><h2>Phalcon!</h2></center>";
            echo "<hr>";
        }
        
        writeMsg(); // call the function

    ?>

		<center>
			<div class="btn-group">
				<?= $this->tag->linkTo(['index/consultarCatalogo', 'Consultar Por Id', 'class' => 'btn btn-primary btn-large']) ?>
			</div>
			<br><br>
		</center>
		<center>
			<div class="btn-group">
				<?= $this->tag->linkTo(['index/consultarCatalogoList', 'Consultar', 'class' => 'btn btn-primary btn-large']) ?>
			</div>
			<br><br>
		</center>
		<center>
			<div class="btn-group">
				<?= $this->tag->linkTo(['index/crearCatalogo', 'Crear', 'class' => 'btn btn-primary btn-large']) ?>
			</div>
			<br><br>
		</center>
		<center>
			<div class="btn-group">
				<?= $this->tag->linkTo(['index/actualizarCatalogo', 'Actualizar', 'class' => 'btn btn-primary btn-large']) ?>
			</div>
			<br><br>
		</center>
		<center>
			<div class="btn-group">
				<?= $this->tag->linkTo(['index/eliminarCatalogo', 'Eliminar', 'class' => 'btn btn-primary btn-large']) ?>
			</div>
			<br><br><br><br><br><br><br>
		</center>


	<?php
            if(array_key_exists('button1', $_POST)) {
                button1();
            }
            else if(array_key_exists('button2', $_POST)) {
                button2();
            }
            else if(array_key_exists('button3', $_POST)) {
                button3();
            }
            function button1() {
                echo "This is Button1 that is selected";
            }
            function button2() {
                echo "This is Button2 that is selected";
            }
        ?>

		<div hidden="true">
			<form method="post">
				<input type="submit" name="button1" class="button" value="Button1"/>

				<input type="submit" name="button2" class="button" value="Button2"/>

			</form>
		</div>

		<?php phpinfo(); ?>

	</body>

</html>
