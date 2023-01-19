function show(){
    let bar = document.getElementById("menu_bar");
    let title = document.getElementById("menu_title");
    let sub = document.getElementById("menu_sub");

    title.addEventListener('mouseenter', ()=>{
        sub.style.visibility = "visible";
    })
    bar.addEventListener('mouseleave', ()=>{
        sub.style.visibility = "hidden";
    })
}