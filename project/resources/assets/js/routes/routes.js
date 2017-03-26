import VueRouter from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('../views/Start.vue')
	},
	{
		path: '/om',
		component: require('../views/About.vue')
	},
	{
		path: '/dialog',
		component: require('../views/Thread.vue')
	}
]

export default new VueRouter({
	routes,
	linkActiveClass: 'is-active'
});