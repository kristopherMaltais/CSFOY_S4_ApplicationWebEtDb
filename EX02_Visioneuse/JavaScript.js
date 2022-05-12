let h1 = document.getElementsByTagName("h1");

for (element of h1)
{
    element.addEventListener('mouseover', changerCouleurTexteRouge);
    element.addEventListener('mouseout', changerCouleurTexteNoire);
    element.addEventListener('click', changerGrandeImage);
}


function changerCouleurTexteRouge(event)
{
    let valeur = event.target.textContent;
    let number = valeur.substr(valeur.length - 1);
    event.target.style.color = "Red";
    document.body.style.cursor = "Pointer";
    document.getElementById("petiteImage").src = "images/version1/vignettes/img" + number + ".jpg";
}

function changerCouleurTexteNoire(event)
{
    event.target.style.color = "Black";
    document.body.style.cursor = "Auto";
}

function changerGrandeImage(event)
{
    let valeur = event.target.textContent;
    let number = valeur.substr(valeur.length - 1);
    document.getElementById("grandeImage").src = "images/version1/img" + number + ".jpg";
}