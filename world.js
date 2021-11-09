window.onload= mystarter;
function mystarter(){
    let countrybtn = document.getElementById('lookup');
    let message = document.getElementById('result');
    console.log(countrybtn)
    countrybtn.addEventListener('click',function(element){
        element.preventDefault();
        var mi_form = document.getElementById("country").value;
        fetch("world.php"+"? country=" +mi_form)
        .then(response =>{
            if (response.ok){
                return response.text()
            } else{
                return Promise.reject("Something went wrong")
            }
        
        })
        .then(data => {
            message.innerHTML = data;
        })
        .catch(error => console.log('There was an error: ' + error));
    });
    var citybtn = document.getElementById("cities");
    citybtn.addEventListener("click", function(e){
        e.preventDefault();
        var lookupqueryfunc = document.getElementById("country").value;
        var hrequest = new XMLHttpRequest();

        var urlcode = "world.php?country=" + lookupqueryfunc + "&context=cities";
    }
}