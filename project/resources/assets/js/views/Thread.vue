<template>
	<div class="thread">
		<div class="dialog">
			
			<div class="message" v-for='message in messages'>
				<div class="meta">
					<span class="user">{{message.user.name}}</span>
					<span class="timestamp">{{ postedOn(message) }}</span>
				</div>
				<div class="body">
					{{message.body}}
				</div>
			</div>
			
			

		</div>
		
		<add-message @completed="AddToThread"></add-message>
	</div>

</template>

<script>

	import moment from 'moment';
	import AddMessage from '../components/addMessage';

	export default {
		components: {
			AddMessage
		},
		data() {
			return {
				messages: []
			}
		},
		created() {
			axios.get('api/messages/1')
				.then(response => this.messages = response.data);

		},
		methods: {
			postedOn(status) {
				return moment(status.created_at).fromNow();
			},
			AddToThread(status) {
				this.messages.push(status);
			}
		}
	}

</script>