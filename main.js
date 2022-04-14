//Refresh data every 30 seconds
let counter = 1;
setInterval(() => {
    document.querySelector('h3').innerText = counter;
    counter++;
    if(counter > 30) location.reload();
}, 1000);

//Set editWelkomstTekst function
function editWelkomstTekst(e)
{
  let welkomstTekst = e.path[3].querySelector('.welkomstTekst');
  //Put welkomstTeskt variable in Textarea
  document.getElementById('inputGroup').innerHTML = welkomstTekst.innerHTML;
}

function examplePage() {
  let color = document.getElementById("colorPalette").value;
  let encodedColor = encodeURI(color);
  let encodedUrl = encodedColor.replace(/#/g, '%23');
  
  let test = document.getElementById("inputGroup").value;

  console.log()
  window.location = 
    "https://www.welkombord.laatstestapjes.nl/voorbeeld.php?image=" + document.getElementById("projectImage").value + 
    "&aanhef=" + document.getElementById("projectAanhef").value + 
    "&kleur=" + encodedUrl;
    // "&tekst=" + test;

}