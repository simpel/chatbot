<template>
  
    <div class="container has-vertical-padding">
        <form method="POST" action="/"  @submit.prevent="sendMessage">
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
    export default {
        data() {
          return {
            message: ''
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          sendMessage: function(e) {

            self = this; 

            axios.post('/api/anvandare/1/meddelande', {
              body: this.message,
              type: 'user'
            })
            .then(function (response) {
              window.Event.$emit('posted', response.data)
            })
            .catch(function (error) {
              console.log(error);
            });
          }
        }
    }
</script>