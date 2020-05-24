window.onload = function(){

    $.get("GetUsers.php", function(data){
        let users = JSON.parse(data)
        let parent = document.getElementById('bodyUsers')
        users.forEach(user => {
            parent.innerHTML += `<tr>`+
                `<td>${user['email']}</td>`+
                `<td>${user['phone']}</td>`+
                `<td>${user['ip']}</td>`+
                `<td><img width="20px" height="20px" src="http://appslabs.net/mobile-brain-test/images/flags/${user['countryCode']}.gif"></td>`
            '<tr>'

        })
    });
}
$("form").submit(function(event){
    event.preventDefault();
    let formValues = $(this).serialize();
    $.post("AddUsers.php", formValues, function(data){
        if(data != 'success'){
            let ArrData = JSON.parse(data)
            for (const [key, value] of Object.entries(ArrData)) {
                if(key == 'email'){
                    document.getElementById('emailError').innerText = value;

                }else if(key == 'phone'){
                    document.getElementById('phoneError').innerText = value;
                }else if(key == 'ip'){
                    document.getElementById('ipError').innerText = value;
                }
            }
        }else{
            alert('the User add')
        }
    });
});
