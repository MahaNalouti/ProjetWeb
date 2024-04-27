function verifdrug(){
    drugname=document.getElementById("name").value.trim();
    if(drugname.length==0){
        alert("le nom du medicament  s'il vous plait ");
    }
    if(drugname.length>60){
        alert("le nom du medicament est trop long");
    }

}
function verifmatgen(){
    general=document.getElementById("general").value.trim();
    
    if(general.length>50){
        alert("le nom du materiele generale est trop long");
    }

    if(general.length==0){
        alert("le nom du materiele generale est vide");
    }

}
function veriflabour(){
    labour=document.getElementById("labour").value.trim();
    if(labour.length>50){
        alert("le nom d'equipement du travail est trop long");
    }
    if(labour.length==0){
        alert("le nom d'equipement du travail est vide ");
    }


}
function verifopd(){
    opd=document.getElementById("opd").value.trim();
    if(opd.length==0){
        alert("nom opd est vide");
    }
    if(opd.length>50){
        alert("le nom du opd est trop long");
    }
}
// toul vars tansech