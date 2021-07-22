const ajax = new XMLHttpRequest();

let avatar = false;
let input_avatar = false;
function img() {
   let input =  document.getElementById("avatar");
   avatar = input.files[0];
   input_avatar = input;
}

function reg() {
    let name  = document.getElementById("name");
    name.classList.remove("error");
    let surname  = document.getElementById("surname");
    surname.classList.remove("error");
    let lastname  = document.getElementById("lastname");
    lastname.classList.remove("error");
    let date  = document.getElementById("date");
    date.classList.remove("error");
    let login  = document.getElementById("login");
    login.classList.remove("error");
    let email  = document.getElementById("email");
    email.classList.remove("error");
    let city  = document.getElementById("city");
    city.classList.remove("error");
    if(input_avatar){
        input_avatar.classList.remove("error");
    }

    let password  = document.getElementById("password");
    password.classList.remove("error");
    let password_confirm  = document.getElementById("password_confirm");
    password_confirm.classList.remove("error");

    let formData = new FormData();
    formData.append('name', name.value);
    formData.append('surname', surname.value);
    formData.append('lastname', lastname.value);
    formData.append('date', date.value);
    formData.append('login', login.value);
    formData.append('email', email.value);
    formData.append('city', city.value);
    formData.append('avatar', avatar);
    formData.append('password', password.value);
    formData.append('password_confirm', password_confirm.value);
    ajax.open("POST","../include/signup.php",true);
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
                    let p = document.getElementById("remove_p");
                    p.classList.add("none");
                    let btn = document.getElementById("btn");
                    btn.classList.add("none");
                    var timerId = setInterval(function() { //Вызов функции timerId каждую секунду
                        msg.innerText = result['message'] + "" + (--count);
                    }, 1000);

                    setTimeout(function() {//Вызов функции через 5 секунд
                        clearInterval(timerId); //Отмена выполнения функции timerId
                        document.location.href = '../index.php' //Переход на страницу авторизации
                    }, count*1000);


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
                    console.dir(result['message']);
                    let msg = document.getElementById("msg");
                    msg.classList.remove("none");
                    msg.style.color = "#ff4332";
                    msg.innerText = result['message'];
                    // $('.msg').removeClass('none').text(data.message);
                }
            }
        }
    }
    // ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // ajax.setRequestHeader("Content-type", "multipart/form-data");
    ajax.send(formData);
    // ajax.send("login=" + login.value + "&password=" + password.value + "&avatar" + avatar);
    // ajax.send(avatar);

}


