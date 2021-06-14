document.getElementById('msg-required').style.display = 'none';


function valida_form (){
		
    var inputs = document.getElementsByClassName('data');
    var msg = document.getElementById('msg-required');
    for(let i = 0; i < inputs.length; i++){
        
        if(inputs[i].value == ''){
            msg.innerHTML = 'preencha todos os campos para cadastrar';
            msg.style.display = 'block';
            return false;
        }
    }
}


var selectState = document.getElementById('estado');
var selectCitie = document.getElementById('cidade');
var selectNaturalidade = document.getElementById('naturalidade');

var valueEstado = document.getElementById('estadoValue')?.value;
var valueCidade = document.getElementById('cidadeValue')?.value;
console.log(valueCidade);
var valueNaturalidade = document.getElementById('naturalidadeValue')?.value;



fetch("https://servicodados.ibge.gov.br/api/v1/localidades/municipios")
    .then( res => res.json() )
    .then( res => {
     res.map(naturalidade => {
        const option = document.createElement('option');
        option.setAttribute('value', naturalidade.nome);
        if(option.value == valueNaturalidade){
            option.selected = true;
         }
        option.textContent = naturalidade.nome;
        selectNaturalidade.appendChild(option);
     })
    });

    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
    .then( res => res.json() )
    .then( res => {
     res.map(state => {
        const option = document.createElement('option');
        option.setAttribute('value', state.sigla);
        if(option.value == valueEstado){
            option.selected = true;
         }
        option.textContent = state.sigla;
        selectState.appendChild(option);
     })
    });


    selectState.addEventListener('change', function(e){
            let nodeCities = selectCitie.childNodes;
            console.log(nodeCities);
             [...nodeCities].map(n => n.remove());
            console.log(nodeCities)
            let UF = selectState.options[selectState.selectedIndex].value;
            fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${UF}/municipios`)
            .then( res => res.json() )
            .then( res => {
            res.map(citie => {
                const option = document.createElement('option');
                option.setAttribute('value', citie.nome);
                console.log(option.value);
                option.textContent = citie.nome;
                selectCitie.appendChild(option);
     });
    });
    })



    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${valueEstado}/municipios`)
        .then( res => res.json() )
        .then( res => {
        res.map(citie => {
            const option = document.createElement('option');
            option.setAttribute('value', citie.nome);
            console.log(option.value);
            if(option.value == valueCidade){
                option.selected = true;
                console.log('teste');
             }
            option.textContent = citie.nome;
            selectCitie.appendChild(option);
 });
});

