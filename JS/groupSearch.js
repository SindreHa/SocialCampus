
/*
    Søkefunksjon på hjemmeside. Fungerer som en filtrering av grupper. En bruker kan
    skrive inn "ball" og få opp alle grupper med ordet "ball" i seg. Nyttig spesielt for smalere skjermer.
*/

$(document).ready(function(){

    $(".input").keyup(function() { //For hvert tastetrykk kjøres søket
        
        var input = $(".input").val().toLowerCase(); //Henter input fra søkefelt og gjør om til lowercase
        var teller = 0;
        var antall = 0;
        $(".box").each(function() { //Funksjon som itererer over alle elementer som har klassen .box
            antall++;
            var gruppe = $(this).find("h3").text().toLowerCase();
            
            if (gruppe.includes(input)) 
            {
                $(this).fadeIn("fast"); //Hvis gruppen eksisterer vises den, hvis ikke skjules den på else
            } 
            else {
                $(this).hide();
                teller ++;
            }
            
        });
        
        if(teller == antall-1 && screen.width > 750) { //hvis skjermbredde over 750px og 1 søkeresultat
            $(".boxes").css("grid-template-columns", "repeat(auto-fit, minmax(300px, .5fr))"); //boks fyller halve bredden
            $(".box").css("margin-right", "10px");
        }
        else {
            $(".boxes").css("grid-template-columns", "repeat(auto-fit, minmax(300px, 1fr))");
            $(".box").css("margin-right", "0px"); 
        }
        
        if(teller == antall) { //Hvis søk ikke gir noe resultat
            $(".boxes h4").fadeIn(150);
        }
        else {
            $(".boxes h4").hide();
        }

    });



});