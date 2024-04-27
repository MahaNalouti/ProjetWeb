function validateForm() {
    var nom = document.getElementById('nom').value.trim();
    var prenom = document.getElementById('prenom').value.trim();
    var utilisateur = document.getElementById('utilisateur').value.trim();
    var password = document.getElementById('pass').value.trim();
    var matricule = document.getElementById('mat').value.trim();
    var date = document.getElementById('date').value.trim();
    var age = document.getElementById('age').value.trim();
    var sexe = document.getElementById('sexe').value.trim();
    var allergie = document.getElementById('allergie').value.trim();
    var sang = document.getElementById('sang').value.trim();
    var poids = document.getElementById('poids').value.trim();
    var derr = document.getElementById('derr').value.trim();
    var tel = document.getElementById('tel').value.trim();

    if (nom =='' || prenom == '' || utilisateur == '' || password == '' || matricule == '' || date =='' || age =='' || sexe == '' || allergie =='' || sang == '' || poids =='' || derr == '' || tel =='' ) {
        alert('Veuillez remplir tous les champs.');
        return false;
    }

    var currentDate = new Date();
    var selectedDate = new Date(date);
    if (selectedDate > currentDate) {
        alert('Date de naissance doit être antérieure à la date actuelle.');
        return false;
    }
    if (parseInt(age) < 0 || parseInt(age) > 150) {
        alert('Veuillez saisir un âge valide.');
        return false;
    }
    
    var poidsValue = parseFloat(document.getElementById('poids').value);
    
    if (poidsValue <= 0 || isNaN(poidsValue)) {
        alert('Le poids doit être positif.');
        document.getElementById('poids').value = '';  
        return false; 
    }
    
   
    
    return true; 
}
