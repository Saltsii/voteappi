// Register -sivun toiminnallisuus

document.forms['register'].addEventListener('submit', registerNewUser);

function registerNewUser(event){

    event.preventDefault();

    const username = document.forms['register']['username'].value;
    const password = document.forms['register']['password'].value;
    const password2 = document.forms['register']['confirmPassword'].value;

    if (username.length <= 0) {
        showMessage('error','username is required');
        return;
    }

    if (password.length <= 4) {
        showMessage('error','Minimum is 4 characters');
        return;
    }

    if (password.localeCompare(password2) != 0 ){
        showMessage('error','Password not matching!');
        return;
    }

    console.log('Registering new user')

    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        const data = JSON.parse(this.responseText);
        if (data.hasOwnProperty('success')) {
            window.location.href = "login.php?type=success&msg=Rekisteröityminen onnistui";
        } else {
            showMessage('error',data.error);
        }
    }
    ajax.open("POST", "backend/registerNewUser.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    ajax.send("username="+username+"&password="+password);

}