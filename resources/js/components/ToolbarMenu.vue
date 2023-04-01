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