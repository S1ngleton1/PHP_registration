const ajax = new XMLHttpRequest();
let user = localStorage.getItem("selected_user");
// console.dir(document.getElementsByClassName("name")[0].textContent = "имяимя");
ajax.open("POST","../include/user_account.php",true);
ajax.onreadystatechange = function () {
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {

            let result = JSON.parse(ajax.response);

            for(item in result){
                if(item =="login"){
                    // console.dir(item);
                    document.getElementById("user").innerText = result[item];
                    document.getElementById("user").classList.remove("none");
                }
                else if(item == "avatar") {
                    document.getElementById("avatar").src = "../" + result[item];
                }
                else{
                    document.getElementsByClassName(item)[0].textContent = result[item];
                }
            }
        }
    }
}
ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
ajax.send("login=" + user);