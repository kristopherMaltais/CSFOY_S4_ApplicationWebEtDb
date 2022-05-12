
// Constantes
const NOMBRES = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "."];
const OPERATEURS = ["*", "+", "-", "/"];
const EGALE = "=";
const REINITIALISER = "C";

// Variables globales non constantes
let nombreEnConstruction = "";
let calculeARealiser = [];

// Ajouter eventlistener sur toutes les touches
let touches = document.querySelectorAll(".calculator div");
for (touche of touches)
{
    if(NOMBRES.includes(touche.textContent) || OPERATEURS.includes(touche.textContent) || touche.textContent == EGALE || touche.textContent == REINITIALISER)
    {
        touche.addEventListener('click', main);
    }
}

function main(event)
{

    let toucheEnCours = event.target.textContent;
    if(NOMBRES.includes(toucheEnCours))
    {
        construireNombre(toucheEnCours);
    }
    else if(OPERATEURS.includes(toucheEnCours))
    {
        ajouterOperateur(toucheEnCours);
    }
    else if(toucheEnCours == EGALE)
    {
        if(calculeARealiser.length != 0)
        {
            calculerTotal();
        }
    }
    else if(toucheEnCours == REINITIALISER)
    {
        reinitialiser();
    }
}
function construireNombre(nombreAAjouter)
{
    nombreEnConstruction += nombreAAjouter;
    modifierInput(nombreEnConstruction)
}
function modifierInput(nombreAAfficher)
{
    document.getElementById("input").textContent = nombreAAfficher;
}
function ajouterOperateur(operateur)
{
    calculeARealiser.push(nombreEnConstruction);
    calculeARealiser.push(operateur);
    nombreEnConstruction = "";
    modifierInput(nombreEnConstruction);
}
function calculerTotal()
{
    calculeARealiser.push(nombreEnConstruction);
    let total = parseFloat(calculeARealiser[0]);
    let operateur = "";

    for (section of calculeARealiser.slice(1))
    {
        if(OPERATEURS.includes(section))
        {
            operateur = section;
        }
        else
        {
            total = realiserOperationSimple(total, operateur);
        }
    }

    modifierInput(estEntier(total) ? total : total.toFixed(4));
}
function reinitialiser()
{
    modifierInput("");
    nombreEnConstruction = "";
    calculeARealiser = [];
}
function realiserOperationSimple(total, operateur)
{
    switch(operateur)
    {
        case "-":
            total = total - parseFloat(section);
            break;
        case "+":
            total = total + parseFloat(section);
            break;
        case "/":
            total = total / parseFloat(section);
            break;
        case "*":
            total = total * parseFloat(section);
            break;
    }

    return total;
}
function estEntier(nombre)
{
    return nombre % 1 === 0;
}

