module.exports = {
    methods: {
        
        
        saveUserMessage: function(message, type = 'msg') {           
            
            var self = this;

            axios.post('/api/meddelande', {
              message: message,
              type: type
            })
            .then(function (response) {
              window.Event.$emit('newMessagePosted', response.data);
              self.sendMessageToBot(message);
            });
        },


        sendMessageToBot: function(message, type = 'msg') {
            
            var self = this;

            axios.post('/api/bot', {
              message: message,
              type: type
            })
            .then(function (response) {

              console.log('response.data',response.data);

              if(response.data.type != 'stop' && response.data) {
                window.Event.$emit('newMessagePosted', response.data);
                self.sendMessageToBot(null, true);
              }
            });
        }
    }
}