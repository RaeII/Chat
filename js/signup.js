const  form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt")

form.onsubmit = (e)=>{
    e.preventDefault();//preventing form from submitting
}

function continueChat(){
    //INICIO AJAX
    let xhr = new XMLHttpRequest(); //cria xml objeto
    xhr.open("POST","php/signup.php",true);
    xhr.onload = ()=>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 let data = xhr.response;
                 if(data == "success"){
                      location.href = "users.php"
                 }else{
                    errorText.textContent = data;
                    errorText.style.display = "block"
                 }
             }
         }
    }
    //ajax manda para o php
    let formData = new FormData(form)//cria novo objeto formdata
    xhr.send(formData);//manda para o php
}

continueBtn.addEventListener("click",continueChat)