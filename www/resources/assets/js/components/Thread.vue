<template>
  
    <div class="columns is-mobile">
      <div class="column is-6 is-offset-6">
        
        <div class="card" :class="message.type"  v-for="message in messages">
          <!-- 
          <header class="card-header">
            <p class="card-header-title">
              Component
            </p>
            <a class="card-header-icon">
              <span class="icon">
                <i class="fa fa-angle-down"></i>
              </span>
            </a>
          </header>
          -->
          <div class="card-content">
            <div class="content">
              {{ message.body }}
              <small>{{ message.created_at }}</small>
              <a class="delete is-small" @click="removeMessage(message)"></a>
            </div>
          </div>
        </div>
      </div>
    </div>

</template>

<script>
    export default {
        data() {
          return {
            messages: ''
          }
        },
        created() {
          const self = this;

          axios.get('/api/anvandare/1/meddelande')
            .then(function (response) {
              self.messages = response.data;
            })
            .catch(function (error) {
              console.log(error);
            });
        },
        mounted() {
          const self = this;
          window.Event.$on('posted', function(e) {
            self.messages.push(e);
          })
        },
        methods: {
          removeMessage: function(message) {
            console.log(message.id)
          }
        }
    }
</script>