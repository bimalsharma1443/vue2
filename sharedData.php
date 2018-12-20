<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	</head>
	<body>
		<h1>Shared Data</h1>
		<div id="one">
			<h4>{{ name}}</h4>
		</div>
		<div id="two">
			<h4>{{ shared.name}}</h4>
		</div>
		<script>
			let store = {
				name : "Palladium"
			};

			new Vue({
				el : "#one",
				data : store
			});

			new Vue({
				el : "#two",
				data : {
					shared : store
				} 
			});



		</script>
	</body>
</html>
