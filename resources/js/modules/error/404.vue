<template>
    <div class="flex align-items-center flex-column">
        <span class="font-bold text-4xl">404</span>
        <span class="text-md">La página a la que intentas acceder <b>no existe</b></span>
        <span class="text-md">Para regresar al panel haz clic
            <router-link class="" :to="{name: 'GiftCard'}">aquí</router-link>
        </span>
    </div>
</template>

<style scoped>
a {
    color: black;
    font-weight: bold;
    text-decoration: none;
    color: var(--primary-color);
    transition: var(--base-transition);
}

a:hover {
    color: var(--primary-color-variant);
}
</style>