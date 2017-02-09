<template>
    <div id="dialogue">
        <div class="messages">
        <div v-for="message in $store.state.messages" v-bind:key="message">
            <div class="message">
                    <div :class=message.part>
                        <div class="load">
                            <div :class=message.type class="content">
                                {{message.body}}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>



    export default {
        
    }
</script>
