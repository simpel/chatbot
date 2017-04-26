<template>
  <div>
  <div 
    v-bind:class="(message.user_id != 1) ? 'justify-content-md-right' : 'justify-content-md-left'" 
    class="row mb-1"
    v-for="message in messages">
  <div class="col" v-if="(message.user_id != 1)"></div>
  <div class="col-10 col-md-auto">
    <small class="text-muted">{{ message.created_at | moment  }} (<a href="#" @click="removeMessage(message)">Ta bort</a>)</small>
    <div 
      class="card"
      v-bind:class="(message.user_id != 1) ? 'card-primary card-inverse' : ''"
      >
      <div class="card-block">
        <blockquote class="card-blockquote">
        <p class="mb-0">{{ message.msg }}</p>
        </blockquote>
      </div>

      <ul class="list-group list-group-flush" v-for="reply in message.quickreplies">
        <li class="list-group-item">
          <a class="card-link" href="javascript:void(0);" @click="quickReply(message, reply)">{{ reply }}</a>
        </li>    
      </ul>
       
          

   
    
    </div>
  </div>
  <div class="col" v-if="(message.user_id == 1)"></div>
  </div>
</div>
          

</template>

<script>
    import bot from './../mixins/bot.js';

    export default {
        mixins: [bot],
        data() {
          return {
            messages: ''
          }
        }, 
        watch: {
            // whenever question changes, this function will run
            messages: function (e) {
              $("html, body").animate({ scrollTop: $(document).height() }, "fast");
            }
          },
        created() {
          var self = this;
          window.Event.$on('newMessagePosted', function(e) {
            self.messages.push(e);
          })
          
        },
        mounted() {
          var self = this;
          axios.get('/api/meddelande')
            .then(function (response) {
              self.messages = response.data;
              self.saveUserMessage('hej');
            })
            .catch(function (error) {
              console.log(error);
            });
        },
        filters: {
          moment: function (date) {
            return moment(date).fromNow();
          }
        },
        methods: {
          moment: function () {
            return moment();
          },
          removeMessage: function(message) {

            var self = this;
            m = message;
            axios.post('/api/meddelande/tabort/'+message.id, {
              message: message,
              _method: 'delete'
            })
            .then(function (response) {
              self.messages.splice(self.messages.indexOf(m), 1);
              
            });
          },
          quickReply: function(message, reply) {
              message.quickreplies = null;
              this.saveUserMessage(reply);
          }
        }
    }
</script>