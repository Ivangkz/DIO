document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Evento para mostrar y ocultar menú
    function open_close_menu(){
        body.classList.toggle("body_move");
        side_menu.classList.toggle("menu__side_move");
    }

//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

if (window.innerWidth < 760){

    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
}

//Haciendo el menú responsive(adaptable)

window.addEventListener("resize", function(){

    if (window.innerWidth > 760){

        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    }

    if (window.innerWidth < 760){

        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }

});

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.examples-button a');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const topic = this.closest('.product').querySelector('h2').innerText;
            const language_id = this.closest('main').getAttribute('data-language-id');
            
            fetchContent(topic, language_id);
        });
    });
    
    function fetchContent(topic, language_id) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `get_info.php?topic=${encodeURIComponent(topic)}&language_id=${encodeURIComponent(language_id)}`, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.querySelector('main').innerHTML = xhr.responseText;
            } else {
                console.error('Error fetching content');
            }
        };
        xhr.send();
    }
});
