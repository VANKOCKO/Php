$(function()
{
     var count = 0;
     $("#MarkerMap").on('click',function(e){
         count ++;
         var coordX = e.pageX - $(this).offset().left;
         var coordY = e.pageY - $(this).offset().top;
         //Créé une nouvelle div et l'affiche sur la map pour representer le nouvel ajout d'un repère
         var p = document.createElement("div");
         p.setAttribute("id", "repereMap_" + count);
         p.style.width = 10 + "px";
         p.style.height = 10 + "px";
         p.style.backgroundColor = "black";
         p.style.left = coordX + 'px';
         p.style.top = coordY + 'px';
         p.style.position= "absolute";
         $(this).append(p);
         
          /**
         *  save point 
         */
        
         $.ajax({ 
              url:"http://kockoconsulting.alwaysdata.net/PhpApplication/MarquerMap/ConnectDb.php",
              method : "POST",
             data: {
                    coordX : coordX,
                    coordY : coordY
             }
             }).done(function(){
          
        });
        
        /**
         *  create table 
         */
        var tr=$( 
                '<tr>'+ 
                        '<td>'+'</td>'+
                        '<td>' + count + '</td>'+
                        '<td>' + coordX + '</td>'+
                        '<td>' + coordY + '</td>'+
                '</tr>');
        $("#tbody").append(tr);
            
        
        /**
         * 
         */
        var url=$(this).prop('href');
          $("#DbShow").load(url);
          e.preventDefault(); 
        
    });
        
})