<template>
	<div class="d-flex flex-column min-vh-100">
		<div class="row p-md-1 py-0 bg-white flex-grow-1">
			<div class="col-12 col-md-9 px-md-5 py-3 d-flex justify-content-center flex-column hero">
				<h1 class="figure-caption">À propos du  plateforme</h1>
				<h1 class="fw-bold title">Une plateforme dédiée à l'échange d'informations et à la collaboration</h1>
				<h1 class="display-6 text-primary">Forum interactif et partage de fichiers pour les étudiants</h1>
				<p class="">
					Bienvenue sur ce plateforme, un espace conçu pour aider les étudiants à échanger des
					connaissances, partager des ressources et collaborer efficacement. Que vous soyez à la recherche
					d'aide pour un
					projet, des conseils d'étude ou des ressources complémentaires, vous trouverez ici tout ce dont vous
					avez
					besoin.
				</p>
				<p class="">
					Nous croyons que l'apprentissage ne doit pas se limiter à une salle de classe. C'est pourquoi ce
					plateforme
					met l'accent sur les échanges entre étudiants pour renforcer la compréhension des sujets, faciliter
					les révisions
					et améliorer la réussite académique.
				</p>
				<h3 class="fw-bold">Forum de discussion : Partagez et apprenez ensemble</h3>
				<p class="">
					Le forum est l'un des éléments clés de ce plateforme. Il permet aux étudiants de poser des
					questions,
					discuter de sujets académiques, partager des ressources et même collaborer sur des projets. Vous
					pouvez trouver
					des réponses à vos questions, discuter de vos matières préférées, ou obtenir des éclaircissements
					sur des
					concepts difficiles. Notre objectif est de créer un espace où les étudiants peuvent s’entraider
					activement.
				</p>
				<h3 class="fw-bold">Échange de fichiers : Accédez à des ressources utiles</h3>
				<p class="">
					L'échange de fichiers est au cœur de ce plateforme. Vous pouvez facilement télécharger et
					partager des fichiers
					tels que des documents de cours, des présentations, des résumés, des devoirs et des guides d'étude.
					Ces ressources
					sont partagées par d'autres étudiants qui les ont trouvées utiles, vous permettant ainsi d'élargir
					vos connaissances
					et d’accéder à des outils pratiques pour réussir.
				</p>
				<p class="">
					Vous pouvez également partager des fichiers pour aider d’autres étudiants. Que ce soit un résumé
					détaillé d’un chapitre,
					des notes de cours bien structurées ou des exercices pratiques, chaque ressource que vous partagez
					peut être un atout
					précieux pour vos camarades.
				</p>
				<h3 class="fw-bold">Avantages de ce plateforme</h3>
				<p class="">
					- Accès à une communauté dynamique** : Des étudiants de différentes spécialités et niveaux sont
					présents pour échanger.
					- Collaboration sans frontières** : Partagez vos idées, vos ressources et travaillez ensemble, peu
					importe où vous êtes.
					- Apprentissage interactif** : Discutez de sujets en temps réel et obtenez des retours immédiats
					sur vos questions ou idées.
					- Une base de ressources toujours croissante** : Grâce aux partages de fichiers et à la mise à
					jour constante du forum, vous avez toujours accès à de nouvelles ressources.
				</p>
				<h3 class="fw-bold">Pourquoi nous choisir ?</h3>
				<p class="">
					Notre plateforme se distingue par sa simplicité d'utilisation, sa communauté active et
					l’accessibilité des ressources.
					Nous voulons que chaque étudiant ait un accès facile à des informations utiles et à des outils qui
					l'aideront à réussir ses études.
					Que vous soyez en début de parcours universitaire ou que vous soyez déjà dans un domaine spécifique,
					nous vous offrons un environnement
					propice à l’échange et à la collaboration.
				</p>
				<div class="btn-group">
					<router-link class="btn btn-primary mb-3 mb-md-0" to="/register">Rejoignez la
						communauté</router-link>
					<router-link class="btn btn-dark mb-3 mb-md-0" to="/forum">Accéder au forum</router-link>
				</div>
			</div>


			<div class="col-md-3 bg-light  p-3">
				<h3 class="fw-bold">Pourquoi échanger et partager des fichiers entre étudiants ?</h3>
				<p class="text-start">
					L'échange de fichiers est essentiel pour un apprentissage collaboratif. En partageant des documents,
					des notes de cours et des résumés,
					les étudiants peuvent renforcer leurs connaissances et obtenir des perspectives différentes sur des
					sujets académiques. Cela permet de
					combler les lacunes, d'apprendre de nouvelles méthodes d'étude et de s'entraider mutuellement dans
					la réussite de leurs études.
				</p>
				<p class=" text-start">
					De plus, le partage de ressources crée une bibliothèque commune qui profite à tous, en offrant un
					accès facile à des outils
					d'apprentissage complémentaires et à des documents essentiels pour le cursus académique de chacun.
				</p>
			</div>
		</div>

		<Footer />
	</div>
</template>

<script setup>
import Footer from "../layout/Footer.vue";
</script>

<style scoped>
	.title {
		font-size: 55px !important;
	}

	.hero {
		background-color: #f1f1f1;
	}
</style>
