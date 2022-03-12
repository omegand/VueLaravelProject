<template>
	<div>
		<div v-if="this.$user.admin" class="row" style="background: #1f1d36">
			<div class="col-4 offset-4 mt-5 mb-5">
				<h3 style="color: #e9a6a6; text-align: center">
					Adding a Topic
				</h3>
				<form @submit="onSubmit">
					<div class="form-row">
						<input
							v-model="topic.title"
							name="title"
							class="form-control"
							placeholder="Title..."
						/>
					</div>
					<div class="form-row">
						<input
							v-model="topic.desc"
							name="desc"
							class="form-control"
							placeholder="Description..."
						/>
					</div>
					<div class="form-row">
						<button type="submit" class="btn btn-primary">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
		<div v-else class="text">You do not have access to this page.</div>
	</div>
</template>

<script>
export default {
	name: "addTopic",
	data: function () {
		return {
			topic: {
				title: "",
				desc: "",
			},
		};
	},
	methods: {
		onSubmit(e) {
			e.preventDefault();
			if (this.topic.title == "") {
				alert("Title is empty.");
				return;
			}
			if (this.topic.desc == "") {
				alert("Description is empty.");
				return;
			}
			axios
				.post("api/topic", {
					title: this.topic.title,
					desc: this.topic.desc,
				})
				.then((response) => {
					if (response.status == 201) {
						this.topic.title = "";
						this.topic.desc = "";
						this.$forceUpdate();
					}
				})
				.catch((error) => {
					alert("Topic already exists.");
				});
		},
	},
};
</script>
<style scoped>
.row {
	text-align: center;
}
.form-row {
	margin-bottom: 12px;
	text-align: center;
}
.text {
	color: #ffc2b4;
	background: #1f1d36;
	text-align: center;
	font-size: 3.6em;
	padding: 6em;
}
</style>