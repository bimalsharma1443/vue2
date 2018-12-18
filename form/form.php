<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	</head>
	<body>
		<div id="app">
			<form method="post" action="/validation.php" @submit.prevent="onSubmit" @keydown="error.clear($event.target.name);">
			<input type="text" name="name" placeholder="name" v-model="name">
			<span class="error" v-text="error.get('name')"></span>
			<br/>
			<input type="text" name="age" placeholder="age" v-model="age">
			<span class="error" v-text="error.get('age')"></span>
			<br/>
			<input type="submit" name="submit">
		</div>
		<script>
			class Error {
				constructor() {
					this.error = {}
				}
				get(field) {
					if(this.error[field]) {
						return this.error[field];
					}
				}
				set(error) { 
					this.error = error;
				}

				clear(field) {
					if(this.error[field]) {
						this.error[field] ="";
					}	
				}
			}


			var app = new Vue({
				el : '#app',
				data : {
					name : "",
					age : "",
					error: new Error()
				},
				methods : {
					onSubmit : function() {
						axios.post('./validation.php',this.$data)
							 .then(this.onSucess)
							 .catch(error => this.error.set(error.response.data));
					},
					onSucess : function() {
						alert('done');
						this.name = "";
						this.age = "";
					}

				}
			});
		</script>
	</body>
</html>