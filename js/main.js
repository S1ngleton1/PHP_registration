const ajax = new XMLHttpRequest();
function SignIn() {
    let login = document.getElementById("login").value;
    let password = document.getElementById("password").value;
    ajax.open("POST","../include/signin.php",true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                let result = JSON.parse(ajax.response);
                if (result['status']) {
                    if(result['person']==="User"){
                        document.location.href = '../include/profile.php';
                    }
                    else if(result['person']==="Admin"){
                        document.location.href = '../include/admin.php';
                    }
                } else {
                    if (result['type'] === 1) {
                        for(let i=0;i<result['fields'].length;i++){
                            let id = document.getElementById(result.fields[i]);
                            id.classList.add("error");
                        }
                        // result.fields.forEach(function (field) {
                        //     $(`input[name="${field}"]`).addClass('error');
                        // });
                    }
                    let msg = document.getElementById("msg");
                    msg.classList.remove("none");
                    msg.innerText = result['message'];
                }
            }
        }
    }
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("login=" + login + "&password=" + password);
}