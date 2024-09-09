<script>
</script>
<template>
    <header>
        <div class="logo">
            <RouterLink :to="{ name: 'home' }">
                <img src="../../public/logo/logoBeQueenCut 1 (2).png" alt="">
            </RouterLink>

        </div>
        <nav>
            <ul>
                <li>
                    <RouterLink :to="{ name: 'product' }">Catalogue</RouterLink>
                </li>
                <li>
                    <RouterLink :to="{ name: '' }">Personalisation</RouterLink>
                </li>
                <li>
                    <RouterLink :to="{ name: '' }">Contact</RouterLink>
                </li>
            </ul>
        </nav>
        <div class="icone">
            <div class="bag">
                <router-link :to="{ name: 'cart'}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bag-check-fill"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                    </svg>
                </router-link>
            </div>
            <div class="user">
                <router-link :to="{ name: 'signup'}">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                </router-link>

            </div>
            <div class="menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                </svg>
            </div>
            <div class="close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>
        </div>
    </header>
</template>
<script>


export default {
    setup (){
        return {
           
        }
    }

}
</script>
<style scoped>
header {
    width: 100%;

    height: 13vh;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    background-color: var(--primary);
    align-items: center;
}

.logo {
    width: 20%;
    margin: 0 30px;
}

.logo img {
    width: 10%;
    position: absolute;
    top: 20px;
    z-index: 1;
}

nav {
    width: 70%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    color: var(--white);
    font-size: xx-large;
}

nav ul {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
    justify-content: space-around;
}

nav ul li {

    text-align: center;
    position: relative;
}

nav ul li a {
    text-decoration: none;
    color: var(--white);
}

nav ul li::after {
    content: "";
    width: 0;
    height: 0.2vh;
    background: var(--white);
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: width 0.5s ease;
}

nav ul li:hover::after {
    width: 100%;
}

.icone {
    width: 10%;
    display: flex;
    flex-direction: row;
    padding: 30px;
}

.icone svg {
    width: 45%;
    fill: var(--white);
}

.menu {
    display: none;
}

.close {
    display: none;
}
</style>
