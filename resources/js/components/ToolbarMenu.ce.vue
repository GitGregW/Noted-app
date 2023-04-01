<script>
export default {
    props: {
        folderNames: {
            type:String,
            default: ""
        },
        icon: String,
    },
    data() {
        return {
            isOpen: false,
            iconPath: "/icons/feather-sprite.svg#" + this.icon
        }
    },
    computed: {
        theFolderNames: function(){
            return JSON.parse(this.folderNames);
        },
        theToolType: function(){
            switch(this.icon){
                case 'edit':
                    return "Note";
                case 'check-circle':
                    return "Task";
                case 'folder-plus':
                    return "Folder";
            }
        }
    }
}
</script>

<template>
    <div class="toolbar__trigger" style="height: 24px;">
        <button @click="this.isOpen = !this.isOpen" class="toolbar__button">
            <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                <use :href="iconPath"/>
            </svg>
            <span>{{this.type}}</span>
        </button>
    </div>
    <div v-show="isOpen" class="toolbar__dropdown">
        <span v-for="(folder, path) in this.theFolderNames" class="toolbar__dropdown__item">
            <form-modal-component :type="this.theToolType" :folder="folder" :path="path">
                {{ folder }}
            </form-modal-component>
        </span>
    </div>
</template>

<style>
.toolbar__dropdown{
    position: absolute;
    width: 12rem;
    z-index: 50;
    margin-top: 0.5em;
    widows: 12rem;
    border-radius: 0.375rem;
    transform-origin: top left;
    --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);
    --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow);
    --tw-ring-opacity: .05;
    --tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity));
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000);
    padding: 0 0.25rem;
    background-color: white;
}

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

.toolbar__button{
    background-color: transparent;
    border: none;
    padding: 0;
}
</style>