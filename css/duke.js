
function popup() {
    var Pop = prompt('How much Amount Would You Donate ?');
    var popups = (Pop)*3;
    /*console.log(popupps);*/
    var h1= document.createElement('h1');
    var textAnswer= document.createTextNode('Thank You For Donating' + popups + 'ETH.');
    h1.setAttribute('id','popup');
    h1.appendChild(textAnswer);
    document.getElementById('flex11').appendChild('h1');
}
