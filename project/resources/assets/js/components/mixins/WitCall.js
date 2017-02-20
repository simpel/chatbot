module.exports = {
    methods: {
        makeAjaxCall (text = null) {

            this.$store.commit('broadCasting', true)

            var success = function(m) {
                this.$store.commit('broadCasting', false)

                var payload = m.data;
                payload.part = 'bot';

                console.log(payload);

                if($.inArray(payload.type, ['msg', 'quickreplies']) != -1) {
                    this.$store.commit('sendMessage', payload)
                    this.makeAjaxCall();
                }

                
            }
            var error = function(m) {
                this.$store.commit('broadCasting', false)
            }

            this.$http.post( '/api/dialogue/converse', {
                "q" : text,
                "session_id": 'sss',
                "v": '3e'
            }).then(success, error);
            }
    }
}