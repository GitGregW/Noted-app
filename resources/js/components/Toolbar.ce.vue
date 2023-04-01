
<template>
    <nav style="background-color: #889CAE;position: sticky;top: 0;padding: 0.5em 1em;">
        <div class="toolbar">
            <slot></slot>
        </div>
    </nav>
</template>

<style>
.toolbar{
    display: flex;
    justify-content: center;
    gap: 4em;
}
</style>