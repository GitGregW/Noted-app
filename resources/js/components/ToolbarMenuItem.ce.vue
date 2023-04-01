<script>
export default {
    props: {
        folders: Object
    }
}
</script>

<template>
    <div v-for="(folder, path) in this.folders">
        <a :href="path" class="toolbar__dropdown__item">
                {{ folder }}
        </a>
    </div>
</template>

<style>
.toolbar__dropdown__item{
    display: block;
    text-decoration: none;
    padding: 0.5rem 1rem;
    font-size: .875rem;
    line-height: 1.25rem;
    color: rgb(55 65 81);
    transition-duration: .15s;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
}
</style>