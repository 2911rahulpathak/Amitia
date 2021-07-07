
function popup() {
    var Donate = prompt('How much Amount Would You Donate ?');
    var popups = Donate;
    
    var h1= document.createElement('h1');
    var textAnswer= document.createTextNode('Thank You For Donating ' + popups + 'ETH.');
    h1.setAttribute('id','popups');
    h1.appendChild(textAnswer);
    document.getElementById('flex11').appendChild(h1);
}
