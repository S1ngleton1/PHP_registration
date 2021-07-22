function delete_acc() {
    const ajax = new XMLHttpRequest();
    if(confirm("Вы действительно хотите удалить аккаунт - " + localStorage.getItem("selected_user"))){
        let login = localStorage.getItem("selected_user");
        ajax.open("POST","../include/delete_acc.php",true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {

                    let result = JSON.parse(ajax.response);
                    if (result['status'] === 1){
                        alert(result['message']);
                        document.location.href = '../include/admin.php';
                    }
                }
            }
        }
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("login=" + login);
    }
    else{
        return;
    }
}