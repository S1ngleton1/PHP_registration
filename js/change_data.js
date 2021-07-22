const ajax = new XMLHttpRequest();

let new_avatar = false;
let input_avatar = false;
function new_img() {
    let input =  document.getElementById("new-avatar");
    new_avatar = input.files[0];
    input_avatar = input;
}
function change() {
    let new_name = document.getElementById("new-name").value;
    let new_surname = document.getElementById("new-surname").value;
    let new_lastname = document.getElementById("new-lastname").value;
    let new_data = document.getElementById("new-date").value;
    let new_city = document.getElementById("new-city").value;
    let new_email = document.getElementById("new-email").value;

    let formData = new FormData();
    formData.append('new-name', new_name);
    formData.append('new-surname', new_surname);
    formData.append('new-lastname', new_lastname);
    formData.append('new-date', new_data);
    formData.append('new-city', new_city);
    formData.append('new-email', new_email);
    formData.append('new-avatar', new_avatar);

    let id = document.getElementById("new-email");
    id.classList.remove("error");

    ajax.open("POST","../include/change_data_server.php",true);
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
                    // console.dir(result['fields'].length);
                        // for(let i=0;i<result['fields'].length;i++){
                            let id = document.getElementById(result.fields);
                            id.classList.add("error");
                        // }
                    }
                    else if (result['type'] === 2){
                        let msg = document.getElementById("msg");
                        msg.classList.remove("none");
                        msg.style.color = "#ff4332";
                        msg.innerText = result['message'];
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