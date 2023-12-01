window.addEventListener
("load", () =>
{
    //for phone number
    const phone_form = document.getElementById("phone_num");
    const phone_result=document.getElementById("phone_result");
    const phone_input=document.getElementById("phone_input");

    fetch(`edit student data.php`)

        .then(response => response.text())

        .then(data => 
        {
            phone_result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });

    
    
    phone_form.addEventListener('submit', function(event) 
    {

        event.preventDefault();
        let phone = phone_input.value.trim();
        let fetch_paramter = `edit student data.php?phone=${phone}`;

        fetch(fetch_paramter)

        .then(response => response.text())

        .then(data => 
        {
            phone_result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });

    });

    //for email address
    const emailForm = document.getElementById('email_address');
    const emialInput=document.getElementById("email_imput");
    const email_result=document.getElementById("email_result");
    
    emailForm.addEventListener('submit', function(event) 
    {
        event.preventDefault();
        
        let newemail = emialInput.value.trim();
        let fetch_paramter = `edit student data.php?email=${newemail}`;

        fetch(fetch_paramter)

        .then(response => response.text())

        .then(data => 
        {
            email_result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });
    });

    const interestForm = document.getElementById('interest');
    const interest_input=document.getElementById("interest_input");
    const interest_result=document.getElementById("interest_result");
    
    interestForm.addEventListener('submit', function(event) 
    {
        event.preventDefault();
        
        let newinterest = interest_input.value.trim();
        let fetch_paramter = `edit student data.php?interest=${newinterest}`;

        fetch(fetch_paramter)

        .then(response => response.text())

        .then(data => 
        {
            interest_result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });
    });


}
)