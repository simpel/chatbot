<template>


  <nav class="navbar navbar-default navbar-fixed-bottom" id="userinput">
            <div class="container-fluid">
                

    <form v-on:submit.prevent="converse">
        <div class="input-group">

            <input type="text" class="form-control" v-model="message" placeholder="Type here my friend..." ref="messageInput" autofocus>
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Send</button>
            </span>
        </div>
    </form>
    </div>
        </nav>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            }
        },
        methods: {
            converse: function () {
                this.$refs.messageInput.focus()
                
                this.success = function(m) {
                    
                }
                this.error = function(m) {
                    console.log('ERROR!!!', m);
                }

                this.$http.post( '/api/dialogue/converse', {"q" : this.message})
                    .then(this.success, this.error);

            }
        }
    }
</script>
