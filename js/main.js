//validating the send page
document.querySelector("#submit").addEventListener("click", function(event) {
    
    //getting connnection to form textbox
    const form_txt = document.querySelector("#From");
    const to_txt = document.querySelector("#To");
    const amount_txt = document.querySelector("#Amt");

    //checking if textbox is empty or not if empty prevent the submission of form
    if(form_txt.value ===""|| to_txt.value==="" || amount_txt.value===""){
        alert("Error: Some of Fields are Empty!! ")
        event.preventDefault();
    }
    else if(form_txt.value === to_txt.value){  //checking if names entered on textbox i.e. from and to if both are same so prevent the form submission 
        alert("Error: Please Enter Another name!! ")
        event.preventDefault();
    }
    else{ //Finally asking user to continue if yes then form submit else form wil not submitted 
    const value = confirm("Are you sure you want to continue?");
    if(!value)
    event.preventDefault();
    }
}, false);