<template>
    <header>
        <nav class="top-nav">
            <!--        TODO: router-links when vue routes are created        -->
            <a href="#" class="top-nav-link">Accueil</a>
            <a href="#" class="top-nav-link">Chercher des joueurs</a>
            <a href="#" class="top-nav-link">Chercher une guilde</a>
            <a href="#" class="top-nav-link">Connexion</a>
            <a href="#" class="top-nav-link">Rejoignez-nous !</a>
        </nav>
    </header>
    <main class="flex-1">
        <h1 class="first-title">
            <span class="first-letter">G</span>roup<span class="first-letter">F</span
        >inder
        </h1>
        <div class="accroche">
            <article>
                <p>
                    Rejoignez une <span class="first-letter">communauté</span> vibrante de joueurs de World of Warcraft
                    et
                    partez à l'aventure ensemble ! Trouvez votre groupe idéal pour
                    conquérir les <span class="first-letter">donjons</span>, affronter les <span class="first-letter">boss épiques</span>
                    et forger des
                    amitiés durables. Que votre <span class="first-letter">quête</span> commence ici !
                </p>
                <button>
                    Trouvez vos mates !
                </button>
            </article>
            <img class="team-img" src="../../public/assets/img/group.png" alt="Foeoc Kannilc"/>
        </div>
        <h2>Comment ça marche ?</h2>
        <article class="article-info">
            <div class="info-container">
                <p>1</p>
                <section class="info-1">
                    <h3>Créez votre profil</h3>
                    <p>
                        Inscrivez-vous pour créer votre profil et pouvoir ainsi cibler vos
                        recherches plus efficacement !
                    </p>
                </section>
            </div>
            <div class="info-container">
                <p>2</p>
                <section class="info-2">
                    <h3>Trouvez vos mates</h3>
                    <p>
                        Trouvez vos mates ou votre future guilde en un clin d'oeil et arrêtez de slacker en capitale ou de subir des clown fiestas !
                    </p>
                </section>
            </div>
            <div class="info-container">
                <p>3</p>
                <section class="info-3">
                    <h3>Jouez & profitez</h3>
                    <p>
                        N'attendez plus et rejoignez une communauté grandissante de joueurs
                        de WoW qui n'attendent plus que vous !
                    </p>
                </section>
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

    }
}
</script>
