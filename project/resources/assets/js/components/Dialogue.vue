<template>
    <div id="dialogue">
        <div class="messages">
        <div v-for="message in m" v-bind:key="message">
            <div class="message">
                    <div :class="message.part">
                        <div class="load">
                            <div class="content" :class="message.type">
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
        data() {
            return {
            }
        }
    }
</script>
