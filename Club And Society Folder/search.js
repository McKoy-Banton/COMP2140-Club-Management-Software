window.addEventListener
("load", () =>
{
    const form = document.querySelector("form");
    const result=document.querySelector("#result");
    const input=document.querySelector("input");

    fetch(`search or register.php`)

        .then(response => response.text())

        .then(data => 
        {
            result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });

    
    
    form.addEventListener('submit', function(event) 
    {

        event.preventDefault();
        let name = input.value.trim();
        let fetch_paramter = `search or register.php?name=${name}`;

        fetch(fetch_paramter)

        .then(response => response.text())

        .then(data => 
        {
            result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });

    });

    const registerForm = document.getElementById('register');
    const registerinput=document.getElementById("register_input");
    const register_result=document.getElementById("register_result");
    
    registerForm.addEventListener('submit', function(event) 
    {
        event.preventDefault();
        
        let clubname = registerinput.value.trim();
        let fetch_paramter = `search or register.php?clubname=${clubname}`;

        fetch(fetch_paramter)

        .then(response => response.text())

        .then(data => 
        {
            register_result.innerHTML = data;
        })
        .catch(error => 
        {
            console.log(error);
        });
    });
}
)