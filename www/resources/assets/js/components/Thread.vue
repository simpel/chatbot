<template>
  
    <div class="columns is-mobile" >
      <div class="column is-6 is-offset-6" id="thread">
        
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
              <div class="columns">
                <div class="column">
                  <p>{{ message.sender }}: {{ message.msg }}</p>
                  <small>{{ message.created_at }}</small>
                </div>
                <div class="column is-1">
                  <a class="delete is-small" @click="removeMessage(message)"></a>
                </div>
              </div>
            </div>
          </div>


            <footer class="card-footer" v-for="reply in message.quickreplies">
              <a class="card-footer-item" @click="quickReply(message, reply)">{{ reply }}</a>
            </footer>


        </div>
      </div>
    </div>

</template>

<script>
    import wit from './../mixins/wit.js';

    export default {
        mixins: [wit],
        data() {
          return {
            messages: ''
          }
        },
        watch: {
            // whenever question changes, this function will run
            messages: function (e) {
              var threadDiv = document.getElementById('thread');
              threadDiv.scrollTop = threadDiv.scrollHeight;
              console.log(threadDiv.scrollY, threadDiv.scrollHeight, threadDiv.clientHeight)
            }
          },
        created() {
          const self = this;

          axios.get('/api/meddelande')
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

            const self = this;
            const m = message;
            axios.post('/api/meddelande/'+message.id, {
              message: message,
              _method: 'delete'
            })
            .then(function (response) {
              self.messages.splice(self.messages.indexOf(m), 1);
              
            })
            .catch(function (error) {
              console.log(error);
            });
          },
          quickReply: function(message, reply) {
              message.quickreplies = null;

              var payload = {
                msg: reply,
                type: 'msg',
                sender: 'user'
              };

              this.saveMessage(payload);
          }
        }
    }
</script>