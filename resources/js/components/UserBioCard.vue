<template>
	<div class="flex flex-col mb-6">
		<div class="flex justify-between">
			<div class="flex">
				<span class="text-gray-500 font-bold uppercase mr-4">Bio</span>
				<svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300" @click="editing = true" v-show="!editing">
					<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
				</svg>
			</div>
			<div class="flex">
				<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300" v-show="editing" @click="editing = false"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				<span class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white cursor-pointer ml-2" v-show="editing" @click="update()">Update</span>
			</div>
		</div>
		<p class="text-gray-100 text-xl" v-show="!editing">{{ bio }}</p>
		<textarea v-show="editing" placeholder="Give us them deets..." v-model="bio"></textarea>
		<div class="flex flex-col status-msg" :class="{ 'hide-opacity': hideMsg }" v-show="gotResponse">
			<div class="text-white text-shadow-sm" :class="flash.css">
				<p>{{ flash.title }}</p>
				<p>{{ flash.message }}</p>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			updateUrl: {
				type: String,
				required: true
			},
			user: {
				type: Object,
				required: true
			}
		},

		data() {
			return {
				editing: false,
				bio: '',
				gotResponse: false,
				hideMsg: false,
				flash: {
					css: '',
					title: 'Default title',
					message: 'Default message'
				}
			}
		},

		mounted() {
			this.bio = this.user.bio
		},

		methods: {
			update() {
				let _self = this
				_self.editing = false

				let payload = {
					bio: _self.bio
				}

				axios.post(_self.updateUrl, payload)
					.then(function (resp) {
						console.log(resp.data)
						if (resp.data.error) {
							_self.flash.css = 'bg-red-700'
						} else {
							_self.flash.css = 'bg-green-700'
						}
						_self.flash.title = resp.data.title
						_self.flash.message = resp.data.message
					})
					.catch(function (erro) {
						console.error(erro)
						_self.flash.css = 'bg-red-700'
						_self.flash.title = "Server Error"
						_self.flash.message = "Server done goofed."
					})
					.finally(function () {
						_self.gotResponse = true
						setTimeout(function () {
							_self.hideMsg = true
						}, 3000)
						setTimeout(function () {
							_self.gotResponse = false
						}, 4000)
					})
			}
		}
	}
</script>