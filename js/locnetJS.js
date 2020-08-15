
function getEmailFromLS() {

    console.log("funCallOK");

    localStorage.setItem('lastLoginEmail', 'p@ul.com');

    
    if (localStorage.getItem('lastLoginEmail')) {

        var lastEmail = localStorage.getItem('lastLoginEmail');

        document.getElementById("loginEmail").value = lastEmail;

    }
}


// function showModal() {

//     console.log("func called");

//     $('#loginModal').modal('show');

// }

// Show/Hide Content
// var $content = $('.mainContent');

// function showContent(selector) {
    
//     $content.hide();
//     $(selector).show();
    
//     }

// $('.nav-ul').on('click', '.nav-div', function(e) {

//         showContent(e.currentTarget.hash);
//         e.preventDefault();
    
// }); 

//------------------------------------------------------------------------------------------------------

//Shading the selected sidebar element 
// var linkContainer = document.getElementById("mySidebar");
// var navLinks = linkContainer.getElementsByClassName("nav-link");

// for (var i = 0; i < navLinks.length; i++) {

//     navLinks[i].addEventListener("click", function() {

//         var current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         this.className += " active";
//         return;
//   });
// };

//------------------------------------------------------------------------------------------------------

// Document launcher
function launchDoc() {
    // find all html elements with the class "documentLink"
    var documentLinks = document.getElementsByClassName("documentLink");
        // Loop through elements with event listener
        for (var d = 0; d < documentLinks.length; d++) {

            documentLinks[d].addEventListener("click", function() {
                // get data-path (document path specified in data-DNLP (DocNet Library Path) in parent element)
                var linkParent = document.getElementById(this.id).parentElement,
                    ulRoot = linkParent.parentElement,
                    dnLibPath = ulRoot.getAttribute('data-DNLP');
    
                // Check if DN path and file is valid 
                if (dnLibPath && this.id) {
                    // join the External path, DocNet Library Path and filename to form the filePath
                    // DocNet to library relationship in here!
                    var filePath = "../".concat(dnLibPath, this.id);
                    document.getElementById(this.id).setAttribute("href", filePath);
                    return;
                    
                } else {
                    alert("File or Directory not found in the DocNet library");
                }
            });
        }
    }

//------------------------------------------------------------------------------------------------------

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
        



    // $(document).ready(function() {
    //     $('#loginModal').modal('show');
    //     });

       