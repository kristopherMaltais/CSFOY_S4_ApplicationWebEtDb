// Question 1
// document.addEventListener("click", changerTexte);
// function changerTexte()
// {
//     document.getElementById("texte1").textContent = "Et voilà!";
// }


// Question 2
// document.addEventListener("click", changerTexte);

// function changerTexte()
// {
//     document.getElementById("texte2").textContent = "Et voilà!";
// }


// Toujours mettre un "use strict"; dans notre code js
//Question 2
// let image = document.getElementById("image");
// image.addEventListener("mouseover", changerImage); // on ne met pas les parenthèse pour la fonction.
// document.getElementById("image").addEventListener("mouseover", changerImage); // revient au même

// image.addEventListener("mouseout", changerImage2);

// function changerImage()
// {
//     document.getElementById("image").src = "terminal.gif";
//     // ne pas oublier de changer le alt aussi
// }

// function changerImage2()
// {
//     document.getElementById("image").src = "termanim.gif";
// }



// Exercice 2
let btns = document.getElementsByClassName('btn');
for (i of btns)
{
  i.addEventListener('click', afficherTexte);
}

function afficherTexte(e)
{
    alert("J'aime le cours " + e.target.textContent);
}