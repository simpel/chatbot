<template>
    <div id="dialogue">
        <div class="messages">
        
            <div class="message" v-for="message in $store.state.messages" v-bind:key="message">
                    <div :class=message.part>
                        <div class="load">
                            <div :class=message.type class="content">
                                {{message.body}}
                            </div>
                        </div>
                    </div>
                </div>
        
        <div class="message waitingContainer" v-bind:class="{ show: isSending }">
            <div class="bot">
                <div class="load">
                    <div class="content">
                        <span class="dot dot_1"></span>
                        <span class="dot dot_2"></span>
                        <span class="dot dot_3"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</template>

<script>

    import WitCall from './mixins/WitCall.js';


    export default {

        mixins: [WitCall],
        computed: {
            isSending () {
                return this.$store.state.isSending
            }
        }
    }
</script>
