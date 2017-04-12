<template>
  
    <div class="container has-vertical-padding">
        <form method="POST" action="/"  @submit.prevent="submitChatForm">
            <div class="control is-grouped">
              <p class="control is-expanded">
                  <input class="input is-medium" v-model="message" rows="1" type="text" placeholder="Skriv ditt meddelande"/>
              </p>
              <p class="control">
                  <button class="button is-primary is-medium">
                      Skicka
                  </button>
              </p>
            </div>
        </form>
    </div>

</template>

<script>

    import wit from './../mixins/wit.js';

    export default {
        mixins: [wit],
        data() {
          return {
            message: ''
          }
        },
        methods: {
          
          submitChatForm: function(e) {
            var payload = {
              msg: this.message,
              type: 'msg',
              sender: 'user'
            };

            this.saveMessage(payload);
            this.sendToBot(payload);
          }

        }
    }
</script>