<template>
    <header>
        <div class="upper">
            <img class="logo" src="../../public/assets/img/logo.jpeg" alt="logo"/>
        </div>
        <nav class="top-nav">
            <ul>
<!--        TODO: router-links when vue routes are created        -->
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Chercher des joueurs</a></li>
                <li><a href="#">Chercher une guilde</a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="#">Rejoignez-nous !</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class="first-title">
            <span class="first-letter">G</span>roup<span class="first-letter"
        >F</span
        >inder
        </h1>
        <div class="accroche">
            <p>
                Rejoignez une <span class="first-letter">communauté</span> vibrante de joueurs de World of Warcraft et
                partez à l'aventure ensemble ! Trouvez votre groupe idéal pour
                conquérir les <span class="first-letter">donjons</span>, affronter les <span class="first-letter">boss épiques</span>
                et forger des
                amitiés durables. Que votre <span class="first-letter">quête</span> commence ici !
            </p>
            <img class="dragon" src="../../public/assets/img/wow-dragon.jpg" alt="foeoc kannilc"/>
        </div>
        <h2>Comment ça marche ?</h2>
        <article class="article-info">
            <div class="info-1">
                <h3>Créez votre profil</h3>
                <p>
                    Inscrivez-vous pour créer votre profil et pouvoir ainsi cibler vos
                    recherches !
                </p>
            </div>
            <div class="info-2">
                <h3>Trouver vos mates ou votre guilde</h3>
                <p>
                    Marre de devoir attendre des heures pour entrer en donjon ? Les
                    clown fiesta en PU vous agacent ? Envie de vous lancer dans les
                    raids mais vous n'avez pas encore trouvé la guilde de vos rêves ?
                    Grâce à notre outil de recherche de groupe, vous allez arrêter de
                    slacker en capitale !
                </p>
            </div>
            <div class="info-3">
                <h3>Jouez & profitez</h3>
                <p>
                    N'attendez plus et rejoignez une communauté grandissante de joueurs
                    de WoW qui n'attendent plus que vous !
                </p>
            </div>
        </article>
        <section class="cta">
            <div class="quote">
                <q>Dans la lumière, nous ne faisons qu'un</q> - Dame Liadrin
            </div>
            <div class="ready">
                <p>Soyez prêt à nous</p>
                <button class="join">rejoindre !</button>
            </div>
        </section>
    </main>
    <footer>&copy;Pierre "Golluméo" Mauriello & Sheyleen</footer>
</template>

<script>
export default {
    name: 'App.vue',
    mounted() {
        console.log('App.vue component mounted.');

        // Catch errors from the API using interceptor thing, so we can reject them and treat them in the components
        this.$instance.interceptors.response.use(
            (response) => {
                return response;
            },
            (error) => {
                console.log('Error:', error.response.data);
                return Promise.reject(error);
            }
        );
    }
}
</script>
