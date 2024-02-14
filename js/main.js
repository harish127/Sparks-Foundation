function showError(message, event) {
	alert(message);
	event.preventDefault();
}

//validating the send page
document.querySelector("#submit").addEventListener(
	"click",
	function (event) {
		//getting connection to form textBox
		const form_txt = document.querySelector("#From");
		const to_txt = document.querySelector("#To");
		const amount_txt = document.querySelector("#Amt");
		const amount = +amount_txt.value;
		if (isNaN(amount)) {
			showError("Please enter a valid amount", event);
		}

		//checking if textBox is empty or not if empty prevent the submission of form
		if (
			form_txt.value === "" ||
			to_txt.value === "" ||
			amount_txt.value === ""
		) {
			showError("Error: Some of Fields are Empty!!", event);
		} else if (form_txt.value === to_txt.value) {
			//checking if names entered on textBox i.e. from and to if both are same so prevent the form submission
			showError("Error: Please Enter Another name!!", event);
		} else if (amount < 1) {
			showError("Error: Minimum amount is 1 dollar", event);
		} else {
			//Finally asking user to continue if yes then form submit else form wil not submitted
			const value = confirm("Are you sure you want to continue?");
			if (!value) event.preventDefault();
		}
	},
	false,
);
