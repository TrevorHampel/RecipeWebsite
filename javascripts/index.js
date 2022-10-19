// Required by Webpack - do not touch
require.context('../', true, /\.(html|json|txt|dat)$/i)
require.context('../images/', true, /\.(gif|jpg|png|svg|eot|ttf|woff|woff2)$/i)
require.context('../stylesheets/', true, /\.(css|scss)$/i)

// JavaScript
import 'bootstrap'

//TODO

function submitMessage(event){
    if(event) event.preventDefault()

    let n = document.querySelector('#name').value
    let e = document.querySelector('#email').value
    let m = document.querySelector('#message').value

    let Messages = JSON.parse(localStorage.getItem('Messages') || '[]')
    if(n && e && m)
    {
       let Message = {name: n, email: e, message: m}
       Messages.push(Message)
       localStorage.setItem('Messages', JSON.stringify(Messages)) 
    }
    document.querySelector('#thank').classList.remove('d-none')
    document.querySelector('#form').classList.add('d-none')
}

document.forms[0].addEventListener('submit', submitMessage, false)
document.forms[0].querySelector('[type="button"]').onclick = function(){
    document.getElementById("myForm").reset();
}

