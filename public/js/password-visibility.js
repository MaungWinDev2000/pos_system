function passwordVisibility() {
	const field = document.getElementById("password");
	const showPass = document.getElementById("showPass");
	const hidePass = document.getElementById("hidePass");

	if (field.type === "password") {
		field.type = "text";
		showPass.classList.remove("d-none");
		hidePass.classList.add("d-none");
	} else {
		field.type = "password";
		showPass.classList.add("d-none");
		hidePass.classList.remove("d-none");
	}
}