//各ステータスの計算(デフォルトの種族値は100)
function hcalc(){
    let H_bs = Number(document.getElementById("H_bs").value);
    let H_ev = Number(document.getElementById("H_ev").value);
    let H_iv = Number(document.getElementById("H_iv").value);
    let H_real = 175
    if(H_bs == ""){
        H_real = 175
    }else{
        H_real = Math.trunc((H_bs*2 + H_ev + Math.trunc(H_iv/4))/2+60)
    }
    document.getElementById("H_real").innerHTML = H_real;
}

function acalc(){
    let A_bs = Number(document.getElementById("A_bs").value);
    let A_ev = Number(document.getElementById("A_ev").value);
    let A_iv = Number(document.getElementById("A_iv").value);
    let nature = document.getElementById("nature").value;
    let A_nature = 1; 
    if(nature == 1 || nature == 2 || nature == 3 || nature == 4){
        A_nature = 1.1;
    }else if(nature == 5 || nature == 9 || nature == 13 || nature == 17){
        A_nature = 0.9;
    }else{
        A_nature = 1;
    }
    let A_real = 120*A_nature
    if(A_bs == ""){
        A_real = 120*A_nature
    }else{
        A_real = Math.trunc(Math.trunc((A_bs*2 + A_ev + Math.trunc(A_iv/4))/2+5)*A_nature)
    }
    document.getElementById("A_real").innerHTML = A_real;
}

function bcalc(){
    let B_iv = Number(document.getElementById("B_iv").value);    
    let B_bs = Number(document.getElementById("B_bs").value);
    let B_ev = Number(document.getElementById("B_ev").value);
    let nature = document.getElementById("nature").value;
    let B_nature = 1; 
    if(nature == 5 || nature == 6 || nature == 7 || nature == 8){
        B_nature = 1.1;
    }else if(nature == 1 || nature == 10 || nature == 14 || nature == 18){
        B_nature = 0.9;
    }else{
        B_nature = 1;
    }
    let B_real = 120*B_nature
    if(B_bs == ""){
        B_real = 120*B_nature
    }else{
        B_real = Math.trunc(Math.trunc((B_bs*2 + B_ev + Math.trunc(B_iv/4))/2+5)*B_nature)
    }
    document.getElementById("B_real").innerHTML = B_real;
}

function ccalc(){
    let C_bs = Number(document.getElementById("C_bs").value);
    let C_ev = Number(document.getElementById("C_ev").value);
    let C_iv = Number(document.getElementById("C_iv").value);    
    let nature = document.getElementById("nature").value;
    let C_nature = 1; 
    if(nature == 9 || nature == 10 || nature == 11 || nature == 12){
        C_nature = 1.1;
    }else if(nature == 2 || nature == 6 || nature == 15 || nature == 19){
        C_nature = 0.9;
    }else{
        C_nature = 1;
    }
    let C_real = 120*C_nature
    if(C_bs == ""){
        C_real = 120*C_nature
    }else{
        C_real = Math.trunc(Math.trunc((C_bs*2 + C_ev + Math.trunc(C_iv/4))/2+5)*C_nature)
    }
    document.getElementById("C_real").innerHTML = C_real;
}

function dcalc(){
    let D_bs = Number(document.getElementById("D_bs").value);
    let D_ev = Number(document.getElementById("D_ev").value);
    let D_iv = Number(document.getElementById("D_iv").value);    
    let nature = document.getElementById("nature").value;
    let D_nature = 1; 
    if(nature == 13 || nature == 14 || nature == 15 || nature == 16){
        D_nature = 1.1;
    }else if(nature == 3 || nature == 7 || nature == 11 || nature == 20){
        D_nature = 0.9;
    }else{
        D_nature = 1;
    }
    let D_real = 120*D_nature
    if(D_bs == ""){
        D_real = 120*D_nature
    }else{
        D_real  = Math.trunc(Math.trunc((D_bs*2 + D_ev + Math.trunc(D_iv/4))/2+5)*D_nature)
    }
    document.getElementById("D_real").innerHTML = D_real;
}

function scalc(){
    let S_bs = Number(document.getElementById("S_bs").value);
    let S_ev = Number(document.getElementById("S_ev").value);
    let S_iv = Number(document.getElementById("S_iv").value);    
    let nature = document.getElementById("nature").value;
    let S_nature = 1; 
    if(nature == 17 || nature == 18 || nature == 19 || nature == 20){
        S_nature = 1.1;
    }else if(nature == 4 || nature == 8 || nature == 12 || nature == 16){
        S_nature = 0.9;
    }else{
        S_nature = 1;
    }
    let S_real = 120*S_nature
    if(S_bs == ""){
        S_real = 120*S_nature
    }else{
        S_real  = Math.trunc(Math.trunc((S_bs*2 + S_ev + Math.trunc(S_iv/4))/2+5)*S_nature)
    }
    document.getElementById("S_real").innerHTML = S_real;
}

function ehcalc(){
    let eH_bs = Number(document.getElementById("eH_bs").value);
    let eH_ev = Number(document.getElementById("eH_ev").value);
    let eH_iv = Number(document.getElementById("eH_iv").value);    
    let eH_real = 175
    if(eH_bs == ""){
        eH_real = 175
    }else{
        eH_real = Math.trunc((eH_bs*2 + eH_ev + Math.trunc(eH_iv/4))/2+60)
    }
    document.getElementById("eH_real").innerHTML = eH_real;
}

function eacalc(){
    let eA_bs = Number(document.getElementById("eA_bs").value);
    let eA_ev = Number(document.getElementById("eA_ev").value);
    let eA_iv = Number(document.getElementById("eA_iv").value);
    let nature2 = document.getElementById("nature2").value;
    let A_nature2 = 1; 
    if(nature2 == 1 || nature2 == 2 || nature2 == 3 || nature2 == 4){
        A_nature2 = 1.1;
    }else if(nature2 == 5 || nature2 == 9 || nature2 == 13 || nature2 == 17){
        A_nature2 = 0.9;
    }else{
        A_nature2 = 1;
    }
    let eA_real = 120*A_nature2
    if(eA_bs == ""){
        eA_real = 120*A_nature2
    }else{
        eA_real = Math.trunc(Math.trunc((eA_bs*2 + eA_ev + Math.trunc(eA_iv/4))/2+5)*A_nature2)
    }
    document.getElementById("eA_real").innerHTML = eA_real;
}

function ebcalc(){
    let eB_bs = Number(document.getElementById("eB_bs").value);
    let eB_ev = Number(document.getElementById("eB_ev").value);
    let eB_iv = Number(document.getElementById("eB_iv").value);    
    let nature2 = document.getElementById("nature2").value;
    let B_nature2 = 1; 
    if(nature2 == 5 || nature2 == 6 || nature2 == 7 || nature2 == 8){
        B_nature2 = 1.1;
    }else if(nature2 == 1 || nature2 == 10 || nature2 == 14 || nature2 == 18){
        B_nature2 = 0.9;
    }else{
        B_nature2 = 1;
    }
    let eB_real = 120*B_nature2
    if(eB_bs == ""){
        eB_real = 120*B_nature2
    }else{
        eB_real = Math.trunc(Math.trunc((eB_bs*2 + eB_ev + Math.trunc(eB_iv/4))/2+5)*B_nature2)
    }
    document.getElementById("eB_real").innerHTML = eB_real;
}

function eccalc(){
    let eC_bs = Number(document.getElementById("eC_bs").value);
    let eC_ev = Number(document.getElementById("eC_ev").value);
    let eC_iv = Number(document.getElementById("eC_iv").value);    
    let nature2 = document.getElementById("nature2").value;
    let C_nature2 = 1; 
    if(nature2 == 9 || nature2 == 10 || nature2 == 11 || nature2 == 12){
        C_nature2 = 1.1;
    }else if(nature2 == 2 || nature2 == 6 || nature2 == 15 || nature2 == 19){
        C_nature2 = 0.9;
    }else{
        C_nature2 = 1;
    }
    let eC_real = 120*C_nature2
    if(eC_bs == ""){
        eC_real = 120*C_nature2
    }else{
        eC_real = Math.trunc(Math.trunc((eC_bs*2 + eC_ev + Math.trunc(eC_iv/4))/2+5)*C_nature2)
    }
    document.getElementById("eC_real").innerHTML = eC_real;
}

function edcalc(){
    let eD_bs = Number(document.getElementById("eD_bs").value);
    let eD_ev = Number(document.getElementById("eD_ev").value);
    let eD_iv = Number(document.getElementById("eD_iv").value);    
    let nature2 = document.getElementById("nature2").value;
    let D_nature2 = 1; 
    if(nature2 == 13 || nature2 == 14 || nature2 == 15 || nature2 == 16){
        D_nature2 = 1.1;
    }else if(nature2 == 3 || nature2 == 7 || nature2 == 11 || nature2 == 20){
        D_nature2 = 0.9;
    }else{
        D_nature2 = 1;
    }
    let eD_real = 120*D_nature2
    if(eD_bs == ""){
        eD_real = 120*D_nature2
    }else{
        eD_real  = Math.trunc(Math.trunc((eD_bs*2 + eD_ev + Math.trunc(eD_iv/4))/2+5)*D_nature2)
    }
    document.getElementById("eD_real").innerHTML = eD_real;
}

function escalc(){
    let eS_bs = Number(document.getElementById("eS_bs").value);
    let eS_ev = Number(document.getElementById("eS_ev").value);
    let eS_iv = Number(document.getElementById("eS_iv").value);    
    let nature2 = document.getElementById("nature2").value;
    let S_nature2 = 1; 
    if(nature2 == 17 || nature2 == 18 || nature2 == 19 || nature2 == 20){
        S_nature2 = 1.1;
    }else if(nature2 == 4 || nature2 == 8 || nature2 == 12 || nature2 == 16){
        S_nature2 = 0.9;
    }else{
        S_nature2 = 1;
    }
    let eS_real = 120*S_nature2
    if(eS_bs == ""){
        eS_real = 120*S_nature2
    }else{
        eS_real  = Math.trunc(Math.trunc((eS_bs*2 + eS_ev + Math.trunc(eS_iv/4))/2+5)*S_nature2)
    }
    document.getElementById("eS_real").innerHTML = eS_real;
}
