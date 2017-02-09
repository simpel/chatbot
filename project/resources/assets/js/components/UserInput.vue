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

                this.success = function(m) {


                    this.$store.commit('sendMessage', {
                        body: 'Placeholder text',
                        part: 'bot',
                        type: 'text'
                    })

                    this.isSendingMessage = false
                    
                }
                this.error = function(m) {
                    this.isSendingMessage = false
                }

                this.$http.post( '/api/dialogue/converse', {"q" : text})
                    .then(this.success, this.error);
              
            }
        }
    }
</script>
