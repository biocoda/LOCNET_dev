    function showButtons() {
        var buttonCardShow = document.getElementById("sourceButtons");
        buttonCardShow.style.display = "block";
    }
        
     function changeColor(id) {
         const root = document.documentElement;
         var btnToCol = document.getElementById(id); 
         
         showIsolations(id);
         
         if (btnToCol.style.color == 'white') {
             setColor(btnToCol, 'lightgray', 'black');
         } else {
             setColor(btnToCol, 'green', 'white');
         };         
     }

    function setColor(element, bgcolor, txtColor) {
            element.style.backgroundColor = bgcolor;
            element.style.color = txtColor;
    }
        
        
    function showIsolations(id) {
        
        var conCatCard = id + "-card";
        var card = document.getElementById(conCatCard);
        
        if (card.style.display === "block") {
             card.style.display = "none";
         } else {
             card.style.display = "block";
         };
    }
        




       