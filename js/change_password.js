const ajax = new XMLHttpRequest();
function change() {
    let old_password = document.getElementById("old-password");
    let new_password = document.getElementById("new-password");
    let password_confirm = document.getElementById("password-confirm");

    let formData = new FormData();
    formData.append('old-password', old_password.value);
    formData.append('new-password', new_password.value);
    formData.append('password-confirm', password_confirm.value);

    old_password.classList.remove("error");
    new_password.classList.remove("error");
    password_confirm.classList.remove("error");

    ajax.open("POST","../include/change_password_server.php",true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                let result = JSON.parse(ajax.response);
                console.dir(result);
                if (result['status']) {
                    let count = 5;
                    let msg = document.getElementById("msg");
                    msg.classList.remove("none");
                    msg.style.color = "#43c910";
                    msg.innerText = result['message'] + "" + count;
                    let btn = document.getElementById("btn");
                    btn.classList.add("none");
                    let cancel = document.getElementById("cancel");
                    cancel.classList.add("none");
                    var timerId = setInterval(function() {

                        msg.innerText = result['message'] + "" + (--count);
                    }, 1000);

                    setTimeout(function() {
                        clearInterval(timerId);
                        document.location.href = '../index.php'
                    }, count*1000);

                } else {
                    if (result['type'] === 1) {
                    console.dir(result['fields'].length);
                    for(let i=0;i<result['fields'].length;i++){
                        let id = document.getElementById(result.fields[i]);
                        id.classList.add("error");
                    }
                    }
                    console.dir(result['message']);
                    let msg = document.getElementById("msg");
                    msg.classList.remove("none");
                    msg.style.color = "#ff4332";
                    msg.innerText = result['message'];

                }
            }
        }
    }
    ajax.send(formData);
}