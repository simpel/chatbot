<template>


  <nav class="navbar navbar-default navbar-fixed-bottom" id="userinput">
            <div class="container-fluid">
                

        <div class="input-group">

            <input 
                type="text" 
                class="form-control" 
                placeholder="Type here my friend..." 
                autofocus 
                @keyup.enter="sendMessage"
                :disabled="isSendingMessage">
            
        </div>

    </div>
        </nav>
</template>

<script>
    export default {
        data: function() {
            return {
                isSendingMessage: false
            }
        },
        methods: {
            makeAjaxCall (text = null) {
                var success = function(m) {

                    

                    console.log(m.data.type, m.data.type !== 'stop', m.data);

                    if(m.data.type != 'stop') {

                        this.$store.commit('sendMessage', {
                            body: m.data.msg,
                            part: 'bot',
                            type: 'text'
                        })

                        this.isSendingMessage = false

                        this.makeAjaxCall();
                    }

                    
                }
                var error = function(m) {
                    this.isSendingMessage = false
                }

                this.$http.post( '/api/dialogue/converse', {"q" : text})
                    .then(success, error);
            },
            sendMessage (e) {
                this.isSendingMessage = true;
                const text = e.target.value
                
                if (text.trim()) {

                    this.$store.commit('sendMessage', {
                        body: text,
                        part: 'human',
                        type: 'text'
                    })
                }

                e.target.value = ''

                this.makeAjaxCall(text);
                
              
            }
        }
    }
</script>
