document.querySelector("#submit").addEventListener("click", function(event) {
    
    
    const value = confirm("Are you sure you want to continue?");
    if(!value)
    event.preventDefault();
}, false);