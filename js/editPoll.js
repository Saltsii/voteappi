// editPoll.js

// Get id from queryString
const pollQueryString = window.location.search;
const pollParams = new URLSearchParams(pollQueryString);

if (pollParams.has('id')){
    getPollData(pollParams.has('id'))
}

let optionCount = 0;

document.getElementById('addOption').addEventListener('click', addNewOption);
document.getElementById('deleteLastOption').addEventListener('click', deleteLastOption);



// Get poll data from database
function getPollData(id){
    console.log(id);
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        data = JSON.parse(this.responseText);
        console.log(data);
        populatePollForm(data);
    }
    ajax.open("GET", "Backend/getPoll.php?id=" + id);
    ajax.send();

}

function populatePollForm(data){
    document.forms['editPoll']['id'].value = data.id;
    document.forms['editPoll']['topic'].value = data.topic;
    document.forms['editPoll']['start'].value = data.start.replace(" ","T");
    document.forms['editPoll']['end'].value = data.end.replace(" ","T");

    const target = document.querySelector('fieldset');

    data.options.forEach(function(option){
        console.log(option)
        optionCount++;
        target.appendChild(createOptionInputDiv(optionCount, option.name, option.id));

    })
}

// createOptionInputDic -
// Creates new input-field to form
function createOptionInputDiv(count, name, id){

    // crete new div
    const div = document.createElement('div');
    div.classList.add('form-group');

    // create new label
    const label = document.createElement('label');
    const forAttribute = document.createAttribute('for');
    const labelText = document.createTextNode(`option${Count}`);
    forAttribute.value = `option${Count}`;
    label.setAttributeNode(forAttribute);
    label.appendChild(labelText);
    label.classList.add('form-label');
    label.classList.add('mt-4');

    // create new input
    const input = document.createElement('input');

    input.classList.add('form-control');

    const inputType = document.createAttribute('type');
    inputType.value = "text";
    input.setAttributeNode(inputType);

    const inputName = document.createAttribute('name');
    inputName.value = `option${Count}`;
    input.setAttributeNode(inputName);

    const inputPlaceHolder = document.createAttribute('placeholder');
    inputPlaceHolder.value = `option ${Count}`;
    input.setAttributeNode(inputPlaceHolder);

    input.dataset.optionid = id;

    input.value = name;
    
    div.appendChild(label);
    div.appendChild(input);

    return div;

}

function deleteLastOption(event){

    event.preventDefault();

    if (optionCount <= 2 ) {
        return;
    }

    const optionToDelete = document.querySelector('fieldset').lastElementChild;
    const parentElement = document.querySelector('fieldset');
    parentElement.removeChild(optionToDelete);

    optionCount--;

}

function addNewOption(event){

    event.preventDefault();

    optionCount++;

    // crete new div
    const div = document.createElement('div');
    div.classList.add('form-group');

    // create new label
    const label = document.createElement('label');
    const forAttribute = document.createAttribute('for');
    const labelText = document.createTextNode(`option${optionCount}`);
    forAttribute.value = `option${optionCount}`;
    label.setAttributeNode(forAttribute);
    label.appendChild(labelText);
    label.classList.add('form-label');
    label.classList.add('mt-4');

    // create new input
    const input = document.createElement('input');

    input.classList.add('form-control');

    const inputType = document.createAttribute('type');
    inputType.value = "text";
    input.setAttributeNode(inputType);

    const inputName = document.createAttribute('name');
    inputName.value = `option${optionCount}`;
    input.setAttributeNode(inputName);

    const inputPlaceHolder = document.createAttribute('placeholder');
    inputPlaceHolder.value = `option ${optionCount}`;
    input.setAttributeNode(inputPlaceHolder);
    
    div.appendChild(label);
    div.appendChild(input);

    document.querySelector('fieldset').appendChild(div);
    console.log(div);

}