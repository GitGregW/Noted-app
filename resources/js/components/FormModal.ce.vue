<script>
export default {
  props: {
    type: String,
    folder: String,
    path: String
  },
  data() {
    return {
      show: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      formPath: this.path ? "/folders/" + this.path + "/" + this.type.toLowerCase() + "s" : "/folders",
      formTitle: this.folder ? "Folders > " + this.folder + " > Add A " + this.type : "Folders > Add a Folder",
      errors: {},
      form: {
        name: '',
        title: '',
        description: '',
        body: ''
      }
    }
  },
  methods: {
    async submit(){
      try{
        location = (await axios.post(this.formPath)).data.message;
      } catch (error) {
        this.errors = error.response.data.errors;
      }
    }
  }
}
</script>

<template>
  <a href="" id="show-modal" @click.prevent="show = true">
    <slot></slot>
  </a>
  <Teleport to="body">
  <Transition name="modal">
    <div v-if="show" class="modal-mask">
      <div class="modal-container">
        <span class="modal-name">{{this.formTitle}}</span>
        <!-- <form class="noted__form" @submit.prevent="submit"> -->
        <form class="noted__form" :action="formPath" method="post">
          <input type="hidden" name="_token" :value="csrf">
          <span v-if="this.type === 'Note'">
            <div class="modal-header">
              <label for="title">Header</label>
              <input type="text" name="title" id="title" v-model="form.title">
            </div>
            <div style="position: relative;margin: 1em 0;">
              <label for="description" class="textarea__label">Note</label>
              <textarea name="description" id="description" rows="5" v-model="form.description"></textarea>
            </div>
          </span>
          <span v-else-if="this.type === 'Task'">
            <div style="position: relative;margin: 1em 0;">
              <label for="description" class="textarea__label" style="left:0;">Task</label>
              <input class="task__input" type="text" name="body" id="body" v-model="form.body">
            </div>
          </span>
          <span v-else-if="this.type === 'Folder'">
            <div class="modal-header">
              <label for="title">Folder</label>
              <input type="text" name="name" id="name" v-model="form.name">
            </div>
          </span>
          <span v-else>Form not found.</span>
          <div class="modal-footer">
            <button class="primary">Add {{this.type}}</button>
            <button class="muted" type="button" @click="show = false">Cancel</button>
          </div>
        </form>
        
      </div>
    </div>
  </Transition>
  </Teleport>
</template>