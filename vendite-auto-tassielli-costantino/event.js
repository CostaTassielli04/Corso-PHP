window.addEventListener("load", () => {
    let bottone = document.getElementById("continua");
    let div = document.getElementById("div1");
    select.addEventListener("click", () => {
        var select2 = document.createElement("select");
        select2.name = "modello"
        select2.id = "modello"
        div1.appendChild(select2);
        //var jsonObj= <?php echo json_encode($products);?>   // recupero il valore della mia variabiel json popolata in php
        for (var i in jsonObj) { //scorro il mio vettore e creo un menù a tendineìa
            var option = document.createElement("option");
            option.setAttribute("value", jsonObj[i]);
            option.text = jsonObj[i];
            select2.appendChild(option);
        }
        var bottone = document.createElement("a"); //creo un pulsante per innescare lo statement da mostrare a video
        bottone.type = "button"
        bottone.name = "category"
        bottone.class = "btn btn-outline-success"
        bottone.innerHTML = "Submit"
        bottone.href = "table.php"
        let form = document.getElementById("form1");
        form.appendChild(bottone);
    });
});