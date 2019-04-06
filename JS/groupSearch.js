$(document).ready(function(){

    $(".input").keyup(function() { //For hvert tastetrykk kjøres søket
        
        var input = $(".input").val().toLowerCase(); //Henter input fra søkefelt og gjør om til lowercase
        
        $(".box").each(function() { //Funksjon som itererer over alle elementer som har klassen .box
            
            var gruppe = $(this).find("h3").text().toLowerCase();
            
            if (gruppe.includes(input)) 
            {
                $(this).fadeIn("fast"); //Hvis gruppen eksisterer vises den, hvis ikke skjules den på else
            } else 
            {
                $(this).hide();
            }

        });

    });

});