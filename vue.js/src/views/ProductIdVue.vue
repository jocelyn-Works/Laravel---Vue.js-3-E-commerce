<script>
import ProductIdVue from '../components/ProductId.vue';


export default {
    components: {
        ProductIdVue

    }

}
</script>

<template>
    <main>
        <ProductIdVue />
        <section class="contentProduct">
            <div class="content1">
                <h3>CONSTRUIT PAR DES PASSIONNÉS, POUR DES PASSIONNÉS.</h3>
                <p>
                    Chez Be Queen, le plaisir de conduite est au centre de nos préoccupations.
                    Ton futur vélo est aussi cool à rider qu’à regarder.
                    Aucun compromis sur la qualité de fabrication de notre cadre Annécien en aluminium garanti à
                    vie pour profiter indéfiniment de ton Bikle.
                    Profitez également d’un SAV irréprochable, d’une équipe disponible pour répondre à toutes vos
                    questions avant, pendant et après votre achat.
                    La qualité du produit et la performance de notre SAV font aujourd’hui de Bikle la meilleure marque
                    de vélos électriques du marché.
                    Retrouvez ici le certificat de conformité CE EN 15194
                    *Cadre garanti à vie sur son intégrité structurelle dans les conditions normales d’utilisation. Hors
                    peintures et accessoires.</p>
                <img src="../../public/productId/Group.png" alt="">
            </div>
            <div class="content2">
                <h4>Notre Histoire</h4>
                <p>
                    l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de
                    texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq
                    siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit
                    modifié. </p>
                    <img src="../../public/productId/velo-ancien-2 1.png" alt="">
            </div>

        </section>
    </main>
</template>

<style scoped>
.contentProduct {
    padding: 4rem;
}

.content1 {
    width: 50%;
    background-color: var(--brown);
    padding: 5rem;
    font-size: 1.5rem;
    border-radius: 15px;
    color: var(--white);
    text-align: center;
    line-height: 3rem;
}

.content1 img {
    position: absolute;
    top: 140%;
    left: 55%;
}
.content2 {
    width: 50%;
    margin-top: 8rem;
    margin-left: 40%;
    background-color: var(--brown);
    padding: 5rem;
    font-size: 1.5rem;
    border-radius: 15px;
    color: var(--white);
    text-align: center;
    line-height: 3rem;
}

.content2 img {
    position: absolute;
    top: 220%;
    left: 30%;
}
</style>