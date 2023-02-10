<!DOCTYPE html>
<html lang="fr">
<head>
	<?php require "includes/partials/page_head.phtml"; ?>
</head>
<body>
<main>
	<header>
		<?php require "includes/partials/page_header.phtml"; ?>
	</header>
	<nav>
		<?php require_once "includes/partials/navbar.phtml"; ?>
	</nav>
	<section id="content">
		<article>
			<header>ERREUR</header>
			<section>
				Erreur de page : La page que vous demandez n'existe pas !
			</section>
			<footer>
				Erreur 404
			</footer>
		</article>
	</section>
	<footer>
		<?php require_once "includes/partials/footer.phtml"; ?>
	</footer>
</main>
</body>
</html>