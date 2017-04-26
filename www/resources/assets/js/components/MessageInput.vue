<template>
  

  <nav class="navbar fixed-bottom bg-faded">
    
<form class="form" method="POST" action="/"  @submit.prevent="submitChatForm">
    <div class="input-group">
      
      <input type="text" class="form-control" v-model="message" placeholder="Skriv ditt meddelande">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Skicka</button>
      </span>
    </div>
  </form>

  </nav>
</template>

<script>

    import bot from './../mixins/bot.js';

    export default {
        mixins: [bot],
        data() {
          return {
            message: ''
          }
        },
        methods: {
          
          submitChatForm: function(e) {
              this.saveUserMessage(this.message);
              this.message = '';
          }

        }
    }
</script>