const confirmacion = ()=>{
   let bandera= confirm("esta seguro que quiere elimarlo?");

   if(bandera===false){
        event.preventDefault();//funcion para cancelar un evento 
   }
}