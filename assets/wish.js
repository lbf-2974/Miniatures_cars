const toast = document.getElementById('toast-success');
let brandInput= document.getElementById('wish_brand');
let modelInput= document.getElementById('wish_model');
let manufacturerList= document.getElementById('wish_manufacturer');
const form = document.getElementById('wish');
const url = '/';

form.addEventListener('submit', function(event){ 
    event.preventDefault();   
    let brandRecord = document.getElementById('wish_brand').value;
    let modelRecord = document.getElementById('wish_model').value;
    let manufacturerChoice = document.getElementById('wish_manufacturer');
    let manufacturerId= manufacturerChoice.options[manufacturerChoice.selectedIndex].value;
    let wishToken= document.getElementById('wish__token').value;

    let formData = new FormData();
    formData.append('wish[brand]:', brandRecord);
    formData.append('wish[model]:', modelRecord);
    formData.append('wish[manufacturer]:', manufacturerId);
    formData.append('wish[_token]:', wishToken);
 
    fetch (url,{
        method: "POST",
        body: formData,
    })

        .then(response => {
            if(response.status != 200 ) alert("Erreur");
            brandInput.value = '';
            modelInput.value = '';
            manufacturerList.selectedIndex = 0;
            toast.style.opacity = '100';

            setTimeout(function() {
                toast.style.display = 'none';
            }, 5000);
        })
});