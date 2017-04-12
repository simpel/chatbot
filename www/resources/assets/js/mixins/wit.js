module.exports = {
    methods: {
        saveMessage: function(payload) {           
        
            axios.post('/api/meddelande', payload)
              .then(function (response) {
                window.Event.$emit('posted', payload);
              })
              .catch(function (error) {
                console.log(error);
              });
            

            
        },
        
        sendToBot: function(payload) {
            
            var self = this;

            axios.post('/api/bot', payload)
            .then(function (response) {
              
              if(response.data.type != 'stop') {
                
                /*
                if(response.data.quickreplies) {
                    window.Event.$emit('posted', response.data);
                } else {
                    
                }
*/
                self.saveMessage(response.data);

                self.sendToBot(response.data.msg);
              }

              
            })
            .catch(function (error) {
              console.log(error);
            });
        }
    }
}