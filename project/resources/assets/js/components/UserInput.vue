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
                :disabled="isSending">
            
        </div>

    </div>
        </nav>
</template>

<script>

    import WitCall from './mixins/WitCall.js';

    export default {
        mixins: [WitCall],
        computed: {
            isSending () {
                return this.$store.state.isSending
            }
        },
        methods: {
            sendMessage (e) {
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
