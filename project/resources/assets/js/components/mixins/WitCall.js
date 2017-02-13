module.exports = {
    methods: {
        makeAjaxCall (text = null) {

            this.$store.commit('broadCasting', true)

            var success = function(m) {
                this.$store.commit('broadCasting', false)

                if(m.data.type != 'stop') {

                    this.$store.commit('sendMessage', {
                        body: m.data.msg,
                        part: 'bot',
                        type: 'text'
                    })

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
            })
                .then(success, error);
            }
    }
}