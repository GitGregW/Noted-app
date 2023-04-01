import '../css/app.css';
import '../sass/app.scss';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler.js'

const app = createApp({})

import ExampleComponent from './components/ExampleComponent.vue'

createApp(ExampleComponent).mount("#app")

// const rootComponent2 = createApp({
//     data(){
//         return {
//             message: "Hello Toolbar"
//         };
//     },
//     components: {
//         'toolbar-component': Toolbar,
//     },
// },);

// rootComponent2.mount('#toolbar');

import { defineCustomElement } from 'vue'

import FormModal from './components/FormModal.ce.vue';
import Toolbar from './components/Toolbar.ce.vue';
import ToolbarMenu from './components/ToolbarMenu.ce.vue';
import ToolbarMenuItem from './components/ToolbarMenuItem.ce.vue';

import ToolbarVue from './components/Toolbar.vue';
// import ToolbarMenuVue from './components/ToolbarMenu.vue';

createApp(ToolbarVue).mount("#toolbar")

// console.log(Example.styles) // ["/* inlined css */"]

// convert into custom element constructor
const FormModalElement = defineCustomElement(FormModal)
const ToolbarElement = defineCustomElement(Toolbar)
const ToolbarMenuElement = defineCustomElement(ToolbarMenu)
const ToolbarMenuItemElement = defineCustomElement(ToolbarMenuItem)

// register
customElements.define('form-modal-component', FormModalElement)
customElements.define('toolbar-component', ToolbarElement)
customElements.define('toolbar-menu-component', ToolbarMenuElement)
customElements.define('toolbar-menu-item-component', ToolbarMenuItemElement)