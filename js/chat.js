const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box")

form.onsubmit = (e)=>{
    e.preventDefault();//impede o envio do formulario
}

 function onMouse() {
    chatBox.classList.add("active");
}
function offMouse(){
    chatBox.classList.remove("active");
}

chatBox.addEventListener('mouseover', onMouse)
chatBox.addEventListener('mouseout', offMouse )

function sendMessage(){
     //INICIO AJAX
     let xhr = new XMLHttpRequest(); //cria xml objeto
     xhr.open("POST","php/insert-chat.php",true);
     xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                inputField.value="";//input fica branco quando envia a messagem
               // var windowWidth = window.innerWidth;
   // var windowHeight = window.innerHeight;
    
    var screenWidth = screen.width;
    //var screenHeight = screen.height;
    
                if(screenWidth > 600){
                    if(!chatBox.classList.contains("active")){//scroll vai ficar em baixo apenas quando o mouse não tiver em cima
                     scrollToBottom()
                } 
                }
               
               
              }
          }
     }
     //ajax manda para o php
     let formData = new FormData(form)//cria novo objeto formdata
     xhr.send(formData);//manda para o php
}
sendBtn.addEventListener("click", sendMessage)

setInterval(()=>{
    //INICIO AJAX
    let xhr = new XMLHttpRequest(); //cria xml objeto
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload = ()=>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 let data = xhr.response
                 chatBox.innerHTML = data
                 var screenWidth = screen.width;
                 //var screenHeight = screen.height;
    
                 if(screenWidth > 600){
                    if(!chatBox.classList.contains("active")){//scroll vai ficar em baixo apenas quando o mouse não tiver em cima
                     scrollToBottom()
                } 
                }
             }
         }
    }
 //ajax manda para o php
 let formData = new FormData(form)//cria novo objeto formdata
 xhr.send(formData);//manda para o php
},500)//atualiza a cada 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight//scroll sempre fica em baixo ao receber uma mensagem
}