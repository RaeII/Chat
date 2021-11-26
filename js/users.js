const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list")

function searchEvent(){
   searchBar.classList.toggle("active")
   searchBar.focus();
   searchBtn.classList.toggle("active")
   searchBar.value = "";
}
searchBtn.addEventListener("click",searchEvent)

//pesquisar
searchBar.onkeyup = ()=>{
   let searchTerm = searchBar.value;
   if(searchTerm != ""){
      searchBar.classList.add("active");
   }else{
      searchBar.classList.remove("active");
   }

      //INICIO AJAX
      let xhr = new XMLHttpRequest(); //cria xml objeto
      xhr.open("POST","php/search.php",true);
      xhr.onload = ()=>{
           if(xhr.readyState === XMLHttpRequest.DONE){
               if(xhr.status === 200){
                   let data = xhr.response
                   usersList.innerHTML = data
               }
           }
      }
   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");   
   xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
     //INICIO AJAX
     let xhr = new XMLHttpRequest(); //cria xml objeto
     xhr.open("GET","php/users.php",true);
     xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                  let data = xhr.response
                  if(!searchBar.classList.contains("active")){//se não tiver ativo a busca, aparece todos os usuarios
                     usersList.innerHTML = data
                  }
                  
              }
          }
     }
  xhr.send();
},500)//atualiza a cada 500ms